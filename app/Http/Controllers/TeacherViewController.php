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
use App\Notifications\GradedNotif;

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

    public function recitation($class_id){
                $checkIfInClass = ClassMembers::where('class_id', $class_id)->where('student_id', Auth::user()->id);
        $checkIfInstructor = Klase::where('class_id', $class_id)->where('instructor_id', Auth::user()->id);
        
        if($checkIfInClass->count() > 0 or $checkIfInstructor->count()){
        $myClass = Klase::where('class_id', $class_id)->first();
        $class = ClassMembers::where('class_members.class_id', $class_id)
        ->where('class_members.isCalled', 0) // 0 = not yet called , 1 = called not yet graded , 2 = graded and called
        ->join('classes', 'classes.class_id', '=', 'class_members.class_id')->get();
        return view('teacher.recitation', compact('myClass', 'class'));
    }
    else {
        abort(403);
    }
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
        $grade->class_id = $request->input('class_id');
        $grade->grade = $request->input('grade');
        $grade->type = 'Recitation';
        $grade->save();
        $student_id = $request->input('usr_id') ;
        $class = ClassMembers::where('student_id', $student_id);
        $class->update(['isCalled' => 1]);
        swal()->success('Successfully Graded',[]);

        $user = User::find($request->input('usr_id'));
        $user->notify(new GradedNotif($grade));
      
        return back();
    }
    public function gradeGroup(Request $request){

        $grade = new Grade;
        $grade->usr_id = $request->input('student_id');
        $grade->class_id = $request->input('class_id');
        $grade->grade = $request->input('grade');
        $grade->type = 'Activity';
        $grade->save();

        $user = User::find($request->input('student_id'));
        $user->notify(new GradedNotif($grade));

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
        $user = UserProfile::where('id', $id)->first();
        $grades = Grade::where('class_id', $class_id)->where('usr_id', $id)->join('user_profiles', 'grades.usr_id', 'user_profiles.id')->get();
        return view('teacher.card', compact('myClass','classlist', 'grades', 'user'));
    }
    public function startRec($class_id)
    {
        $myClass = Klase::where('class_id', $class_id)->first();
       
        return view('teacher.start', compact('myClass'));
    }

    public function classSettings($class_id){
        $myClass = Klase::where('class_id', $class_id)->first();
        return view('teacher.settings', compact('myClass'));
    }

        public function editClassPost(Request $request, $class_id)
    {
        
        $request->validate([
    'class_name' => 'required|string|unique:classes,class_name|max:191',
    ]);

        $klase = Klase::find($class_id);
        $klase->class_name = $request->input('class_name');
        $klase->section_id = $request->input('section_id');
        $klase->subject_id = $request->input('subject_id');
        $klase->save();

        swal()->success('Successfully Edited',[]);
        return redirect()->route('class-forum', $class_id);
    }

    public function schedules($class_id)
    {
        $myClass = Klase::where('class_id', $class_id)->first();
        return view('teacher.sched', compact('myClass'));
    }

    public function editSched(Request $request, $class_id)
    {
        $schedule = Schedule::find($class_id);

        if($request->input('monday')){
            $request->validate([
            'roomM' => 'required|string|max:191',
            'monday' => 'required|date_format:H:i',
            'monday2' => 'required|date_format:H:i|after:'.$request->input('monday'),
            ]);

            $schedule = new Schedule;
            $schedule->class_id = $class_id;
            $schedule->day = 'M';
            $schedule->timeFrom = $request->input('monday');
            $schedule->timeTo = $request->input('monday2');
            $schedule->room = $request->input('roomM');
            $schedule->save();
        }

        if($request->input('tuesday')){
        $request->validate([
            'roomT' => 'required|string|max:191',
            'tuesday' => 'required|date_format:H:i',
            'tuesday2' => 'required|date_format:H:i|after:'.$request->input('tuesday'),
            ]);
            $schedule = new Schedule;
            $schedule->class_id =  $class_id;
            $schedule->day = 'T';
            $schedule->timeFrom = $request->input('tuesday');
            $schedule->timeTo = $request->input('tuesday2');
            $schedule->room = $request->input('roomT');
            $schedule->save();
        }
        if($request->input('wednesday')){
            $request->validate([
            'roomW' => 'required|string|max:191',
            'wednesday' => 'required|date_format:H:i',
            'wednesday2' => 'required|date_format:H:i|after:'.$request->input('wednesday'),
            ]);
             $schedule = new Schedule;
            $schedule->class_id =  $class_id;
            $schedule->day = 'W';
            $schedule->timeFrom = $request->input('wednesday');
            $schedule->timeTo = $request->input('wednesday2');
            $schedule->room = $request->input('roomW');
            $schedule->save();
        }
        if($request->input('thursday')){
            $request->validate([
            'roomTH' => 'required|string|max:191',
            'thursday' => 'required|date_format:H:i',
            'thursday2' => 'required|date_format:H:i|after:'.$request->input('thursday'),
            ]);
            $schedule = new Schedule;
            $schedule->class_id =  $class_id;
            $schedule->day = 'TH';
            $schedule->timeFrom = $request->input('thursday');
            $schedule->timeTo = $request->input('thursday2');
            $schedule->room = $request->input('roomTH');
            $schedule->save();
        }
        if($request->input('friday')){
            $request->validate([
            'roomF' => 'required|string|max:191',
            'friday' => 'required|date_format:H:i',
            'friday2' => 'required|date_format:H:i|after:'.$request->input('friday'),
            ]);
             $schedule = new Schedule;
            $schedule->class_id =  $class_id;
            $schedule->day = 'F';
            $schedule->timeFrom = $request->input('friday');
            $schedule->timeTo = $request->input('friday2');
            $schedule->room = $request->input('roomF');
            $schedule->save();
        }
        if($request->input('saturday')){
            $request->validate([
            'roomS' => 'required|string|max:191',
            'saturday' => 'required|date_format:H:i',
            'saturday2' => 'required|date_format:H:i|after:'.$request->input('saturday'),
            ]);
             $schedule = new Schedule;
            $schedule->class_id =  $class_id;
            $schedule->day = 'S';
            $schedule->timeFrom = $request->input('saturday');
            $schedule->timeTo = $request->input('saturday2');
            $schedule->room = $request->input('roomS');
            $schedule->save();
        }
       swal()->success('Successfully Created',[]);
       return redirect()->route('class-forum', $class_id);
    }

}


