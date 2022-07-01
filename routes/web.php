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



Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::middleware(['auth','is_admin'])->group(function () {
Route::resource('principle', 'PrincipleController');
//TEACHER
Route::get('/teacher','TeacherController@index')->name('teacher.index');
Route::post('/teacher','TeacherController@store')->name('teacher.store');
Route::get('/teacher/create','TeacherController@create')->name('teacher.create');
Route::delete('/teacher/{id}','TeacherController@destroy')->name('teacher.destroy');
//STUDENT
Route::get('/student','StudentController@index')->name('student.index');
Route::post('/student','StudentController@store')->name('student.store');
Route::get('/student/create','StudentController@create')->name('student.create');
Route::delete('/student/{id}','StudentController@destroy')->name('student.destroy');
});

Route::middleware(['auth','is_teacher'])->group(function () {
    Route::resource('subjects', 'SubjectController');
    Route::get('/result/show/{id}','ResultController@show')->name('result.show');
    Route::get('/result/create/{id}','ResultController@create')->name('result.create');
    Route::get('/result/edit/{id}','ResultController@edit')->name('result.edit');
    Route::PUT('/result/update','ResultController@update')->name('result.update');
    Route::POST('/result/store','ResultController@store')->name('result.store');
    Route::Delete('/result/destroy/{id}','ResultController@destroy')->name('result.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/teacher/show/{id}','TeacherController@show')->name('teacher.show');
    Route::put('/teacher/{id}','TeacherController@update')->name('teacher.update');
    Route::get('/teacher/{id}','TeacherController@edit')->name('teacher.edit');
    Route::get('/student/show/{id}','StudentController@show')->name('student.show');
    Route::put('/student/{id}','StudentController@update')->name('student.update');
    Route::get('/student/{id}','StudentController@edit')->name('student.edit');

});


