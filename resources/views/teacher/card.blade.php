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
                  <div class="card-body text-center" >
                    <h1>{{$user->given_name}} {{$user->family_name}}</h1>
                    <h5> {{ $myClass->subject->subject_code}} </h5>
                    <h5> {{ $myClass->section->section_name}} </h5>

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

@endsection

