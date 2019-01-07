<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;

class SectionsController extends Controller
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
        $sections = section::with('klase')->get();
        //return $sections;
        $section = section::first();
        return view('admin.sections', compact('sections', 'all'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $sections = new section;
        $sections->section_name = $request->input('s_code');
        $sections->save();

        swal()->success('Successfully Added!',[]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $section = section::find($id);
        $section->section_name = $request->input('s_code');
        $section->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        section::destroy($id);
    }
}
