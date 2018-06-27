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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'Signup\SignupController@index');
Route::get('/fill-form', 'Signup\SignupController@create');

//Ajax
Route::get('/ajax-select', 'Signup\SignupController@ajaxSelect');
Route::post('/ajax-upload', 'Signup\SignupController@ajaxUpload');
Route::get('/ajax-upload-delete', 'Signup\SignupController@ajaxUploadDel');
