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
                    <h1 class="text-center">{{ Carbon\Carbon::parse(Carbon\Carbon::now())->format('M d, Y') }}</h1>
                    <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                      
                        <th>Student Name</th>
                        <th>Time In</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attendances as $attendance)
                    <tr>
                        <td>{{$attendance->user_profile->family_name}}, {{$attendance->user_profile->given_name}} {{substr($attendance->user_profile->middle_name, 0)}} </td>
                        <td>{{$attendance->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                  </div>
                </div>
              </div>
            </div>

@endsection