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
use App\Grade;
use App\Notifications\AssignmentPosted;
use App\User;
use Carbon\Carbon;
use App\Notifications\GradedNotif;
use App\AssignScore;
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

        $request->validate([
            'body' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/|max:225',
            'title' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/|max:50',
            'deadline' => 'required|after:now',
            'file.*' => 'mimes:jpeg,gif,png,mp4,mp3,wav,ogg,avi,mkv,doc,csv,xlsx,xls,docx,ppt,odt,ods,odp,rtf,txt,pptx,zip,rar|max:25000'
        ]);

        $assignment = new Assignment;
        $assignment->body = $request->input('body');
        $assignment->title = $request->input('title');
        $assignment->class_id = $request->input('class_id');
        $assignment->usr_id = Auth::user()->id;
        $assignment->deadline = $request->input('deadline');
        $assignment->status = 0;
        $assignment->allow_late = $request->input('late');
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


 $users = User::join('class_members', 'class_members.student_id', '=', 'users.id')->where('class_id', $request->input('class_id'))->get();

        foreach ($users as $user) {
        $user->notify(new AssignmentPosted($thread));
        }

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

    public function viewSubmissions($id)
    {

        $submissions = AssignSubmission::where('assgn_id', $id)->get();
        $xd = Assignment::where('id', $id)->first();
        $myClass = Klase::where('class_id', $xd->class_id)->first();


        return view('teacher.submissions', compact('submissions', 'myClass', 'xd'));
    }

    public function viewAssignGrade($id)
    {

        $grades = AssignScore::where('assign_id', $id)->get();
        $xd = Assignment::where('id', $id)->first();
        $myClass = Klase::where('class_id', $xd->class_id)->first();


        return view('teacher.grade-assign', compact('grades', 'myClass', 'xd'));
    }

    public function singleSubmission($id)
    {

        $submission = AssignSubmission::where('id', $id)->first();
        $assign = Assignment::where('id', $submission->assgn_id)->first();
        $myClass = Klase::where('class_id', $assign->class_id)->first();
        return view('teacher.submission', compact('submission', 'assign', 'myClass'));
    }

    public function gradeAssign(Request $request){

    if(Grade::where('grade', $request->input('grade'))->whereDate('created_at', Carbon::today())->count() > 0 ){
        swal()->warning('Already Graded',[]);
        return back();
    }
    else {


    $request->validate([
    'grade' => 'required|integer|min:1',
    ]);

            AssignScore::create([
            'student_id' => $request->input('usr_id'),
            'assign_id' => $request->input('assign_id'),
            'score' => $request->input('grade'),
            'recorded_on' => \Carbon\Carbon::now()
        ]);


        $grade = new Grade;
        $grade->usr_id = $request->input('usr_id');
        $grade->class_id = $request->input('class_id');
        $grade->grade = $request->input('grade');
        $grade->type = 'Assignment';
        $grade->save();

        $user = User::find($request->input('usr_id'));
        $user->notify(new GradedNotif($grade));

        swal()->success('Successfully Graded',[]);
        return back();
    }
}
}
