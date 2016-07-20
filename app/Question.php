<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	public function quizzes() {
		return $this->belongsToMany('App\Quiz');
  }

  public function answers() {
  	return $this->hasMany('App\Answers');
  }

}
