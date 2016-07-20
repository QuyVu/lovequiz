<?php

namespace App\Repositories;

use App\Quiz as Quiz;
use App\Repositories\QuestionDao;
use DB;

class QuizDao implements QuizDaoInterface {

	public function __construct(QuestionDao $question) {
    $this->question = $question;
	}

	public function create($starter, $partner) {
		$quiz = new Quiz();
		$quiz->starter = $starter;
		$quiz->partner = $partner;
		$quiz->save();
		return $quiz;
	}

	public function findInvitedQuizByPartner($partner) {
		return Quiz::where('partner','=',$partner)->where('state','=','pending')->firstOrFail();
	}

	public function findQuizById($id) {
		return Quiz::find($id);
	}

	public function findQuizByState($player, $state) {
		return Quiz::where('state','=',$state)->where('starter','=',$player)->orWhere('partner','=',$player)->firstOrFail();
	}

	public function updateState($quiz, $state) {
		$quiz->state = $state;
		$quiz->save();
	}

	public function createQuestionsList($quiz) {
		$questions = $this->question->selectRandomQuestions(10);
		$list = '';
    foreach ($questions as $value) {
    	if ($list=='') {
    		$list = $list . $value->question_id;
    	} else {
    		$list = $list . ' ' . $value->question_id;
    	}
    }
    $quiz->questions = $list;
    $quiz->save();
	}
}