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

Route::get('professional', array('as' => 'loginProfessional', 'uses' => 'LoginController@professionalLoginPage' ));

/*
 *	User register
 */
Route::post('register', array('as' => 'register', 'uses' => 'LoginController@register'));
Route::post('register/professional', array('as' => 'registerProfessional', 'uses' => 'LoginController@registerProfessional'));

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
 * Routes handling comments
 */
Route::post('project/{id}/comments', array('as' => 'createComment', 'uses' => 'CommentController@store'))->before('auth');

/*
 * Routes handling Contests
 */
Route::get('contests', 'ConceptController@feed');
Route::get('concepts/import', 'ConceptController@import');
Route::post('contests/search', 'ConceptController@search');

/*
 * Routes handling Pages
 */
Route::get('page/{id}', array('as' => 'showPage', 'uses' => 'PageController@show'));
Route::post('page', array('as' => 'newPage', 'uses' => 'PageController@store'));
Route::post('page/{id}', 'PageController@update');
Route::get('page/{id}/edit', array('as' => 'editPage', 'uses' => 'PageController@edit'));

/*
 * Routes handling Likes
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
Route::get('project/list/{offset}/{user_id}', 'HomeController@getProjects');
Route::get('user/{id}/category/{category_id}', 'ProfileController@getProjects');


/*
 * Admin
 */
Route::get('admin/users', 'AdminUsers@index')->before('isAdmin');
Route::get('admin/users/create', array('as' => 'adminAddUser', 'uses' => 'AdminUsers@create'))->before('isAdmin');
Route::get('admin/users/import', 'AdminUsers@import')->before('isAdmin');
Route::get('activate/user/{id}/{auth_code}', 'AdminUsers@activate_form');
Route::post('activate/user/{id}/{auth_code}', 'AdminUsers@activate');
Route::get('email/{id}', array('as' => 'activationEmail', 'uses' => 'AdminUsers@activation_email'));


Route::get('admin/projects', 'AdminProjects@index')->before('isAdmin');
Route::get('admin/projects/import', 'AdminProjects@import')->before('isAdmin');

Route::get('admin/contests/new', array('as' => 'adminAddConcept', 'uses' => 'AdminConcepts@create'))->before('isAdmin');
Route::post('admin/contests/new', 'AdminConcepts@store')->before('isAdmin');
Route::get('admin/contests', 'AdminConcepts@index')->before('isAdmin');
Route::get('admin/contests/{id}', array('as' => 'adminEditConcept', 'uses' => 'AdminConcepts@edit'))->before('isAdmin');
Route::post('admin/contests/{id}', 'AdminConcepts@update')->before('isAdmin');
Route::get('admin/categories', 'AdminCategories@index')->before('isAdmin');
Route::post('admin/categories/new', 'AdminCategories@store')->before('isAdmin');
