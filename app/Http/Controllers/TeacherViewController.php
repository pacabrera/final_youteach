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
use App\Schedule;
use App\GradeCategory;

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
        return view('teacher.panel', compact('sections', 'subjects', 'myClass', 'eventsCount', 'xd'));
    }

    public function recitation($id){
        $klase = GradeCategory::find($id)->class_id;
        $gradecateg = GradeCategory::find($id)->id;
        $myClass = Klase::where('class_id', $klase)->first();

        $class = ClassMembers::where('class_members.class_id', $klase)
        ->where('class_members.isCalled', 0) // 0 = not yet called , 1 = called not yet graded , 2 = graded and called
        ->join('classes', 'classes.class_id', '=', 'class_members.class_id')->get();

        return view('teacher.recitation', compact('myClass', 'class', 'gradecateg'));
    

    }

    public function recitationTool($class_id){
                $checkIfInClass = ClassMembers::where('class_id', $class_id)->where('student_id', Auth::user()->id);
        $checkIfInstructor = Klase::where('class_id', $class_id)->where('instructor_id', Auth::user()->id);
        
        if($checkIfInClass->count() > 0 or $checkIfInstructor->count()){


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
    else {
        abort(403);
    }
        
    }

     public function resetRecitation($class_id){

         $class = ClassMembers::where('class_id', $class_id)->update(['isCalled' => 0]);
         swal()->success('Successfully Resetted',[]);
     }

    public function gradeRec(Request $request){

                $request->validate([
    'grade' => 'required|integer|min:1',
    ]);

        $grade = new Grade;
        $grade->usr_id = $request->input('usr_id');
        $grade->category = $request->input('category');
        $grade->grade = $request->input('grade');
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
        $grade->grade = $request->input('grade');
        $grade->save();
    }


    public function groupGen($class_id){
        $checkIfInClass = ClassMembers::where('class_id', $class_id)->where('student_id', Auth::user()->id);
        $checkIfInstructor = Klase::where('class_id', $class_id)->where('instructor_id', Auth::user()->id);
        
        if($checkIfInClass->count() > 0 or $checkIfInstructor->count()){

        $myClass = Klase::where('class_id', $class_id)->first();

        return view('teacher.group-generator', compact('myClass'));
    }
    else {
        abort(403);
    }
    }

    public function createGradeCategory(Request $request)
    {
        $gradeC = new GradeCategory;
        $gradeC->class_id = $request->input('class_id');
        $gradeC->type = 'Recitation';
        $gradeC->save();

        return redirect()->route('recitation', $gradeC->id);

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
        $checkIfInClass = ClassMembers::where('class_id', $class_id)->where('student_id', Auth::user()->id);
        $checkIfInstructor = Klase::where('class_id', $class_id)->where('instructor_id', Auth::user()->id);
        
        if($checkIfInClass->count() > 0 or $checkIfInstructor->count()){

        $grades = ClassMembers::where('class_members.class_id', $class_id)
        ->join('grade_categories', 'class_members.class_id', '=', 'grade_categories.class_id')
        ->join('grades', 'grade_categories.id', '=', 'grades.category')
        ->orderBy('usr_id')
        ->distinct('usr_id')
        ->get();
        $myClass = Klase::where('class_id', $class_id)->with('class_members')->first();
        $klase = ClassMembers::where('class_id', $class_id)->first();



        return view('teacher.scores', compact('myClass', 'grades'));
    }
    else {
        abort(403);
    }
    }

    public function schedule()
    {
        $schedule = Schedule::get();

        $classes = Klase::where('instructor_id', Auth::user()->id)
        ->join('schedules', 'schedules.class_id', 'classes.class_id')
        ->get();

        return view('teacher.schedule', compact('schedule', 'classes'));
    }

    public function cards($class_id)
    {
        $myClass = Klase::where('class_id', $class_id)->first();
        $classlist = ClassMembers::where('class_id', $class_id)->get();
        return view('teacher.listcards', compact('myClass','classlist'));
    }

        public function singleCard($class_id, $id)
    {
        $myClass = Klase::where('class_id', $class_id)->first();
        $classlist = ClassMembers::where('class_id', $class_id)->get();
        $grades = Grade::where('class_id', $class_id)->where('usr_id', $id)->get();
        return view('teacher.card', compact('myClass','classlist', 'grades'));
    }
    public function startRec($class_id)
    {
        $myClass = Klase::where('class_id', $class_id)->first();
       
        return view('teacher.start', compact('myClass'));
    }

}


