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
use App\Notifications\ThreadPosted;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewClass($class_id)
    {
        $checkIfInClass = ClassMembers::where('class_id', $class_id)->where('student_id', Auth::user()->id);
        $checkIfInstructor = Klase::where('class_id', $class_id)->where('instructor_id', Auth::user()->id);

        if($checkIfInClass->count() > 0 or $checkIfInstructor->count()){
            $threads = Thread::where('class_id',  $class_id)->orderBy('created_at', 'desc')->get();
            $myClass = Klase::where('class_id', $class_id)->first();
            return view('teacher.class', compact('myClass', 'threads'));
        }
        else{
            abort(403);
        }
    }


    public function postStore(Request $request){

        $request->validate([
            'title' => 'required|string|max:191',
            'class_id' => 'required',
            'body' => 'required|string|max:225',
            'video' => "nullable|['regex:@(https?://)?(?:www\.)?(youtu(?:\.be/([-\w]+)|be\.com/watch\?v=([-\w]+)))\S*@']",
            'file.*' => 'mimes:jpeg,gif,png,mp4,mp3,wav,ogg,avi,mkv,doc,csv,xlsx,xls,docx,ppt,odt,ods,odp,rtf,txt,pptx,zip,rar|max:25000'
            ]);

        $input_data = $request->all();


        $new_thread = [
            'title'               =>  $request->input('title'),
            'usr_id'               => Auth::user()->id,
            'class_id'            => $request->input('class_id'),
            'video'                 => $request->input('video'),
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
        $users = User::join('class_members', 'class_members.student_id', '=', 'users.id')->where('class_id', $request->input('class_id'))->get();

        foreach ($users as $user) {
        $user->notify(new ThreadPosted($thread));
        }

        return redirect()->route('class-forum', $request->input('class_id'));
    }

    public function postComment(Request $request, $id){
            $request->validate([
            'comment' => 'required|string|max:225',
            ]);

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
                $checkIfInClass = ClassMembers::where('class_id', $class_id)->where('student_id', Auth::user()->id);
        $checkIfInstructor = Klase::where('class_id', $class_id)->where('instructor_id', Auth::user()->id);
        
        if($checkIfInClass->count() > 0 or $checkIfInstructor->count()){

        $assignments = Assignment::where('class_id', $class_id)->get();
        $myClass = Klase::where('class_id', $class_id)->first();
        return view('teacher.assignment', compact('myClass', 'assignments'));
    }
    else {
        abort(403);
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function turnIn($id)
    {
        $checkIfAlreadySubmitted = AssignSubmission::where('assgn_id', $id)->where('usr_id', Auth::user()->id)->first();
        $assignment = Assignment::where('id', $id)->first();
        $myClass = Klase::where('class_id', $assignment->class_id)->first();
        if(!empty($checkIfAlreadySubmitted)){
            return view('teacher.submitted', compact('myClass', 'assignment', 'checkIfAlreadySubmitted'));
        }
        else {
        return view('teacher.turn-in', compact('myClass', 'assignment'));
    }
    }
    public function turnInPost(Request $request, $id)
    {
    	$assignment = Assignment::where('id', $id)->first();
        $myClass = Klase::where('class_id', $assignment->class_id)->first();
        $checkIfLocked = Assignment::where('id', $id)->where('status', 1)->first();
        $checkIfLocked2 = Assignment::where('id', $id)->where('allow_late', 1)->first();
        $checkIfLocked3 = Assignment::where('id', $id)->where('allow_late', 0)->first();
        $checkIfAlreadySubmitted = AssignSubmission::where('assgn_id', $id)->where('usr_id', Auth::user()->id)->first();

        if(!empty($checkIfLocked) and !empty($checkIfLocked3)){
            swal()->warning('Assignment is Currently Locked',[]);
            return redirect()->route('class-forum', $myClass->class_id);
        }
        elseif($checkIfAlreadySubmitted){
            swal()->warning('You already submit your Assignment!',[]);
            return redirect()->route('class-forum', $myClass->class_id);
        }
        elseif(!empty($checkIfLocked) and !empty($checkIfLocked2)){
            $submission = new AssignSubmission;
            $submission->response = 'ss';
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

            
        }
        swal()->success('Successfully Submitted','Your assignment is submitted as LATE, kindly submit your next assignments on time!',[]);
            return redirect()->route('class-forum', $myClass->class_id);
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
        

    }
		swal()->success('Successfully Submitted Assignment',[]);
        return redirect()->route('class-forum', $myClass->class_id);
    }

        
    }

    public function editPost($id, Request $request)
    {
        $post = Post::find($id);
        $post->body = $request->input('body');
        $post->save();
        swal()->success('Successfully Edited',[]);
    }

    public function delPost($id, Request $request)
    {
    $post = Post::find($id);
        if($post) {
            $post->delete();
            swal()->success('Successfully Deleted',[]);
        }

        else {
          return back()->with('error', 'Error.');
        }
    }
}
