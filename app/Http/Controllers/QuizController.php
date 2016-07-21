<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\QuizDao;
use App\Repositories\QuestionDao;
use App\Repositories\AnswerDao;
use App\Repositories\UserDao;
use App\User as User;
use App\Quiz as Quiz;
use Auth;
use DB;

class QuizController extends Controller
{
    public function __construct(QuizDao $quizDao, QuestionDao $questionDao, AnswerDao $answerDao, UserDao $userDao) {
        $this->quizDao = $quizDao;
        $this->questionDao = $questionDao;
        $this->answerDao = $answerDao;
        $this->userDao = $userDao;
    }

    public function getView() {
        if (Auth::user()->state=='playing') {
            return redirect()->route('playing');
        } else if (Auth::user()->state=='pending') {
            return view('quiz');
        } else {
            return redirect()->route('home');
        }
    }

    public function invite(Request $request) {
        if(Auth::user()->state=='available') {
            $starter = Auth::user();
            $partner = $this->userDao->findUserByName($request->input('partner'));
            $this->userDao->updateState($starter, 'pending');
            $this->userDao->updateState($partner, 'invited');
            $this->quizDao->create($starter->name, $partner->name);
        }
        return view('quiz');
    }

    public function respondInvitation(Request $request) {
        $partner = Auth::user();
        $quiz = $this->quizDao->findInvitedQuizByPartner($partner->name);
        $starter = $this->userDao->findUserByName($quiz->starter);
        $decision = $request->decision;
        if($decision == 'accept') {
            $this->quizDao->updateState($quiz,'started');
            $this->quizDao->createQuestionsList($quiz);
            $this->userDao->updateState($starter, 'playing');
            $this->userDao->updateState($partner, 'playing');
            return redirect()->route('playing');
        } else {
            $this->quizDao->updateState($quiz,'canceled');
            $this->userDao->updateState($starter, 'available');
            $this->userDao->updateState($partner, 'available');
            return redirect()->route('home');
        }
    }

    public function playQuiz() {
        $quiz = $this->quizDao->findQuizByState(Auth::user()->name,'started');
        $questions = explode(' ', $quiz->questions);
        $questionsList = array();
        foreach ($questions as $id) {
            array_push($questionsList, $this->questionDao->findQuestionById($id));
        }
        $data = ['questionsList' => $questionsList];
        if(Auth::user()->state=='available') {
            return redirect()->route('home');
        } elseif (Auth::user()->state=='waiting'){
            return redirect()->route('result', ['id' => $quiz->id]);
        } else {
            return view('playing', $data);   
        }
    }

    public function recieveAnswer(Request $request) {
        $quiz = $this->quizDao->findQuizByState(Auth::user()->name,'started');
        $answerer = $this->userDao->findUserByName(Auth::user()->name);

        foreach (array_except($request->all(),['_token']) as $questionId => $content) {
            $this->answerDao->create((int)$quiz->id, (int)$questionId, $answerer->name, $content);
        }

        if($answerer->name == $quiz->starter) {
            $partner = $this->userDao->findUserByName($quiz->partner);
        } elseif($answerer->name == $quiz->partner) {
            $partner = $this->userDao->findUserByName($quiz->starter);
        }

        $quiz = $this->quizDao->findQuizById($quiz->id);

        if($quiz->state=='started') {
            $this->userDao->updateState($answerer, 'waiting');
            $this->quizDao->updateState($quiz,'finishedOne');
        } elseif($quiz->state=='finishedOne') {
            $this->userDao->updateState($answerer, 'finished');
            $this->userDao->updateState($partner, 'finished');
            $this->quizDao->updateState($quiz,'completed');
        }

        return redirect()->route('result', ['id' => $quiz->id]);
    }

    public function showPartnerAnswer($id) {
        $quiz = $this->quizDao->findQuizById($id);
        $answerer = $this->userDao->findUserByName(Auth::user()->name);

        if($answerer->name == $quiz->starter) {
            $partner = $this->userDao->findUserByName($quiz->partner);
        } elseif($answerer->name == $quiz->partner) {
            $partner = $this->userDao->findUserByName($quiz->starter);
        }
        $answers = $this->answerDao->findAnswersOfQuiz($id, $partner->name);
        $data = [];

        foreach ($answers as $answer) {
            $question = $this->questionDao->findQuestionById($answer->question_id)->content;
            $content = $answer->answer;
            $data = array_add($data, $question, $content);
        }
        return view('result')->with('data', $data);
    }
}
