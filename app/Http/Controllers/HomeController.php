<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller {
	/**
	* Create a new controller instance.
	*
	* @return void
	*/
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	* Show the application dashboard.
	*
	* @return \Illuminate\Http\Response
	*/

	public function index() {
		if(Auth::user()->state=='playing') {
			return redirect()->route('playing');
		} else if (Auth::user()->state=='waiting') {
			return redirect()->route('result');
		} else {
			return view('home');
		}
	}

	public function setStateToAvailable() {
		$user = Auth::user();
		$user->state = 'available';
		$user->save();
	}
}
