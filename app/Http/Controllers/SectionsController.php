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
    
    public function create()
    {
        return view('admin.section.add-section');
    }
    public function index(){
        $sections = section::with('klase')->get();
        //return $sections;
        $section = section::first();
        return view('admin.sections', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
    'section_name' => 'required|string|unique:sections,section_name|max:191',
    ]);
        $sections = new Section;
        $sections->section_name = $request->input('section_name');
        $sections->save();

        return redirect()->route('sections.index');

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $section = Section::find($id);
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
        Section::destroy($id);
        
    }
}
