@extends('layouts.app')
@section('title')

@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
          <!-- Post -->   
            <div class="row mb-4">            
              <div class="col-lg-6 mb-3 mb-lg-0">
                <div class="card">
                  <div class="card-header"  style="background-color: #f55b5b; color: #e8e5e5;">
                    <h3> {{ $myClass->class_name}} </h3>
                    <p>{{ $myClass->user_profile->given_name }} {{ $myClass->user_profile->family_name }} | {{ $myClass->subject->subject_desc}} | {{ $myClass->section->section_name}}</p> 
                  </div>
                  <div class="card-body" >
                    <div class=" text-center">

  <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->color(38, 38, 38, 0.85)->backgroundColor(255, 255, 255, 0.82)->size(300)->generate($qrcode->qrcode)) !!} " class="img-responsive">
  <p> You may now let the students to scan the QR Code!</p>

  <a href="{{route('attendances', $qrcode->id)}}" class="btn btn-primary"> View Attendance </a>
</div>

                    </div>
                </div>
            </div>
              <div class="col-lg-6 mb-3 mb-lg-0">
                <div class="card">
                  <div class="card-header"  style="background-color: #f55b5b; color: #e8e5e5;">
                    <h3> Attendance Reports </h3>
                    <p>{{ Carbon\Carbon::parse(Carbon\Carbon::now())->format('M d, Y') }}</p> 
                  </div>
                  <div class="card-body" >
                    <div class=" text-center">
 <h1>{{ Carbon\Carbon::parse(Carbon\Carbon::now())->format('M d, Y') }}</h1> 
<section id="counter" class="sec-padding">

      <div class="row">
        <div class="col-lg-6 col-md-3 ">
          <div class="count">
            <p class="number">{{$attendances->count()}}</p>
            <h4>Students are Present</h4> </div>
        </div>
        <div class="col-lg-6 col-md-3 ">
          <div class="count"> <span class="fa fa-smile-o"></span>
            <p class="number">{{$class_members-$attendances->count()}}</p>
            <h4>Students are Absent</h4> 
          </div>
        </div>
      </div>
  </section>
</div>
                    </div>
                </div>
            </div>       

 </div>
</section>
</div>

@endsection
