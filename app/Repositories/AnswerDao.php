<?php

namespace App\Repositories;

use App\Answer as Answer;
use DB;

class AnswerDao implements AnswerDaoInterface {
  public function create($quizId, $questionId, $answerer, $content) {
  	$answer = new Answer();
  	$answer->quiz_id = $quizId;
  	$answer->question_id = $questionId;
  	$answer->answerer = $answerer;
  	$answer->answer = $content;
  	$answer->save();
  }

  public function findAnswersOfQuiz($quizId, $answerer) {
  	return Answer::where('quiz_id','=',$quizId)->where('answerer','=',$answerer)->get();
  }
}