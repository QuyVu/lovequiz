<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {
  /**
   * Bootstrap the application services.
   *
   * @return void
   */
  public function boot() {
    //
  }
  /**
   * Register the application services.
   *
   * @return void
   */
  public function register() {
    $this->app->bind('App\Repositories\QuizDaoInterface', 'App\Repositories\QuizDao');
    $this->app->bind('App\Repositories\QuestionDaoInterface', 'App\Repositories\QuestionDao');
    $this->app->bind('App\Repositories\AnswerDaoInterface', 'App\Repositories\AnswerDao');
    $this->app->bind('App\Repositories\UserDaoInterface', 'App\Repositories\UserDao');
  }
}