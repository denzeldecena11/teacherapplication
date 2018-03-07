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

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', [
	'as'	=> 'dashboard',
	'uses'	=> 'HomeController@index'
]);

Route::get('/announcements', 'SubjectController@index');

Route::group(['prefix' => "quiz"], function() {
	Route::get('/', [
		'as'	=> 'quiz.index',
		'uses'	=> 'QuizController@index'
	]);

	Route::get('/{quiz_id}/items', [
		'as'	=> 'quiz.items.create',
		'uses'	=> 'QuizItemController@create'
	]);

	Route::post('/{quiz_id}/items', [
		'as'	=> 'quiz.items.save',
		'uses'	=> 'QuizItemController@save'
	]);

	Route::get('/create', [
		'as'	=> 'quiz.create',
		'uses'	=> 'QuizController@create'
	]);

	Route::post('/create', [
		'as'	=> 'quiz.save',
		'uses'	=> 'QuizController@save'
	]);
});

Route::group(['prefix' => 'attendance'], function () {

	Route::get('/{attendance_id}', [
		'as'	=> 'attendance.index',
		'uses'	=> 'AttendanceController@show'
	]);
});

Route::group(['prefix' => "subjects"], function () {
	Route::get('/', [
		'as'	=> 'subject.index',
		'uses'	=> 'SubjectController@index'
	]);

	Route::get('/{subject_id}/students', [
		'as'	=> 'subject.students',
		'uses'	=> 'SubjectStudentController@index'
	]);

	Route::get('/{subject_id}/students/attendance', [
		'as'	=> 'subject.students.attendance.index',
		'uses'	=> 'AttendanceController@index'
	]);

	Route::get('/{subject_id}/students/attendance/create', [
		'as'	=> 'subject.students.attendance.create',
		'uses'	=> 'AttendanceController@create'
	]);

	Route::post('/{subject_id}/students/attendance/create', [
		'as'	=> 'subject.students.attendance.save',
		'uses'	=> 'AttendanceController@save'
	]);

	Route::get('/create', [
		'as'	=> 'subject.create',
		'uses'	=> 'SubjectController@create'
	]);

	Route::post('/create', [
		'as'	=> 'subject.save',
		'uses'	=> 'SubjectController@save'
	]);
});


Route::group([ 'prefix' => 'students'], function () {

	Route::get('/attendances/{subject_id}', [
		'as'	=> 'students.attendances',
		'uses'	=> 'Student\AttendanceController@index'
	]);

	Route::get('/quizzes/{subject_id}', [
		'as'	=> 'students.quizzes',
		'uses'	=> 'Student\QuizController@index'
	]);

	Route::get('/quizzes/{quiz_id}/take', [
		'as'	=> 'students.quizzes.take',
		'uses'	=> 'Student\QuizController@take'
	]);

	Route::post('/quizzes/{quiz_id}/answer', [
		'as'	=> 'students.quizzes.answer',
		'uses'	=> 'Student\QuizController@answer'
	]);

	Route::get('/quizzes/{student_quiz_id}/score', [
		'as'	=> 'students.quizzes.score',
		'uses'	=> 'Student\QuizController@score'
	]);

	Route::get('/subjects', [
		'as'	=> 'students.subjects',
		'uses'	=> 'Student\SubjectController@index'
	]);
});
