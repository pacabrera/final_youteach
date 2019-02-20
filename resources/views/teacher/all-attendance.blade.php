@extends('layouts.app')
@section('title')

@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
          <!-- Post -->   
            <div class="row mb-4">            
              <div class="col-lg-10 mb-4 mb-lg-0">
                <div class="card">
                  <div class="card-header"  >
                    <div class="row">
                        <div class="col-lg-9 col-md-6 col-sm-6">
                    <h3> {{ $myClass->class_name}} </h3>
                    <p>{{ $myClass->user_profile->given_name }} {{ $myClass->user_profile->family_name }} | {{ $myClass->subject->subject_desc}} | {{ $myClass->section->section_name}}</p> 
                      </div>
                    </div>
                  </div>
                  <div class="card-body" >
                    <h1 class="text-center">Attendance Archive</h1>
                                        <div class="archive mt-5">
@foreach ($archives as $date => $posts)
    <h2>{{ \Carbon\Carbon::parse($date)->format('F - Y')}}</h2>
<div class="activity-feed">
            @foreach ($posts as $post)

            <div class="feed-item"><a href="{{route('attendances', $post->id)}}" class="btn btn-primary btn-sm"> {{ \Carbon\Carbon::parse($post->created_at)->format('F d,  Y')}}</a>  </div>
    @endforeach
</ul>


@endforeach
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
        "scrollX": true,
        buttons: [
            'copy', 'excel', 'pdf', 'print','csv'
        ]
    } );
} );</script>
@endsection