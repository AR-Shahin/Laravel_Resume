<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name('main_index');

//Route::resource('user','UserController');



Auth::routes();
Route::get('test',function(){
    return view('pdf.index');
});
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'BasicInfoController@create')->name('home');
Route::post('/basic info store', 'BasicInfoController@store')->name('store');

//education
Route::get('/education_information','EducationController@create')->name('education_create');
Route::get('/education_summery','EducationController@index')->name('education_index');
Route::post('/education_store','EducationController@store')->name('education_store');
Route::get('/edu_delete/{id}','EducationController@destroy')->name('edu_delete');
Route::get('/update/{id}','EducationController@edit')->name('update');
Route::post('/update/{id}','EducationController@update')->name('update');

//work 
Route::get('work_summery_display','WorkController@index')->name('work_index');
Route::get('work_information_create','WorkController@create')->name('work_create');
Route::post('work_information_store','WorkController@store')->name('work_store');
Route::get('/work_delete/{id}','WorkController@destroy')->name('work_delete');
Route::get('/work_update/{id}','WorkController@edit')->name('edit');
Route::post('/work_update/{id}','WorkController@update')->name('update');

//certificate
Route::get('certificate_summery_display','CertificateController@index')->name('certificate_index');
Route::get('certificate_information_create','CertificateController@create')->name('certificate_create');
Route::post('certificate_information_store','CertificateController@store')->name('certificate_store');
Route::get('/delete/{id}','CertificateController@destroy')->name('delete');
Route::get('/certificate_update/{id}','CertificateController@edit')->name('edit');
Route::post('/certificate_update/{id}','CertificateController@update')->name('update');

//CA
Route::get('ca_summery_display','CareerObjectController@index')->name('ca_index');
Route::get('ca_information_create','CareerObjectController@create')->name('ca_create');
Route::post('ca_information_store','CareerObjectController@store')->name('ca_store');
Route::get('/ca_update/{id}','CareerObjectController@edit')->name('edit');
Route::post('/ca_update/{id}','CareerObjectController@update')->name('update');

//PDF
Route::get('pdf_display','PdfController@index')->name('pdf_index');
Route::get('pdf_download','PdfController@download')->name('download');

