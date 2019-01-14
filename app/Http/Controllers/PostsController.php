<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Klase;
use App\Section;
use App\Subject;
use App\Post;
use App\UserProfile;
use App\User;
use App\Comment;
use App\ClassMembers;
use App\Grade;
use App\Thread;
use Alert;
use Softon\SweetAlert\Facades\SWAL; 
use App\PostFiles;
use App\Assignment;
use Illuminate\Support\Facades\Storage;
use App\AssignFile;
use App\AssignSubmission;
use App\AssignSubmissionFile;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewClass($class_id)
    {
        $threads = Thread::where('class_id',  $class_id)->orderBy('created_at', 'desc')->get();
        $myClass = Klase::where('class_id', $class_id)->first();
        return view('teacher.class', compact('myClass', 'threads'));
    }


    public function postStore(Request $request){

        $new_thread = [
            'title'               =>  $request->input('title'),
            'usr_id'               => Auth::user()->id,
            'class_id'            => $request->input('class_id'),
            ];

        $thread = Thread::create($new_thread);
      
        $new_post = [
            'thread_id' => $thread->id,
            'usr_id'               => Auth::user()->id,
            'body'                  => $request->input('body'),
            ];
        $post = Post::create($new_post);

        if($request->hasFile('file')) {
        foreach ($request->file as $file) {
            $filename = $file->getClientOriginalName();
            $file->storeAs($filename, 's3');
            $filePath = 'post_files/' . $filename;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            $fileModel = new PostFiles;
            $fileModel->file = $filename;
            $fileModel->post_id = $post->id;
            $fileModel->save();         
        }
    }

        
        return redirect()->route('class-forum', $request->input('class_id'));
    }

    public function postComment(Request $request, $id){

        $comment = new Post;
        $comment->body = $request->input('comment');
        $comment->usr_id = Auth::user()->id;
        $comment->thread_id = $id;
        $comment->save();
        return redirect()->route('post-single', $id);
       
    }


  public function show($id){
    $threads = Thread::where('id', $id)->first();
    $myClass = Klase::where('class_id', $threads->class_id)->first();
    return view('teacher.post', compact('myClass', 'threads'));
  }

  public function showAssign($class_id)
    {
        $assignments = Assignment::where('class_id', $class_id)->get();
        $myClass = Klase::where('class_id', $class_id)->first();
        return view('teacher.assignment', compact('myClass', 'assignments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function turnIn($id)
    {
        $assignment = Assignment::where('id', $id)->first();
        $myClass = Klase::where('class_id', $assignment->class_id)->first();

        return view('teacher.turn-in', compact('myClass', 'assignment'));
    }
    public function turnInPost(Request $request, $id)
    {
        $checkIfLocked = Assignment::where('id', $id)->where('status', 1);
        $checkIfAlreadySubmitted = AssignSubmission::where('assgn_id', $id)->where('usr_id', Auth::user()->id);
        if($checkIfLocked->count() > 0){
            swal()->warning('Assignment is Currently Locked',[]);
        }
        elseif($checkIfAlreadySubmitted->count()  > 0){
            swal()->warning('You already submit your Assignment!',[]);
        }
        else {


        $submission = new AssignSubmission;
        $submission->response = $request->input('body');
        $submission->assgn_id = $id;
        $submission->usr_id = Auth::user()->id;
        $submission->save();

        if($request->hasFile('file')) {
        foreach ($request->file as $file) {
            $filename = $file->getClientOriginalName();
            $file->storeAs($filename, 's3');
            $filePath = 'assign_submissions/' . $filename;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            $fileModel = new AssignSubmissionFile;
            $fileModel->file = $filename;
            $fileModel->submission_id = $submission->id;
            $fileModel->save();         
        }  
        swal()->success('Successfully Submitted Assignment',[]);

    }

    }
        $assignment = Assignment::where('id', $id)->first();
        $myClass = Klase::where('class_id', $assignment->class_id)->first();

        return view('teacher.turn-in', compact('myClass', 'assignment'));
    }
}
