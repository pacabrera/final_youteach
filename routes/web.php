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

Route::get('/reg', 'HomeController@index')->name('reg');
Route::get('/', 'HomeController@redirectToPanel')->name('home');

Auth::routes();

//All Admin Routes
Route::prefix('/admin')->group(function(){
Route::get('/', 'AdminViewPanel@index')->name('admin-panel');

Route::resource('subjects', 'SubjectsController', ['only' => [//Subject
    'index', 'store', 'update', 'destroy'
]]);

Route::resource('teachers', 'TeacherController', ['only' => [//Teacher list
    'index'
]]);

Route::resource('account', 'AccountController', ['only' => [//Account management
    'store', 'update', 'destroy'
]]);

Route::resource('sections', 'SectionsController', ['only' => [//Sections and Grade Levels
    'index', 'store', 'update', 'destroy'
]]);



Route::resource('events', 'EventsController', ['only' => [//Questionnaire
     'index', 'store', 'update', 'destroy'
]]);

Route::get('manage-events', 'EventController@addEvent')->name('add-event');

//Events
Route::get('events', 'EventController@admin')->name('events-admin');



}); // End /admin


//All Teacher Routes
Route::prefix('/teacher')->group(function(){
Route::get('/', 'TeacherViewController@teacherPanel')->name('teacher-panel');

Route::resource('class', 'ClassesController',  ['only' => [//Class
    'store', 'destroy'
]]);

Route::get('/recitation/{class_id}', 'TeacherViewController@recitation')->name('recitation');
Route::post('/randomize/{class_id}', 'TeacherViewController@recitationTool')->name('randomize');
Route::post('/recitation', 'TeacherViewController@gradeRec')->name('grade-recitation');
Route::post('/reset/{class_id}', 'TeacherViewController@resetRecitation')->name('resetRecitation');

Route::get('/quizzes/{class_id}', 'QuizController@quizEvents')->name('quizzes');


Route::get('/quiz/{class_id}', 'QuizEventController@create')->name('quiz.create');
Route::post('/quiz/{class_id}', 'QuizEventController@store')->name('quiz.store');
Route::get('/quiz-show/{id}', 'QuizEventController@show')->name('quiz.show');
Route::put('/quiz/{id}', 'QuizEventController@update')->name('quiz.update');

Route::resource('assignments', 'AssignmentController', ['only' => [//Sections and Grade Levels
    'index', 'store', 'update', 'destroy'
]]);

Route::resource('question', 'QuestionController', ['only' => [//Question
    'store', 'update',  'destroy',
]]); 

Route::resource('questionnaire', 'QuestionnaireController', ['only' => [//Questionnaire
    'show', 
]]);

Route::get('events', 'EventController@index')->name('events');

Route::get('/group/{class_id}', 'TeacherViewController@groupGen')->name('group');
Route::post('/generate/{class_id}', 'TeacherViewController@groupGenPost')->name('generate-group');
Route::post('/group', 'TeacherViewController@gradeGroup')->name('grade-group');


}); // End /teacher

//All Student Routes
Route::prefix('/student')->group(function(){

	
Route::get('/', 'StudentViewController@studentPanel')->name('student-panel');

Route::post('/join', 'StudentViewController@JoinClass')->name('join-class');
Route::get('/settings', 'StudentViewController@settingsView')->name('acc-settings');

Route::post('profile', 'AccountController@changeProfilePic')->name('profile-pic');
Route::resource('take', 'TakeQuizController', ['only' => [//Related to taking of quiz
    'store', 'show'
]]); 


}); // End /Student


//Student Routes


Route::put('/account/{account}', 'AccountController@changePassStud')->name('change-pass');

Route::get('/class/{class_id}', 'PostsController@viewClass')->name('class-forum'); //Go to Class
Route::get('/thread/{id}', 'PostsController@show')->name('post-single');
Route::post('/post/{class_id}', 'PostsController@postStore')->name('post-store');
Route::post('/comment/{id}', 'PostsController@postComment')->name('post-comment');

Route::get('/assignments/{class_id}', 'PostsController@showAssign')->name('assignments');
Route::get('/turn-in/{assign_id}', 'PostsController@turnIn')->name('assign-turnIn');
Route::post('/turn-in/{assign_id}', 'PostsController@turnInPost')->name('turn-in.post');