<?php

namespace App\Repositories;

interface QuestionDaoInterface {
  public function create($question);
  public function findQuestionById($id);
  public function selectRandomQuestions($number);
}