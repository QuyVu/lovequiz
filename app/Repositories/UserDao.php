<?php

namespace App\Repositories;

use App\User as User;
use DB;

class UserDao implements UserDaoInterface {

  public function findUserByName($name) {
  	return User::where("name","=",$name)->first();
  }

  public function updateState($user, $state) {
		$user->state = $state;
		$user->save();
  }
}