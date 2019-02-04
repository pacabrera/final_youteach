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
            $schedule->timeFrom = $request->input('monday');
            $schedule->timeTo = $request->input('monday2');
            $schedule->room = $request->input('roomM');
            $schedule->save();
        }

        if($request->input('tuesday')){
            $schedule = new Schedule;
            $schedule->class_id = $klase->class_id;
            $schedule->day = 'T';
            $schedule->timeFrom = $request->input('tuesday');
            $schedule->timeTo = $request->input('tuesday2');
            $schedule->room = $request->input('roomT');
            $schedule->save();
        }
        if($request->input('wednesday')){
             $schedule = new Schedule;
            $schedule->class_id = $klase->class_id;
            $schedule->day = 'W';
            $schedule->timeFrom = $request->input('wednesday2');
            $schedule->timeTo = $request->input('wednesday2');
            $schedule->room = $request->input('roomW');
            $schedule->save();
        }
        if($request->input('thursday')){
             $schedule = new Schedule;
            $schedule->class_id = $klase->class_id;
            $schedule->day = 'TH';
            $schedule->timeFrom = $request->input('thursday');
            $schedule->timeTo = $request->input('thursday2');
            $schedule->room = $request->input('roomTH');
            $schedule->save();
        }
        if($request->input('friday')){
             $schedule = new Schedule;
            $schedule->class_id = $klase->class_id;
            $schedule->day = 'F';
            $schedule->timeFrom = $request->input('friday');
            $schedule->timeTo = $request->input('friday2');
            $schedule->room = $request->input('roomF');
            $schedule->save();
        }
        if($request->input('saturday')){
             $schedule = new Schedule;
            $schedule->class_id = $klase->class_id;
            $schedule->day = 'S';
            $schedule->timeFrom = $request->input('saturday');
            $schedule->timeTo = $request->input('saturday2');
            $schedule->room = $request->input('roomS');
            $schedule->save();
        }
       

         swal()->success('Class Created!',[]);
        return redirect()->route('class-forum', $klase->class_id);
    }
    public function show($class_id){
        
    }



}
