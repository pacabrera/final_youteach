<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Klase;
use App\ClassMembers;
use App\UserProfile;
use Auth;
use App\Post;
use App\Comment;
use App\User;
use App\Event;
use App\Grade;
use App\Question;
use App\QuizEvent;
use App\StudentScore;
use App\Schedule;


class StudentViewController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');

    }

    //Student Redirect After Login
    public function studentPanel()
    {   
        $usr = UserProfile::where('id', Auth::user()->id)->first();
        $checkClass = Klase::join('class_members', 'classes.class_id', '=', 'class_members.class_id')->where('class_members.student_id', Auth::user()->id)
        ->get();

        $eventsCount = Event::all()->count();

        return view('student.student', compact('checkClass', 'usr', 'eventsCount'));
    }

    //View Class per Class Code
    public function viewClass($id)
    {   
                $checkIfInClass = ClassMembers::where('class_id', $id)->where('student_id', Auth::user()->id);
        $checkIfInstructor = Klase::where('class_id', $id)->where('instructor_id', Auth::user()->id);
        
        if($checkIfInClass->count() > 0 or $checkIfInstructor->count()){

        $usr = UserProfile::where('id', Auth::user()->id)->first();
        
        $checkClass = ClassMembers::where('class_members.student_id', Auth::user()->id)
        ->join('classes', 'classes.class_id', '=', 'class_members.class_id')
        ->get();

        $posts = Post::where('class_id',  $id)->orderBy('created_at', 'desc')->get();
		$comments = Comment::orderby('created_at', 'desc')->get();
        $myClass = Klase::where('class_id', $id)->first();
        return view('student.class', compact('myClass', 'checkClass', 'usr', 'posts','comments'));
    }
    else {
        abort(403);
    }
    }

    //Join Class
    public function JoinClass(Request $request){
        $request->validate([
            'class_code' => 'exists:classes,class_id|string',
        ]);

        $is_joined = ClassMembers::where('class_id', $request->input('class_code'))
                        ->where('student_id', Auth::user()->id)
                        ->count();
        if($is_joined){
            return response('Already joined!', 422);
        }else{
            ClassMembers::create([
                'student_id' => Auth::user()->id,
                'class_id' => $request->input('class_code'),
            ]);
            swal()->success('Successfully Joined Class!',[]);
            return redirect()->route('class-forum', $request->input('class_code'));
        }
      }

    public function settingsView(){
        $usr = UserProfile::where('id', Auth::user()->id)->first();
        $checkClass = ClassMembers::where('class_members.student_id', Auth::user()->id)
        ->join('classes', 'classes.class_id', '=', 'class_members.class_id')
        ->get();
        return view('student.settings', compact('checkClass', 'usr'));
    }

    public function grades($class_id){
                $checkIfInClass = ClassMembers::where('class_id', $class_id)->where('student_id', Auth::user()->id);
        $checkIfInstructor = Klase::where('class_id', $class_id)->where('instructor_id', Auth::user()->id);
        
        if($checkIfInClass->count() > 0 or $checkIfInstructor->count()){
        $grades = Grade::get()->where('class_id', $class_id)->where('usr_id', Auth::user()->id);
        $myClass = Klase::where('class_id', $class_id)->first();
        return view('student.grades', compact('grades','myClass'));
    }
    else {
        abort(403);
    }
    }

    public function quizGrade($quiz_id)
    {
            $results = StudentScore::with('quiz_event', 'user_profile')
                        ->where('student_id', Auth::user()->id)
                        ->first();

            $qtn_id = QuizEvent::find($quiz_id)->questionnaire_id;
            $sum = Question::where('questionnaire_id', $qtn_id)->sum('points');

            return view('student.quiz.results', compact('results', 'sum'));
    }

    public function schedule()
    {
        $schedule = Schedule::get();

        $classes = Klase::join('class_members', 'classes.class_id', 'class_members.class_id')
        ->where('class_members.student_id', Auth::user()->id)
        ->join('schedules', 'schedules.class_id', 'classes.class_id')
        ->get();

        return view('student.schedule', compact('schedule', 'classes'));
    }
}
