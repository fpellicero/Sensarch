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

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@homePage'));

/*
 *	Static pages
 */
Route::get('terms', array('as' => 'terms', 'uses' => 'BaseController@termsPage'));

/*
 * Routes handling the login system.
 */
Route::get('login', array('as' => 'login', 'uses' => 'LoginController@loginPage'));
Route::post('login', 'LoginController@loginAttempt');
Route::get('logout', array('as' => 'logout', 'uses' => 'LoginController@logout'));

/*
 *	User register
 */
Route::post('register', array('as' => 'register', 'uses' => 'LoginController@register'));

/*
 * Routes handling Projects
 */
Route::get('project/new', array('as' => 'newProject', 'uses' => 'ProjectController@create'))->before('auth');
Route::post('project/new', 'ProjectController@store');
Route::get('project/{id}', array('as' => 'showProject', 'uses' => 'ProjectController@show'));
Route::get('project/{id}/edit', array('as' => 'editProject', 'uses' => 'ProjectController@edit'));
Route::post('project/{id}/edit', 'ProjectController@update');
Route::get('project/{id}/delete', array('as' => 'destroyProject', 'uses' => 'ProjectController@destroy'))->before('auth');

/*
 * Routes handling likes
 */
Route::post('project/{id}/like', 'ProjectController@like');
Route::post('project/{id}/dislike', 'ProjectController@dislike');


/*
 * Routes handling Profile
 */
Route::get('user/{id}', array('as' => 'userProfile', 'uses' => 'ProfileController@show'));
Route::get('user/{id}/edit', array('as' => 'editUserProfile', 'uses' => 'ProfileController@edit'))->before('auth');
Route::post('user/{id}', 'ProfileController@update')->before('auth');

/*
 * AJAX
 */
Route::post('images', 'ImageController@store');
Route::get('project/list/{offset}', 'HomeController@getProjects');


/*
 * Admin
 */
Route::get('admin/users', 'AdminUsers@index')->before('isAdmin');
Route::get('admin/users/create', array('as' => 'adminAddUser', 'uses' => 'AdminUsers@create'))->before('isAdmin');
Route::get('admin/users/import', 'AdminUsers@import')->before('isAdmin');
Route::get('activate/user/{id}/{auth_code}', 'AdminUsers@activate_form');
Route::post('activate/user/{id}/{auth_code}', 'AdminUsers@activate');
Route::get('email/{id}', 'AdminUsers@activation_email');


Route::get('admin/projects', 'AdminProjects@index')->before('isAdmin');
Route::get('admin/projects/import', 'AdminProjects@import')->before('isAdmin');
