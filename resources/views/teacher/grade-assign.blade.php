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
                  <div class="card-header"  >
                    <h3> {{ $myClass->class_name}} </h3>
                    <p>{{ $myClass->user_profile->given_name }} {{ $myClass->user_profile->family_name }} | {{ $myClass->subject->subject_desc}} | {{ $myClass->section->section_name}}</p> 
                  </div>
                  <div class="card-body" >
                      <div class="card gedf-card" >
                    <div class="card">
                  <div class="card-header">
                    <h3 class="h6 text-uppercase mb-0">Assignment Submissions</h3>
                  </div>
                  <div class="card-body">
                    <h3>{{ $xd->title }}</h3>
                    <p>Deadline: {{ \Carbon\Carbon::parse($xd->deadline)->format('M d, Y - g:i A')}}</p>
                    <div class="line">
                    </div>
            <table id="dataTable2" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Student No.</th>
                        <th>Student Name</th>
                        <th>Score</th>
             
                    </tr>
                </thead>
                <tbody>
                    @foreach($grades as $grade)

                    <tr>
                      <td>{{$grade->student_id}}</td>
                      <td>{{$grade->user_profile->family_name}}, {{$grade->user_profile->given_name}} {{substr($grade->user_profile->middle_name,0,1)}}.</td>
                      <td>{{$grade->score}}</td>
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
</section>
</div>
<script type="text/javascript">$(document).ready(function() {
    $('#dataTable2').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print', 'csv'
        ]
    } );
} );</script>
                  @endsection