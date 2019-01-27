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
                  <div class="card-header"  >
                    <div class="row">
                        <div class="col-lg-9 col-md-6 col-sm-6">
                             <h3>{{ $user->user_profile->given_name}} {{ $user->user_profile->family_name}} </h3>
                        </div>
                    </div>
                </div>
                  <div class="card-body" >
<div class="profilecard">
  <div class="row">
    <div class="col-md-6 img">
      <img src="{{ Storage::cloud()->url('avatar/'.$user->user_profile->profile_pic) }}"  alt="" class="img-rounded" height="250px" width="250px">
    </div>
    <div class="col-md-6 details">
      <blockquote>
        <h5>{{ $user->user_profile->given_name}} {{ substr($user->user_profile->middle_name, 0,1)}}. {{ $user->user_profile->family_name}} {{ $user->user_profile->ext_name}}</h5>
        <small><cite title="Source Title">{{$user->user_profile->address }}<i class="icon-map-marker"></i></cite></small>
      </blockquote>
      <p>
        {{$user->user_profile->email }} <br>
        {{$user->user_profile->birthday }}
      </p>
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