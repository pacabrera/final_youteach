<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Klase;
use App\ClassMembers;
use App\Http\Requests\ClassRequest;
use Auth;

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

        Klase::create([
            'class_id' => str_random(5),
            'instructor_id' => $i_id,
            'class_name' => $class_name,
            'section_id' => $section_id,
            'subject_id' => $subject_id,
            'class_active' => 1
        ]);

        return redirect('/teacher');
    }
    public function show($class_id){
        
    }

}
