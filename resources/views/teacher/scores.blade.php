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
                  <div class="card-header"  style="background-color: #f55b5b; color: #e8e5e5;">
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
              <div id="table-title">
                </div>
               <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                <tr >
                <th>Student Name</th>
                <th colspan="{{$grades->where('type', 'Quiz')->count()}}">Quizzes</th>
                <th colspan="{{$grades->where('type', 'Asssignment')->count()}}">Assignments</th>
                <th colspan="{{$grades->where('type', 'Activity')->count()}}">Group Activity</th>
                <th colspan="{{$grades->where('type', 'Recitation')->count()}}">Recitation</th>
                </tr>
                </thead>

                <tbody class="table-hover">
                @foreach($classlist as $student)
                <tr>
                <td  class="text-left">{{$student->user_profile->family_name}}, {{$student->user_profile->given_name}} {{substr($student->user_profile->middle_name, 0, 1)}}.</td>
                <td  class="text-left">{{$student->grades->grade}}.</td>
              </tr>
               @endforeach      
                @if(empty($grades))
                <tr >
                <td  class="text-center" colspan="2">No Grades Yet</td>
                
              </tr>
                @endif
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
@endsection