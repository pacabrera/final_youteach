<?php

namespace App\Http\Controllers;
use App\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkIfAdmin:permissions');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $subjects = Subject::with('klase')->get();
        //return $subjects;
        
        return view('admin.subjects.subjects', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->validate($request,[
            'Subject_Code' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/|max:50|unique:subjects,subject_code',
            'Subject_Description' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/|max:50',
        ]);

        $subject = new Subject;
        $subject->subject_code = $request->input('Subject_Code');
        $subject->subject_desc = $request->input('Subject_Description');


        $subject->save();
        swal()->success('Successfully Created',[]);
        return redirect()->route('subjects.index');



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $this->validate($request,[
            'Subject_Code' => 'required|regex:/(^[A-Za-z ]+$)+/|max:50|',
            'Subject_Description' => 'required|regex:/(^[A-Za-z ]+$)+/|max:50',
        ]);

        $subject = Subject::find($id);
        $subject->subject_code = $request->input('Subject_Code');
        $subject->subject_desc = $request->input('Subject_Description');
        $subject->save();

        swal()->success('Successfully Edited',[]);
        return redirect()->route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Subject::destroy($id);
        swal()->success('Successfully Deleted',[]);
    }

    public function create(){
        return view('admin.subjects.add-subject');
    }

    public function edit($id){
        $subject = Subject::find($id);
         return view('admin.subjects.edit-subject', compact('subject'));

    }
}
