<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Klase;
use App\ClassMembers;
use App\UserProfile;
use Auth;
use App\Post;
use App\Comment;
use App\User;
use App\Event;

class StudentViewController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');

    }

    //Student Redirect After Login
    public function studentPanel()
    {   
        $usr = UserProfile::where('id', Auth::user()->id)->first();
        $checkClass = Klase::join('class_members', 'classes.class_id', '=', 'class_members.class_id')->where('class_members.student_id', Auth::user()->id)
        ->get();

        $eventsCount = Event::all()->count();

        return view('student.student', compact('checkClass', 'usr', 'eventsCount'));
    }

    //View Class per Class Code
    public function viewClass($id)
    {   
        $usr = UserProfile::where('id', Auth::user()->id)->first();
        
        $checkClass = ClassMembers::where('class_members.student_id', Auth::user()->id)
        ->join('classes', 'classes.class_id', '=', 'class_members.class_id')
        ->get();

        $posts = Post::where('class_id',  $id)->orderBy('created_at', 'desc')->get();
		$comments = Comment::orderby('created_at', 'desc')->get();
        $myClass = Klase::where('class_id', $id)->first();
        return view('student.class', compact('myClass', 'checkClass', 'usr', 'posts','comments'));
    }

    //Join Class
    public function JoinClass(Request $request){
        $request->validate([
            'class_code' => 'exists:classes,class_id|string',
        ]);

        $is_joined = ClassMembers::where('class_id', $request->input('class_code'))
                        ->where('student_id', Auth::user()->id)
                        ->count();
        if($is_joined){
            return response('Already joined!', 422);
        }else{
            ClassMembers::create([
                'student_id' => Auth::user()->id,
                'class_id' => $request->input('class_code'),
            ]);
        }
      }

    public function settingsView(){
        $usr = UserProfile::where('id', Auth::user()->id)->first();
        $checkClass = ClassMembers::where('class_members.student_id', Auth::user()->id)
        ->join('classes', 'classes.class_id', '=', 'class_members.class_id')
        ->get();
        return view('student.settings', compact('checkClass', 'usr'));
    }

    public function postStore(Request $request, $class_id){

        $file = $request->file('file');
        $file = $request->photo;
        if($request->hasFile('file')) {
          //Get filename with the extension
          $filenameWithExt = $request->file('file')->getClientOriginalName();
          //Get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //Get just ext
          $extension = $request->file('file')->getClientOriginalExtension();
          //Filename to store
          $fileNameToStore = $filename.'.'.$extension;
          //Upload the image
          $path = $request->file('file')->storeAs(
          $fileNameToStore, $request->user()->id, 's3'
            );
        }

        else{
            $fileNameToStore = 'NULL';
        }

        $post = new Post;
        $post->body = $request->input('body');
        $post->usr_id = Auth::user()->id;
        $post->class_id = $class_id;
        $post->post_image = $fileNameToStore;
        $post->save();

        return back();
    }

    public function postComment(Request $request){

        $comment = new Comment;
        $comment->comment = $request->data;
        $comment->usr_id = Auth::user()->id;
        $comment->post_id = $request->post;
        $comment->save();

        return 'success';
    }
}
