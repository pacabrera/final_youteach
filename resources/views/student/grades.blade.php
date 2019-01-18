@extends('layouts.app')
@section('title', 'Grades - YouTeach')

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
                <th id="th-grades" class="text-left">Type</th>
                <th id="th-grades" class="text-left">Score</th>
               
                </tr>
                </thead>

                <tbody class="table-hover">
                @foreach($grades as $grade)
                <tr id="tr-grades">
                <td id="td-grades" class="text-left">{{$grade->type}}</td>
                <td id="td-grades" class="text-left">{{$grade->grade}}@if(!empty($grade->hps))/{{$grade->hps}}@endif</td>
              </tr>
                @endforeach
                @if(!empty($grades))
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