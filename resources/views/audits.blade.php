@extends('layouts.app')
@section('title', 'Classes - YouTeach')
@section('content')

<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
          <!-- Post -->   
            <div class="row mb-4">            
              <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="card">
                  <div class="card-header"  style="background-color: #f55b5b; color: #e8e5e5;">
                    <div class="row">
                        <div class="col-lg-9 col-md-6 col-sm-6">
                             <h3>Audits: {{$audits->count()}}</h3>
                        </div>
                    </div>
                </div>
                  <div class="card-body" >
<div class="card gedf-card" >
                          <div class="card-body">

     <h2>Activity Feed</h2>
      
<div class="activity-feed">
   @foreach($audits as $audit)    
  <div class="feed-item">
    <div class="date">{{ \Carbon\Carbon::parse($audit->created_at)->format('M d, Y - g:i A')}}</div>
    <div class="text">{{$audit->causer->user_profile->given_name}} {{$audit->causer->user_profile->family_name}} {{$audit->description}}  {{$audit->changes}}</div>
  </div>
  @endforeach
</div>










        </div>

@endsection