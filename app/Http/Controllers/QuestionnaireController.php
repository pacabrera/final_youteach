<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Questionnaire;
use App\UserProfile;
use App\Section;
use App\Subject;
use Auth;
use App\Klase;

class QuestionnaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $q = Questionnaire::with('question')
                        ->where('questionnaire_id', $id)
                        ->first();
        // return $q;
        // 
        //Include in All Teacher Pages
            $usr = UserProfile::where('id', Auth::user()->id)->first();
            $sections = Section::get();
            $subjects = Subject::get();
            $klase = Klase::where('instructor_id', Auth::user()->id)->get();


        return view('teacher.manage-questionnaire', compact('q','sections', 'subjects', 'usr', 'klase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
