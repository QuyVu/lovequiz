<?php

namespace App\Repositories;

interface UserDaoInterface {
  public function findUserByName($name);
  public function updateState($user, $state);
}