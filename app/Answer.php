<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
	public $timestamps = false;
	
	public function question() {
		return $this->belongsTo('App\Question');
	}

	public function user() {
		return $this->belongsTo('App\User');
	}
}
