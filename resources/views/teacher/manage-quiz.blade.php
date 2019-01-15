@extends('layouts.app')
@section('title', 'Quiz')
@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
          <!-- Post -->   
            <div class="row mb-4">            
              <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="card">
                  <div class="card-header"  style="background-color: #f55b5b; color: #e8e5e5;">
                    <h3> {{ $myClass->class_name}} </h3>
                    <p>{{ $myClass->user_profile->given_name }} {{ $myClass->user_profile->family_name }} | {{ $myClass->subject->subject_desc}} | {{ $myClass->section->section_name}}</p> 
                  </div>
                     <div class="card-body">
    <h2>Manage Quizzes</h2>
    <hr>
    <div class="row">
        <div class="col-lg-9">
            <h3>{{ $quiz_details->quiz_event_name }}</h3>
            <p>This is some basic information about the quiz.</p>
            <p>Class:
                <b>
                    <a href="/manage/class/view{{ $quiz_details->class_id }}"></a>{{ $quiz_details->klase->class_name }}</b>
            </p>
            <p>Subject:
                <b>{{ $quiz_details->klase->subject->subject_desc }}</b>
            </p>
            <p>Questionnaire:
                <b>
                    <a href="{{ route('questionnaire.show', $quiz_details->questionnaire->questionnaire_id) }}">{{ $quiz_details->questionnaire->questionnaire_name }}</a>
                </b>
            </p>
        </div>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function ChangeQuizStatus(quiz_event_id, quiz_status) {
                $.ajax({
                    url: '/teacher/quiz/' + quiz_event_id, //Your api url
                    type: 'PUT', //type is any HTTP method
                    data: {quiz_status}, //Data as js object
                    success: function () {
                        window.location.reload(true);
                    }
                });
            }
        </script>
        <div class="col-lg-3" id="quiz_actions">
            <!-- Use PUT method to update -->
            @if($quiz_details->quiz_event_status == 0)
            <button href="" onclick="javascript:ChangeQuizStatus({{ $quiz_details->quiz_event_id }}, 1)" class="btn btn-primary">Enable Quiz</button>
            @elseif($quiz_details->quiz_event_status == 1)
            <button href="" onclick="javascript:ChangeQuizStatus({{ $quiz_details->quiz_event_id }}, 0)" class="btn btn-primary">Disable Quiz</button>
            <button href="" onclick="javascript:ChangeQuizStatus({{ $quiz_details->quiz_event_id }}, 2)" class="btn btn-primary btn-danger">End Quiz</button>
            @endif
        </div>
        <div class="col-lg-9 pt-4">
            <h3>Quiz Results</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Score</th>
                        <th>Rating</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($results->klase->class_members as $result)
                    <tr>
                        <td>{{ $result->user_profile->family_name }}, {{ $result->user_profile->given_name }} {{ $result->user_profile->ext_name
                            }} {{ $result->user_profile->middle_name }}</td>
                        <td>
                            @if(is_null($result->student_score))
                            <i>not taken</i>
                            @else {{ $result->student_score->score }} / {{$sum}}@endif
                        </td>
                        <td>
                        @php
                            try{$ave = $result->student_score->score / $sum;}catch(Exception $e){$ave = 0;}
                                        
                            echo (number_format($ave, 2) * 100) . "%";
                        @endphp
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p class="text-center">---NOTHING FOLLOWS---</p>
        </div>
        
    </div>


</section>

@endsection