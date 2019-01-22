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
               <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr >
                <th>Student Name</th>
                @if($classlist->where('type', 'Quiz')->count() > 0)
                @foreach($classlist->where('type', 'Quiz') as $quizG)
                <th>Quiz {{ $loop->iteration }}</th>
                @endforeach
                @endif

                @if($classlist->where('type', 'Asssignment')->count() > 0)
                @foreach($classlist->where('type', 'Asssignment') as $assG)
                <th>Assignment {{ $loop->iteration }}</th>
                 @endforeach
                 @endif

                @if($classlist->where('type', 'Activity')->count() > 0)
                @foreach($classlist->where('type', 'Activity') as $actG)
                <th>Activity {{ $loop->iteration }}</th>
                 @endforeach
                 @endif

                @if($classlist->where('type', 'Recitation')->count() > 0)
                @foreach($classlist->where('type', 'Recitation') as $recG)
                <th>Recitation {{ $loop->iteration }} </th>
                  @endforeach
                @endif
                </tr>
                </thead>

                <tbody class="table-hover">
                @foreach($classlist->unique() as $student)
                <tr>
                <td class="text-left">{{$student->user_profile->family_name}}, {{$student->user_profile->given_name}} {{substr($student->user_profile->middle_name, 0, 1)}}.</td>
                
                @if($classlist->where('type', 'Quiz')->count() > 0)
                @foreach($classlist->where('type', 'Quiz') as $quiz)
                <td  class="text-left">{{$quiz->grade}}</td>
                @endforeach
                @endif

                @if($classlist->where('type', 'Asssignment')->count() > 0)
                @foreach($classlist->where('type', 'Asssignment') as $ass)
                <td  class="text-left">{{$ass->grade}}</td>
                @endforeach
                @endif

                @if($classlist->where('type', 'Activity')->count() > 0)
                @foreach($classlist->where('type', 'Activity') as $act)
                <td  class="text-left">{{$act->grade}}</td>
                @endforeach
                 @endif

                @if($classlist->where('type', 'Recitation')->count() > 0)
                @foreach($classlist->where('type', 'Recitation') as $rec)
                <td  class="text-left">{{$rec->grade}}</td>
                @endforeach
                @endif
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
    $('#dataTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ]
    } );
} );</script>
@endsection