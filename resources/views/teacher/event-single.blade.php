@extends('layouts.app')
@section('title', 'Admin - YouTeach')
@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
              <!-- Basic Form-->

              <!-- Form Elements -->
              <div class="col-lg-12 mb-5">
                <div class="card">
                  <div class="card-header">
                    <h3 class="h6 text-uppercase mb-0">EVENTS</h3>
                  </div>
                  <div class="card-body">               
<section>
            <div class="row">
              <div class="col-lg-8">
                <div class="card mb-5 mb-lg-0">         
                  <div class="card-header" >
                    <h2 class="mb-0 text-uppercase">{{ $event->title }}</h2>
                  </div>
                  
                  <div class="card-body" style="background-color: #eeeeee; border-radius: 15px;">
                    
                    <div class="d-flex justify-content-between align-items-start align-items-sm-center mb-4 flex-column flex-sm-row">
                      <div class="left d-flex align-items-center">
                        <div class="icon icon-lg shadow mr-3 text-black"><i class="fa fa-map-marker"></i></div>
                        <div class="text">
                          <h6 class="mb-0 d-flex align-items-center text-black"> <span>WHERE</span></h6>
                        </div>
                      </div>
                      <div class="right ml-5 ml-sm-0 pl-3 pl-sm-0 text-black">
                        <h5>{{ $event->venue }}</h5>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-start align-items-sm-center mb-4 flex-column flex-sm-row">
                      <div class="left d-flex align-items-center">
                        <div class="icon icon-lg shadow mr-3 text-black"><i class="fa fa-clock"></i></div>
                        <div class="text">
                          <h6 class="mb-0 d-flex align-items-center text-black"> <span>START</span></h6>
                        </div>
                      </div>
                      <div class="right ml-5 ml-sm-0 pl-3 pl-sm-0 text-black">
                        <h5> {{ \Carbon\Carbon::parse($event->start_date)->format('g:i A')}}</h5>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-start align-items-sm-center mb-4 flex-column flex-sm-row">
                      <div class="left d-flex align-items-center">
                        <div class="icon icon-lg shadow mr-3 text-black"><i class="fa fa-clock"></i></div>
                        <div class="text">
                          <h6 class="mb-0 d-flex align-items-center text-black"> <span>END</span></h6>
                        </div>
                      </div>
                      <div class="right ml-5 ml-sm-0 pl-3 pl-sm-0 text-black">
                        <h5> {{ \Carbon\Carbon::parse($event->end_date)->format('g:i A')}}</h5>
                      </div>
                    </div>

                  </div>

                </div>
              </div>
              <div class="col-lg-4" style="text-align: center;" > 
                <div class="card px-5 py-4 " style="background-color: #eeeeee;">
                  <h2><span> {{ \Carbon\Carbon::parse($event->start_date)->format('M')}}</span></h2> 
                  <h1 style="font-size: 60px;"><span>{{ \Carbon\Carbon::parse($event->start_date)->format('d')}}</span></h1>
                  <span class="text-muted">START</span>
                </div>
                <br>
                <div class="card px-5 py-4 " style="background-color: #eeeeee;">
                  <h2><span>{{ \Carbon\Carbon::parse($event->end_date)->format('M')}}</span></h2> 
                  <h1 style="font-size: 60px;"><span>{{ \Carbon\Carbon::parse($event->end_date)->format('d')}}</span></h1>
                  <span class="text-muted">END</span>
                </div>
              </div>

             

              <div class="col-lg-12">
                <br>
                <div class="message card px-5 py-3 mb-4" style="background-color: #700f20; color: white;" >
                  <div class="row">
                    <div class="col-lg-12 d-flex align-items-center flex-column flex-lg-row text-center text-md-left">
                      <p class="mb-0 mt-0 mt-lg-0">{{ $event->description }}</p>
                    </div>
                  </div>
                </div>
                </div>
            </div>
</section>
</div>
</div>
</div>
</div>
</section>
</div>
@endsection