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
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
//All Admin Routes
Route::prefix('/admin')->group(function(){
Route::get('/', 'AdminViewPanel@index')->name('admin-panel');
Route::get('all-audits', 'AdminViewPanel@audits')->name('all-audits');
Route::resource('subjects', 'SubjectsController', ['only' => [//Subject
    'index', 'store', 'destroy', 'create'
]]);
Route::get('edit-subject/{subject_id}', 'SubjectsController@edit')->name('edit-subject');
Route::post('edit-subject/{subject_id}', 'SubjectsController@update')->name('edit-subject');

Route::resource('teachers', 'TeacherController', ['only' => [//Teacher list
    'index'
]]);

Route::resource('account', 'AccountController', ['only' => [//Account management
    'store', 'update', 'destroy'
]]);

Route::resource('sections', 'SectionsController', ['only' => [//Sections and Grade Levels
    'index', 'store', 
]]);

Route::get('add-section', 'SectionsController@create')->name('add-section');
Route::get('edit-section/{section_id}', 'SectionsController@edit')->name('edit-section');
Route::post('edit-section/{section_id}', 'SectionsController@update')->name('edit-section');
Route::post('/delete-section/{id}', 'SectionsController@deleteSection')->name('delete-section');

Route::resource('events', 'EventsController', ['only' => [//Questionnaire
     'index', 'store', 'update', 'destroy', 'edit'
]]);
Route::post('edit-event/{id}', 'EventsController@updatePost')->name('edit-event');
Route::get('manage-events', 'EventController@addEvent')->name('add-event');
Route::get('new-event', 'EventController@newEvent')->name('new-event');
//Events
Route::get('events', 'EventController@admin')->name('events-admin');



//Classes Dashboard
Route::get('classes', 'AdminViewPanel@viewClasses')->name('view-classes');
Route::get('new-class', 'AdminViewPanel@newClassView')->name('new-class');
Route::post('add-class', 'AdminViewPanel@addClass')->name('add-class');
Route::get('edit-class/{class_id}', 'AdminViewPanel@editClassView')->name('edit-class');
Route::post('edit-class/{class_id}', 'AdminViewPanel@editClassPost')->name('edit-classPost');
Route::delete('delete-class/{class_id}', 'AdminViewPanel@destroyClass')->name('delete-class');
}); // End /admin


//All Teacher Routes
Route::prefix('/teacher')->group(function(){
Route::get('/', 'TeacherViewController@teacherPanel')->name('teacher-panel');
Route::get('/attendance/{class_id}', 'AttendanceController@index')->name('qr-attendance');
Route::resource('class', 'ClassesController',  ['only' => [//Class
    'store', 'destroy'
]]);
Route::get('/attendances/{id}', 'AttendanceController@getAttendance')->name('attendances');

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
    'index', 'store', 'update', 'destroy', 'edit'
]]);


Route::get('/assignment/score/{id}', 'AssignmentController@viewAssignGrade')->name('assign-scores');
Route::get('/assignment/{id}', 'AssignmentController@viewSubmissions')->name('assign-submissions');
Route::post('/assign', 'AssignmentController@gradeAssign')->name('grade-assign');
Route::get('/submission/{id}', 'AssignmentController@singleSubmission')->name('single-submission');
Route::resource('question', 'QuestionController', ['only' => [//Question
    'store',  'destroy'
]]); 
Route::post('/assignment/{id}', 'AssignmentController@update')->name('assignment-update');

Route::resource('questionnaire', 'QuestionnaireController', ['only' => [//Questionnaire
    'show', 
]]);

Route::get('events', 'EventController@index')->name('events');

Route::get('/group/{class_id}', 'TeacherViewController@groupGen')->name('group');
Route::post('/generate/{class_id}', 'TeacherViewController@groupGenPost')->name('generate-group');
Route::post('/group', 'TeacherViewController@gradeGroup')->name('grade-group');
Route::get('submissions', 'AssignmentController@submissions')->name('submissions');

Route::get('/scores/{class_id}', 'TeacherViewController@scores')->name('score-class');

Route::get('/schedule', 'TeacherViewController@schedule')->name('schedule-teacher');

Route::get('cards/{class_id}', 'TeacherViewController@cards')->name('cards');
Route::get('cards/{class_id}/{id}', 'TeacherViewController@singleCard')->name('single-cards');

Route::post('gradecategory', 'TeacherViewController@createGradeCategory')->name('grade-categ');
Route::get('start-recitation/{class_id}', 'TeacherViewController@startRec')->name('start-rec');
Route::get('group-scores/{class_id}', 'TeacherViewController@scoreGroups')->name('score-group');
Route::get('class-settings/{class_id}', 'TeacherViewController@classSettings')->name('class-settings');
Route::get('class-schedule/{class_id}', 'TeacherViewController@schedules')->name('sched');
Route::get('/scores/{class_id}', 'TeacherViewController@scores')->name('scores');
Route::post('class-edit/{class_id}', 'TeacherViewController@editClassPost')->name('edit-classT');
Route::post('class-sched/{class_id}', 'TeacherViewController@editSched')->name('edit-schedule');
}); // End /teacher

//All Student Routes
Route::prefix('/student')->group(function(){

	
Route::get('/', 'StudentViewController@studentPanel')->name('student-panel');

Route::post('/join', 'StudentViewController@JoinClass')->name('join-class');


Route::post('profile', 'AccountController@changeProfilePic')->name('profile-pic');
Route::resource('take', 'TakeQuizController', ['only' => [//Related to taking of quiz
    'store', 'show'
]]); 
Route::get('/attendance/{class_id}', 'AttendanceController@student')->name('attendance-stud');
Route::post('/attendance', 'AttendanceController@attendance')->name('attendance');

Route::get('/grades/{class_id}', 'StudentViewController@grades')->name('grades');
Route::get('/quiz-score/{quiz_id}', 'StudentViewController@quizGrade')->name('quiz-score');

Route::get('/schedule', 'StudentViewController@schedule')->name('schedule');
}); // End /Student




//Student Routes

Route::get('/settings', 'StudentViewController@settingsView')->name('acc-settings');
Route::put('/account/{account}', 'AccountController@changePassStud')->name('change-pass');
Route::put('/profile/{account}', 'AccountController@updateProfile')->name('update-profile');

Route::get('/class/{class_id}', 'PostsController@viewClass')->name('class-forum'); //Go to Class
Route::get('/thread/{id}', 'PostsController@show')->name('post-single');
Route::post('/post', 'PostsController@postStore')->name('post-store');
Route::post('/comment/{id}', 'PostsController@postComment')->name('post-comment');

Route::get('/assignments/{class_id}', 'PostsController@showAssign')->name('assignments');
Route::get('/turn-in/{assign_id}', 'PostsController@turnIn')->name('assign-turnIn');
Route::post('/turn-in/{assign_id}', 'PostsController@turnInPost')->name('turn-in.post');

Route::post('/edit-post/{id}', 'PostsController@editPost')->name('editpost');
Route::post('/delete-post/{id}', 'PostsController@delPost')->name('deletepost');

//Attendance
Route::get('/event/{id}', 'EventController@showSingle')->name('event-single');
Route::get('/audits/{id}', 'ActivityLog@getAudits')->name('audits');

Route::get('profile/{id}', 'HomeController@viewProfile')->name('view-profile');


//Notif
Route::get('markAsRead', function(){
    Auth::user()->unReadNotifications->markAsRead();
    return back();
})->name('markAsRead');


Route::get('about', function(){
    return view('about');
})->name('about');