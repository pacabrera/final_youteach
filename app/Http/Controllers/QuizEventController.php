<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Klase;
use App\Questionnaire;
use App\Question;
use App\QuizEvent;
use App\StudentScore;
use App\UserProfile;
use Auth;
use App\Thread;
use App\Post;
use App\ClassMembers;
use App\Notifications\QuizPosted;
use App\User;


class QuizEventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the form for creating a new quiz event.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($class_id){
                $checkIfInClass = ClassMembers::where('class_id', $class_id)->where('student_id', Auth::user()->id);
        $checkIfInstructor = Klase::where('class_id', $class_id)->where('instructor_id', Auth::user()->id);
        
        if($checkIfInClass->count() > 0 or $checkIfInstructor->count()){

			$myClass = Klase::where('class_id', $class_id)->first();
        return view('teacher.create-quiz-event', compact('myClass'));
    }
    else {
        abort(403);
    }
    }

    /**
     * Store a newly created quiz event in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $class_id){
        $quiz_name = $request->input('q_name');
        $class_code = $class_id;

        $questions = $request->input('question'); //Question
        $types = $request->input('qt'); //Question types

        $i = $request->input('i'); //Correct answer for identification
        $mc = $request->input('mc'); //Choices for multiple choice
        $c_mc = $request->input('c-mc'); //Correct choice
        $tf = $request->input('tf'); //Correct answer for true or false

        $p = $request->input('points'); //Question point

        Questionnaire::create([
            'questionnaire_name' => $quiz_name,
        ]);

        $q_id = Questionnaire::count(); //Questionnaire id.

        for($x = 0; $x < count($questions); $x++){
            $question = $questions[$x];
            $choices = ""; //For multiple choice use.
            $answer = null; //Obviously.
            $points = $p[$x];

            if($types[$x] == 0){
                //ERROR
            }else if ($types[$x] == 1){//Identification
                $answer = $i[$x];
            }else if($types[$x] == 2){//Multiple choice
                $choices = $mc[$x][0] . ";" . $mc[$x][1] . ";" . $mc[$x][2] . ";" . $mc[$x][3];
                $answer = $c_mc[$x];
            }else if($types[$x] == 3){//True or False
                $answer = $tf[$x];
            }

            if(trim($question) == "" || is_null($question))
                continue;

            Question::create([
                'questionnaire_id' => $q_id,
                'question_name' => $question,
                'question_type' => $types[$x],
                'choices' => $choices,
                'answer' => $answer,
                'points' => $points
            ]);
        }

    $quizEvent = new QuizEvent;
        $quizEvent->quiz_event_name = $quiz_name;
        $quizEvent->questionnaire_id = $q_id;
        $quizEvent->class_id = $class_code;
        $quizEvent->quiz_event_status = 0;
    $quizEvent->save();

             $new_thread = [
            'title'               =>  $quiz_name,
            'usr_id'               => Auth::user()->id,
            'class_id'            => $class_code,
            'quiz_id' => $quizEvent->quiz_event_id,
            ];

        $thread = Thread::create($new_thread);
        
        $klase = Klase::find($class_code)->first();

        $new_post = [
            'thread_id' => $thread->id,
            'usr_id'               => Auth::user()->id,
            'body'                  => 'Quiz on '. $klase->class_name,
            ];

        $post = Post::create($new_post);

 $users = User::join('class_members', 'class_members.student_id', '=', 'users.id')->where('class_id', $class_code)->get();

        foreach ($users as $user) {
        $user->notify(new QuizPosted($thread));
        }

        return redirect()->route('quizzes', $class_code);
    }





    /**
     * Displays the specified quiz event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

            $usr_id = Auth::user()->id;
        
            $quiz_details = QuizEvent::with([
                        'Klase',
                        'Klase.subject',
                        'questionnaire'])
                        ->where('quiz_event_id', $id)
                        ->first();

            $results = QuizEvent::with([
                    'Klase.class_members.student_score' => function ($q) use($id){
                        $q->where('quiz_event_id', $id);
                    },
                    'Klase.class_members.user_profile'])
                    ->where('quiz_event_id', $id)
                    ->first();

            $qtn_id = QuizEvent::find($id)->questionnaire_id;
            $sum = Question::where('questionnaire_id', $qtn_id)->sum('points');
            $myClass = Klase::where('class_id', $results->class_id)->first();
            return view('teacher.manage-quiz', compact('quiz_details', 'results', 'sum', 'myClass'));
      
//Student cut next
/*

        */
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $quiz = QuizEvent::find($id);
        $quiz->quiz_event_status = $request->input('quiz_status');
        $quiz->save();
        //return "ID: $id" . "\n" . $request->input('quiz_status');
    }
}
