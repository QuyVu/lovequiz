<?php

namespace App\Repositories;

interface AnswerDaoInterface {
  public function create($quizId, $questionId, $answerer, $answer);
  public function findAnswersOfQuiz($quizId, $answerer);
}