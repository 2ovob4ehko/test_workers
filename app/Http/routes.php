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

Route::get('/', 'WorkersController@showHierarchyList');
Route::get('/hierarchy/{chief_id}', 'WorkersController@getHierarchyElement');
Route::post('/update_chief', 'WorkersController@updateChief');

Route::get('/admin', 'WorkersController@showAdmin');
Route::get('/workers', 'WorkersController@getAllWorkers');
Route::get('/edit/{id}', 'WorkersController@showEditWorker');
Route::get('/create', 'WorkersController@showCreateWorker');

/**
 * Save Employee
 */
Route::post('/save', 'WorkersController@saveWorker');

/**
 * Delete Employee
 */
Route::get('/del/{id}', 'WorkersController@deleteWorker');

Route::get('/login', 'WorkersController@showLogin');
Route::post('/login', 'WorkersController@doLogin');
Route::get('/logout', 'WorkersController@doLogout');