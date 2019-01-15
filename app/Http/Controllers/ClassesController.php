<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Klase;
use App\ClassMembers;
use App\Http\Requests\ClassRequest;
use Auth;
use App\Schedule;
class ClassesController extends Controller
{

      public function __construct()
    {
        $this->middleware('checkIfTeacher:permissions');

    }

 public function store(Request $request){
        $i_id = Auth::user()->id;//gets the id of the user
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
            $schedule = new Schedule;
            $schedule->class_id = $klase->class_id;
            $schedule->day = 'M';
            $schedule->time = $request->input('monday');
            $schedule->save();
        }

        if($request->input('tuesday')){
            $schedule = new Schedule;
            $schedule->class_id = $klase->class_id;
            $schedule->day = 'T';
            $schedule->time = $request->input('tuesday');
            $schedule->save();
        }
        if($request->input('wednesday')){
             $schedule = new Schedule;
            $schedule->class_id = $klase->class_id;
            $schedule->day = 'W';
            $schedule->time = $request->input('wednesday');
            $schedule->save();
        }
        if($request->input('thursday')){
             $schedule = new Schedule;
            $schedule->class_id = $klase->class_id;
            $schedule->day = 'TH';
            $schedule->time = $request->input('thursday');
            $schedule->save();
        }
        if($request->input('friday')){
             $schedule = new Schedule;
            $schedule->class_id = $klase->class_id;
            $schedule->day = 'F';
            $schedule->time = $request->input('friday');
            $schedule->save();
        }
        if($request->input('saturday')){
             $schedule = new Schedule;
            $schedule->class_id = $klase->class_id;
            $schedule->day = 'S';
            $schedule->time = $request->input('saturday');
            $schedule->save();
        }
       


        return redirect('/teacher');
    }
    public function show($class_id){
        
    }

}
