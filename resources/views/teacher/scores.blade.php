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
                <table id="table-fill">
                <thead>
                <tr id="tr-grades">
                <th id="th-grades" class="text-left">Student Name</th>
                <th id="th-grades" class="text-left" colspan="{{$grades->where('type', 'Quiz')->count()}}">Quizzes</th>
                <th id="th-grades" class="text-left" colspan="{{$grades->where('type', 'Asssignment')->count()}}">Assignments</th>
                <th id="th-grades" class="text-left" colspan="{{$grades->where('type', 'Activity')->count()}}">Group Activity</th>
                <th id="th-grades" class="text-left" colspan="{{$grades->where('type', 'Recitation')->count()}}">Recitation</th>
                

               
                </tr>
                </thead>

                <tbody class="table-hover">
                
                <tr id="tr-grades">
                 @foreach($grades as $grade) 
                <td id="td-grades" class="text-left">{{$grade->user_profile->family_name}}, {{$grade->user_profile->given_name}} {{substr($grade->user_profile->middle_name, 0,1)}}.</td>
                 @endforeach 
              </tr>
                
                @if(empty($grades))
                <tr id="tr-grades">
                <td id="td-grades" class="text-center" colspan="2">No Grades Yet</td>
                
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