<?php

namespace App\Repositories;

interface QuizDaoInterface {
  public function create($starter, $partner);
  public function findInvitedQuizByPartner($partner);
  public function findQuizById($id);
  public function findQuizByState($player, $state);
  public function updateState($quiz, $state);
  public function createQuestionsList($quiz);
}
