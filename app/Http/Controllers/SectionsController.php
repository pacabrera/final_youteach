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
        $sections = section::with('klase')->get();

        return view('admin.section.add-section', compact('sections'));
    }
    public function index(){
        $sections = section::with('klase')->get();
        //return $sections;
        $section = section::first();
        return view('admin.section.manage-sections', compact('sections'));
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

        swal()->success('Successfully Created',[]);
        return redirect()->route('sections.index');

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $section = Section::find($id);
        return view('admin.section.edit-section', compact('section'));
    }
    public function update(Request $request, $id){
        $request->validate([
        'section_name' => 'required|string|max:191',
        ]);

        $section = Section::find($id);
        $section->section_name = $request->input('section_name');
        $section->save();
        swal()->success('Successfully Edited',[]);
        return redirect()->route('sections.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSection(Request $request, $id){
        $section = Section::find($id);
        if($section) {
            $section->delete();
            swal()->success('Successfully Deleted',[]);
            return redirect()->route('sections.index');
        }

        else {
          return back()->with('error', 'Error.');
        }
    }
}
