<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Klase;
use App\Assignment;
use Illuminate\Support\Facades\Storage;
use App\AssignFile;
use App\AssignSubmission;
use App\AssignSubmissionFile;
use App\Thread;
use App\Post;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('checkIfTeacher:permissions');

    }
    public function index($class_id)
    {

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


        $assignment = new Assignment;
        $assignment->body = $request->input('body');
        $assignment->title = $request->input('title');
        $assignment->class_id = $request->input('class_id');
        $assignment->usr_id = Auth::user()->id;
        $assignment->deadline = $request->input('deadline');
        $assignment->status = $request->input('status');
        $assignment->save();

        if($request->hasFile('file')) {
        foreach ($request->file as $file) {
            $filename = $file->getClientOriginalName();
            $file->storeAs($filename, 's3');
            $filePath = 'assign_files/' . $filename;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            $fileModel = new AssignFile;
            $fileModel->file = $filename;
            $fileModel->assgn_id = $assignment->id;
            $fileModel->save();         
        }
    }

             $new_thread = [
            'title'               =>  $request->input('title'),
            'usr_id'               => Auth::user()->id,
            'class_id'            => $request->input('class_id'),
            'assign_id' => $assignment->id,
            ];

        $thread = Thread::create($new_thread);
      
        $new_post = [
            'thread_id' => $thread->id,
            'usr_id'               => Auth::user()->id,
            'body'                  => $request->input('body'),
            ];

        $post = Post::create($new_post);

        return back();
    }

    /**
     * Display the specified resource.
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
