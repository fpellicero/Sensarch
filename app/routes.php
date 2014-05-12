<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@homePage'))->before('auth');;

/*
 * Routes handling the login system.
 */
Route::get('login', array('as' => 'login', 'uses' => 'LoginController@loginPage'))->before('guest');
Route::post('login', 'LoginController@loginAttempt');
Route::get('logout', array('as' => 'logout', 'uses' => 'LoginController@logout'))->before('auth');

/*
 *	User register
 */
Route::post('register', array('as' => 'register', 'uses' => 'LoginController@register'))->before('guest');
/*
 * Routes handling Projects
 */
Route::get('project/new', array('as' => 'newProject', 'uses' => 'ProjectController@create'))->before('auth');
Route::post('project/new', 'ProjectController@store');
Route::get('project/{id}', array('as' => 'showProject', 'uses' => 'ProjectController@show'));


/*
 * Routes handling Profile
 */
Route::get('user/{id}', array('as' => 'userProfile', 'uses' => 'ProfileController@show'));
Route::get('user/{id}/edit', array('as' => 'editUserProfile', 'uses' => 'ProfileController@edit'));
Route::post('user/{id}/edit', 'ProfileController@update');
