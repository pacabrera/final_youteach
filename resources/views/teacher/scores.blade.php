@extends('layouts.app')
@section('title')

@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
          <!-- Post -->   
            <div class="row mb-4">            
              <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="card">
                  <div class="card-header"  >
                    <h3> {{ $myClass->class_name}} </h3>
                    <p>{{ $myClass->user_profile->given_name }} {{ $myClass->user_profile->family_name }} | {{ $myClass->subject->subject_desc}} | {{ $myClass->section->section_name}}</p> 
                  </div>
                  <div class="card-body" >
            <div class="row">
              <!-- Basic Form-->

              <!-- Form Elements -->
              <div class="col-lg-12 mb-5">
                <div class="card">
                  <div class="card-body">
                    <div class="container">

            <div class="row">
               <table id="gradesTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr >
                <th>Student Name</th>
                @foreach($quizzes as $quiz)
                <th class="{{$quiz->quiz_event_name}}">{{$quiz->quiz_event_name}}</th>
                @endforeach
                </tr>
                </thead>

                <tbody class="table-hover">
                @foreach($class_members as $stud)
                <tr>
                        <td>{{ $stud->user_profile->family_name }}, {{ $stud->user_profile->given_name }} {{ $stud->user_profile->ext_name
                            }} {{ substr($stud->user_profile->middle_name,0,1) }}.</td>
                         @foreach($quizzes as $quiz)

                         @foreach($quizscore->where('quiz_event_id', $quiz->quiz_event_id)->where('student_id', $stud->student_id) as $scoreQ)
                        @if(empty($scoreQ))
                          <td>0</td>
                          @else
                        <td>{{$scoreQ->score}}</td>
                       @endif
                        @endforeach
                        @endforeach
                </tr>
               @endforeach      
                </tbody>
                </table>
</div>
</div>
</div>

</div>
</div>
</div>

</div>

</div>
</div>
</div>

</section>
</div>
<script type="text/javascript">$(document).ready(function() {
    $('#gradesTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ]
    } );
} );</script>
@endsection