<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Image;

class UserController extends Controller
{
    public function profile() {
    	return view('profile', array('user' => Auth::user()));
    }

    public function updateAvatar(Request $request) {
    	if($request->hasFile('avatar')) {
    		$avatar=$request->file('avatar');
    		$filename = Auth::user()->name . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->save(public_path('/image/avatar/' . $filename));
    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}
    	return view('profile', array('user' => Auth::user()));
    }
}
