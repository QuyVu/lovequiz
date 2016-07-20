<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question as questionModel;
use Auth;

class QuestionsController extends Controller
{
	public function listAll(){
		if(Auth::user()->admin) {
			return view('questionsList', array('questions' => questionModel::get()));
		} else {
			return abort(404);
		}
	}
}
