<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\QuizEvent;
use App\UserProfile;
use App\StudentScore;
use App\StudentAnswer;
use App\ClassMembes;
use App\Grade;
use App\Question;

use Illuminate\Support\Facades\DB;

class TakeQuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $question_ids = $request->input('question_id');
        $answers = $request->input('answer');
        $quiz_event_id = $request->input('quiz_event_id');
        $student_id = Auth::user()->id;
        $class_id = QuizEvent::where('quiz_event_id', $quiz_event_id)->first();
         $sum = Question::where('questionnaire_id', $class_id->questionnaire_id)->sum('points');

        $class_id = QuizEvent::where('quiz_event_id', $quiz_event_id)->first();
        $check_exisiting = StudentScore::where('student_id', $student_id)
                            ->where('quiz_event_id', $quiz_event_id)
                            ->count();
                            
        if ($check_exisiting > 0){
            abort(403, 'You already took the quiz.');
        }

        for($x = 1; $x <= count($question_ids); $x++){
            StudentAnswer::create([
                'student_id' => $student_id,
                'quiz_event_id' => $quiz_event_id,
                'question_id' => $question_ids[$x],
                'student_answer' => $answers[$x]
            ]);
        }

        $answers = StudentAnswer::with('question')
                    ->where('student_id', $student_id)
                    ->get();

        $score = 0;
        foreach($answers as $answer){
            if($answer->student_answer == $answer->question->answer)
                $score += $answer->question->points;
        }

        StudentScore::create([
            'student_id' => $student_id,
            'quiz_event_id' => $quiz_event_id,
            'score' => $score,
            'recorded_on' => \Carbon\Carbon::now()
        ]);

        $grade = new Grade;
        $grade->usr_id = $student_id;
        $grade->class_id = $class_id->class_id;
        $grade->grade = $score;
        $grade->type = 'Quiz';
        $grade->hps = $sum;
        $grade->save();
     
        return redirect()->route('quiz-score', $quiz_event_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $usr_id = Auth::user()->id;

        $user_profile = UserProfile::find($usr_id);

        $QuizTaken = DB::table('quiz_student_score')
                        ->where('student_id', $usr_id)
                        ->where('quiz_event_id', $id)
                        ->get();

        if($QuizTaken->count() > 0){
            return abort(403, 'Quiz already taken');
        }

        $verify_quiz = DB::table('quiz_events')
                        ->join('class_members', 'class_members.class_id', '=', 'quiz_events.class_id')
                        ->where('student_id', $usr_id)
                        ->where('quiz_event_id', $id)
                        ->get();

        if ($verify_quiz->count() < 1){
            return abort(403, 'Not enrolled for this class to take the quiz.');
        }elseif($verify_quiz->where('quiz_event_status', 1)->count() < 1){
            abort(403, 'Quiz not yet started or already ended.');
        }else{
                $quiz = QuizEvent::find($id);

                $quiz_content = DB::table('questions')
                                ->select('question_id', 'question_name', 'choices', 'question_type')
                                ->join('questionnaires', 'questionnaires.questionnaire_id', '=', 'questions.questionnaire_id')
                                ->join('quiz_events', 'quiz_events.questionnaire_id', '=', 'questionnaires.questionnaire_id')
                                ->where('quiz_event_id', $id)
                                ->inRandomOrder()
                                ->get();

                $content = view('student.quiz.take-quiz', compact('quiz_content', 'quiz', 'user_profile'));

                return response($content)
                            ->header('Cache-Control', 'no-cache, must-revalidate')
                            ->header('Pragma', 'no-cache')
                            ->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
        }
    }
}
