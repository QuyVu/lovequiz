<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();
Route::group(['middleware' => 'auth'], function () {
	Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
	Route::get('profile', ['as' => 'profile', 'uses' => 'UserController@profile']);
	Route::get('questions', 'QuestionsController@listAll');

	Route::post('profile', 'UserController@updateAvatar');

	Route::group(['prefix' => 'quiz'], function () {
		Route::get('', ['as' => 'quiz', 'uses' => 'QuizController@getView']);
		Route::get('playing', ['as' => 'playing', 'uses' => 'QuizController@playQuiz']);
		Route::get('result/{id?}', ['as' => 'result', 'uses' => 'QuizController@showPartnerAnswer']);

		Route::post('', 'QuizController@invite');
		Route::post('decide', 'QuizController@respondInvitation');
		Route::post('submit', 'QuizController@recieveAnswer');
	});
});