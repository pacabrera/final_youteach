<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Klase;
use App\Section;
use App\Subject;
use App\Post;
use App\UserProfile;
use App\User;
use App\Comment;
use App\ClassMembers;
use App\Grade;
use App\Thread;
use Alert;
use Softon\SweetAlert\Facades\SWAL; 
use App\PostFiles;
use Illuminate\Support\Facades\Storage;
use App\Event;


class TeacherViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkIfTeacher:permissions');

    }

    public function teacherPanel()
    {
    	$sections = Section::get();
    	$subjects = Subject::get();
    	$myClass = Klase::where('instructor_id', Auth::user()->id)->get();
        $eventsCount = Event::all()->count();
        return view('teacher.panel', compact('sections', 'subjects', 'myClass', 'eventsCount'));
    }

    public function recitation($class_id){

        $myClass = Klase::where('class_id', $class_id)->first();

        $class = ClassMembers::where('class_members.class_id', $class_id)
        ->where('class_members.isCalled', 0) // 0 = not yet called , 1 = called not yet graded , 2 = graded and called
        ->join('classes', 'classes.class_id', '=', 'class_members.class_id')->get();

        return view('teacher.recitation', compact('myClass', 'class'));
    }

    public function recitationTool($class_id){

        $classlist = ClassMembers::where('class_members.class_id', $class_id)
        ->where('class_members.isCalled', 0) // 0 = not yet called , 1 = called not yet graded , 2 = graded and called
        ->join('classes', 'classes.class_id', '=', 'class_members.class_id')
        ->inRandomOrder()->first();

        $student_name = $classlist->user_profile->given_name . ' ' . $classlist->user_profile->family_name;
        $student_id = $classlist->student_id;

        $myClass = Klase::where('class_id', $class_id)->first();
        
                
        return response()->json(array('student_name'=> $student_name, 'student_id'=> $student_id), 200);
        return $myClass; 
        
    }

     public function resetRecitation($class_id){

         $class = ClassMembers::where('class_id', $class_id)->update(['isCalled' => 0]);
         swal()->success('Successfully Resetted',[]);
     }

    public function gradeRec(Request $request){
        $grade = new Grade;
        $grade->usr_id = $request->input('usr_id');
        $grade->class_id = $request->input('class_id');
        $grade->grade = $request->input('grade');
        $grade->type = 'Recitation';
        $grade->save();

        $student_id = $request->input('usr_id') ;
        $class = ClassMembers::where('student_id', $student_id);
        $class->update(['isCalled' => 1]);

        swal()->success('Successfully Graded',[]);
        return back();
    }

    public function gradeGroup(Request $request){
        $grade = new Grade;
        $grade->usr_id = $request->input('student_id');
        $grade->class_id = $request->input('class_id');
        $grade->grade = $request->input('grade');
        $grade->type = 'Activity';
        $grade->save();
    }


    public function groupGen($class_id){
        $myClass = Klase::where('class_id', $class_id)->first();

        return view('teacher.group-generator', compact('myClass'));
    }

        public function groupGenPost(Request $request, $class_id){
        $numGroup = $request->input('numGroup');
        
        $classlist = ClassMembers::where('class_members.class_id', $class_id)
        ->join('classes', 'classes.class_id', '=', 'class_members.class_id')
        ->inRandomOrder()->get();


        $myClass = Klase::where('class_id', $class_id)->first();
        
                
        return view('teacher.groups', compact('myClass', 'classlist','numGroup'));
        
    }

    public function scores($class_id)
    {
        $grades = Grade::where('class_id', $class_id)->orderBy('usr_id')->get();
        $myClass = Klase::where('class_id', $class_id)->with('class_members')->first();
        $klase = ClassMembers::where('class_id', $class_id)->first();

        $classlist = ClassMembers::where('class_members.class_id', $class_id)
        ->join('classes', 'classes.class_id', 'class_members.class_id')->get();


        return view('teacher.scores', compact('grades','myClass', 'classlist'));
    }



}


