<?php

namespace App\Repositories;

use App\Question as Question;
use DB;

class QuestionDao implements QuestionDaoInterface {

	public function create($question) {
		$question = new Question();
		$question->content = $question;
		$question->save();
		return $question;
	}

	public function findQuestionById($id) {
		return Question::where('question_id','=',$id)->firstOrFail();
	}

	public function selectRandomQuestions($number) {
		return Question::where('question_id','>=',DB::raw('(SELECT FLOOR( MAX(question_id) * RAND()) FROM `questions`)'))->orderBy('question_id')->take($number)->get();
	}
}