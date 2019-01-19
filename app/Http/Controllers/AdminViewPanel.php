<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\User;
use App\Event;
use App\Klase;
use App\Schedule;

class AdminViewPanel extends Controller
{
    public function __construct()
    {
        $this->middleware('checkIfAdmin:permissions');

    }

    public function index()
    {
    	$students = User::where('permissions', '2')->get();
        $events = Event::get();
        return view('admin.panel', compact('students', 'events'));
    }

    public function audits()
    {

$audits = Post::find(1)->audits;

        return view('admin.audits', compact('audits'));
    }

    public function viewClasses()
    {
        $classes = Klase::get();
        return view('admin.classes.manage-classes', compact('classes'));
    }

    public function newClassView()
    {
        return view('admin.classes.add-class');
    }

    public function addClass(Request $request){

        $request->validate([
    'class_name' => 'required|string|unique:classes,class_name|max:191',
    ]);


        $i_id = $request->input('instructor');//gets the id of the user
        $class_name = $request->input('class_name');
        $section_id = $request->input('section_id');
        $subject_id = $request->input('subject_id');

        $new_class = [
            'class_id' => str_random(5),
            'instructor_id' => $i_id,
            'class_name' => $class_name,
            'section_id' => $section_id,
            'subject_id' => $subject_id,
            'class_active' => 1
        ];

        $klase = Klase::create($new_class);

        $schedule = new Schedule;
        $schedule->class_id = $klase->class_id;

        if($request->input('monday')){
            $request->validate([
            'roomM' => 'required|string|max:191',
            'monday' => 'required|date_format:H:i',
            'monday2' => 'required|date_format:H:i|after:'.$request->input('monday'),
            ]);

            $schedule = new Schedule;
            $schedule->class_id = $klase->class_id;
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
            $schedule->class_id = $klase->class_id;
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
            $schedule->class_id = $klase->class_id;
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
            $schedule->class_id = $klase->class_id;
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
            $schedule->class_id = $klase->class_id;
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
            $schedule->class_id = $klase->class_id;
            $schedule->day = 'S';
            $schedule->timeFrom = $request->input('saturday');
            $schedule->timeTo = $request->input('saturday2');
            $schedule->room = $request->input('roomS');
            $schedule->save();
        }
       
        return redirect()->route('view-classes');
    }

    public function editClassView()
    {
        return view('admin.classes.edit-class');
    }

}
