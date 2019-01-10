@extends('layouts.app')
@section('title', 'Teacher - YouTeach')
@section('content')
 
 <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
          <!-- Post -->   
            <div class="row mb-4">            
              <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="card">
                  <div class="card-header"  style="background-color: #f55b5b; color: #e8e5e5;">




   <h1 class="text-left">Quiz Events</h1>
</div>
                        <div class="col-10">
                            <h4>Current Quizzes</h4>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Topic</th>
                                        <th>Subject</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($quiz_events as $qe)
                                        <tr id="quiz_entry{{ $qe->quiz_event_id }}">
                                            <td><a href="{{ route('quiz.show', $qe->quiz_event_id) }}">{{ $qe->quiz_event_name }}</a></td>
                                            <td>{{ $qe->klase->subject->subject_desc }}</td>
                                            @if($qe->quiz_event_status == 1)
                                            <td>Active</td>
                                            @else
                                             <td>Disabled</td>
                                             @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if(count($finished_quiz_events) >= 1)
                            <div class="col-10">
                                <h4>Past Quizzes</h4>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Topic</th>
                                            <th>Subject</th>
                                            <th>Class</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($finished_quiz_events as $qe)
                                            <tr>
                                                <td><a href="{{ route('quiz.show' , $qe->quiz_event_id) }}">{{ $qe->quiz_event_name }}</a></td>
                                                <td>{{ $qe->klase->subject->subject_desc }}</td>
                                                <td>{{ $qe->klase->class_name}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        {{--  <button class="btn btn-primary" data-toggle="modal" data-target="#NewQuizEventModal">New quiz event</button>  --}}
                        <a class="btn btn-primary" href="{{ route('quiz.create', $class_id) }}">New quiz event</a>
</div>


@endsection