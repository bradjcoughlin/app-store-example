<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('app');
});

Route::get('/bundle.json', function() {
	return response()
		->view('bundle_json')
		->header('Access-Control-Allow-Origin', '*')
		->header('Content-Type', 'application/json');
});

Route::get('/controller.js', function() {
	return response()
		->view('controller_js')
		->header('Content-Type', 'application/javascript');
});

Route::get('/api/entry/{id}', 'EntryController@getEntry');
Route::get('/api/entries', 'EntryController@getEntries');
Route::get('/api/entries/{type}', 'EntryController@getEntriesOfType');
