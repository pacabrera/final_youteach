<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Storage;
use App\Klase;
use App\QuizEvent;
use App\Subject;
use App\User;
use App\StudentClass;
use App\UserProfile;
use App\Section;

use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function Home(){
        return view('home');
    }

    public function quizEvents($class_id){    
        $id = Auth::user()->id;
                            
            $quiz_events = QuizEvent::with([
                    'Klase' => function($q) use($id){
                        $q->where('instructor_id', $id);
                    },
                    'Klase.subject'])
                    ->where('quiz_event_status', 0)
                    ->orWhere('quiz_event_status',1)
                    ->get()
                    ->where('class_id', '=', $class_id);


            $finished_quiz_events = QuizEvent::with([
                    'Klase' => function($q) use($id){
                        $q->where('instructor_id', $id);
                    },
                    'Klase.subject'])
                    ->where('quiz_event_status', 2)
                    ->get()
                   ->where('class_id', '=', $class_id);

            return view('teacher.quiz', compact('quiz_events', 'finished_quiz_events', 'class_id'));
        }

    public function RedirectToAppropriatePanel(){    
            $upcoming_quiz = QuizEvent::with([
                    'Klase',
                    'Klase.student_class' => function ($q) use($id){
                        $q->where('student_id', $id);
                    },
                    'Klase.subject'])
                    ->where('quiz_event_status', 0)
                    ->get();
            
            $pending_quiz = DB::table('quiz_events')//Gets pending quiz (quiz_event_status = 1)
                ->select('quiz_event_name', 'subject_desc', 'quiz_events.quiz_event_id')
                ->join('Klases', 'quiz_events.class_id', '=', 'Klases.class_id')
                ->join('subjects', 'subjects.subject_id', '=', 'Klases.subject_id')
                ->join('student_Klases', 'student_Klases.class_id', '=', 'quiz_events.class_id')
                ->where('student_Klases.student_id', $id)
                ->where('quiz_event_status', 1)
                ->get();

            //return $pending_quiz;

            $finished_quiz = QuizEvent::with([//Gets quiz that have been concluded.
                    'Klase',
                    'Klase.subject',
                    'Klase.student_class' => function ($q) use($id){
                        $q->where('student_id', $id);
                    },
                    'Klase.student_class.student_score'])
                    ->where('quiz_event_status', 2)
                    ->get();

            return view('panel.student', compact('pending_quiz', 'upcoming_quiz', 'finished_quiz', 'url'));
        }
    
    
    /* Function Add News
    public function uploadAws (Request $request){
        //Handles the file upload
        $file = $request->file('news_img');
        $file = $request->photo;
        if($request->hasFile('news_img')) {
          //Get filename with the extension
          $filenameWithExt = $request->file('news_img')->getClientOriginalName();
          //Get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          //Get just ext
          $extension = $request->file('news_img')->getClientOriginalExtension();
          //Filename to store
          $fileNameToStore = $filename.'.'.$extension;
          //Upload the image
$path = $request->file('news_img')->storeAs(
    $fileNameToStore, $request->user()->id, 's3'
);
        }

        else {
          $fileNameToStore = 'no_image.png';
        }

        return view('panel.student');
    }
*/
    
}
