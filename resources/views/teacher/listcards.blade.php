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
                    <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Student No.</th>
                        <th>Student Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($classlist as $student)
                    <tr>   
                        <td>{{$student->student_id}}</td>
                        <td>{{$student->user_profile->family_name}}, {{$student->user_profile->given_name}} {{substr($student->user_profile->middle_name,0,1)}} {{$student->user_profile->ext_name}}</td>
                        <td><a href="{{ route('single-cards', [$myClass->class_id, $student->student_id]) }}" class="btn btn-primary">View Profile</a></td>
                </tr>    
                    @endforeach
                </tbody>
            </table>
                  </div>
                </div>
              </div>
            </div>

@endsection