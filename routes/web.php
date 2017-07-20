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

Route::get('/', 'ListJobController@index')->name('home');
Route::post('/search', 'ListJobController@search')->name('search');
Route::get('/listjob', 'ListJobController@listjob')->name('listjob');
Route::get('/detailsjob/{id}', 'ListJobController@detailsjob')->name('detailsjob');
Route::get('/applyjob/{id}/{m_lokasi_id}', 'ListJobController@apply_job')->name('applyjob');
Route::post('/applyjob/{id}/{m_lokasi_id}', 'ListJobController@post_job')->name('postjob');
Route::get('/tes', 'ListJobController@download')->name('tes');
Route::post('/subscribe','ListJobController@subscribe')->name('subscribe');
Route::get('/contact','ListJobController@contact')->name('contact');
