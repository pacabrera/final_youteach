@extends('layouts.app')
@section('title', 'YouTeach | Student')

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
                    <h3 class="h6 text-uppercase mb-0">Schedule</h3>
                  </div>
                  <div class="card-body">
                    <div class="container">
			          
                  <section class="py-5">
                    <div class="row">
                      <div class="container-fluid">
                        <div id="myCarousel" class="carousel slide" data-interval="false" data-ride="carousel">
                          <div class="carousel-inner row w-100 mx-auto">

                          	@if($classes->where('day', 'M')->count() > 0)
                            <div class="carousel-item col-md-4 active">
                              <div class="card">
                                <div class="panel panel-danger panel-pricing">
                                  <div class="panel-body text-center">
                                    <h4>MONDAY</h4>
                                      </div>
                                      @foreach($classes->where('day', 'M') as $monday)
                                      <div class="line"></div>
                                        <ul class="list-group text-left">
                                          <li class="list-group-item"><i class="fa fa-book"></i> {{$monday->subject->subject_code}}</li>
                                          <li class="list-group-item"><i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($monday->timeFrom)->format('H:i a') }} - {{ Carbon\Carbon::parse($monday->timeTo)->format('H:i a') }}</li>
                                          <li class="list-group-item"><i class="fa fa-map-marker"></i> {{$monday->room}}</li>
                                        </ul>
                                       @endforeach
                                  </div>
                              </div>
                            </div>
                        	@endif

                        	@if($classes->where('day', 'T')->count() > 0)
                            <div class="carousel-item col-md-4">
                              <div class="card">
                                <div class="panel panel-danger panel-pricing">
                                  <div class="panel-body text-center" >
                                    <h4 >TUESDAY</h4>
                                      </div>
                                         @foreach($classes->where('day', 'T') as $tuesday)
                                      <div class="line"></div>
                                        <ul class="list-group text-left">
                                          <li class="list-group-item"><i class="fa fa-book"></i>{{$tuesday->subject->subject_code}} </li>
                                          <li class="list-group-item"><i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($tuesday->timeFrom)->format('H:i a') }} - {{ Carbon\Carbon::parse($tuesday->timeTo)->format('H:i a') }}</li>
                                          <li class="list-group-item"><i class="fa fa-map-marker"></i> {{$tuesday->room}}</li>
                                        </ul>
                                       @endforeach
                                  </div>
                              </div>
                            </div>
							@endif

							@if($classes->where('day', 'W')->count() > 0)
                            <div class="carousel-item col-md-4">
                              <div class="card">
                                <div class="panel panel-danger panel-pricing">
                                  <div class="panel-body text-center">
                                    <h4>WEDNESDAY</h4>
                                      </div>
                                         @foreach($classes->where('day', 'W') as $wed)
                                      <div class="line"></div>
                                        <ul class="list-group text-left">
                                          <li class="list-group-item"><i class="fa fa-book"></i> {{$wed->subject->subject_code}}</li>
                                          <li class="list-group-item"><i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($wed->timeFrom)->format('H:i a') }} - {{ Carbon\Carbon::parse($wed->timeTo)->format('H:i a') }}</li>
                                          <li class="list-group-item"><i class="fa fa-map-marker"></i> {{$wed->room}}</li>
                                        </ul>
                                       @endforeach
                                  </div>
                              </div>
                            </div>
							@endif
							
							@if($classes->where('day', 'TH')->count() > 0)
                            <div class="carousel-item col-md-4">
                              <div class="card">
                                <div class="panel panel-danger panel-pricing">
                                  <div class="panel-body text-center">
                                    <h4>THURSDAY</h4>
                                      </div>
                                         @foreach($classes->where('day', 'TH') as $thurs)
                                      <div class="line"></div>
                                        <ul class="list-group text-left">
                                          <li class="list-group-item"><i class="fa fa-book"></i> {{$thurs->subject->subject_code}}</li>
                                          <li class="list-group-item"><i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($thurs->timeFrom)->format('H:i a') }} - {{ Carbon\Carbon::parse($thurs->timeTo)->format('H:i a') }}</li>
                                          <li class="list-group-item"><i class="fa fa-map-marker"></i> {{$thurs->room}}</li>
                                        </ul>
                                       @endforeach
                                  </div>
                                  </div>
                              </div>
                             @endif


							 @if($classes->where('day', 'F')->count() > 0)
                            <div class="carousel-item col-md-4">
                              <div class="card">
                                <div class="panel panel-danger panel-pricing">
                                  <div class="panel-body text-center">
                                    <h4>FRIDAY</h4>
                                      </div>
                                        @foreach($classes->where('day', 'F') as $fri)
                                      <div class="line"></div>
                                        <ul class="list-group text-left">
                                          <li class="list-group-item"><i class="fa fa-book"></i> {{$fri->subject->subject_code}}</li>
                                          <li class="list-group-item"><i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($fri->timeFrom)->format('H:i a') }} - {{ Carbon\Carbon::parse($fri->timeTo)->format('H:i a') }}</li>
                                          <li class="list-group-item"><i class="fa fa-map-marker"></i> {{$fri->room}}</li>
                                        </ul>
                                       @endforeach
                                  </div>
                              </div>
                            </div>
                            @endif
							
							@if($classes->where('day', 'S')->count() > 0)
                            <div class="carousel-item col-md-4">
                              <div class="card">
                                <div class="panel panel-danger panel-pricing">
                                  <div class="panel-body text-center">
                                    <h4>Saturday</h4>
                                      </div>
                                        @foreach($classes->where('day', 'S') as $saturday)
                                      <div class="line"></div>
                                        <ul class="list-group text-left">
                                          <li class="list-group-item"><i class="fa fa-book"></i> {{$saturday->subject->subject_code}}</li>
                                          <li class="list-group-item"><i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($saturday->timeFrom)->format('H:i a') }} - {{ Carbon\Carbon::parse($saturday->timeTo)->format('H:i a') }}</li>
                                          <li class="list-group-item"><i class="fa fa-map-marker"></i> {{$saturday->room}}</li>
                                        </ul>
                                       @endforeach
                                  </div>
                              </div>
                            </div>
                            @endif

                          </div>
                          <div class="container">
                            <div class="row">
                              <div class="col-12 text-center mt-4">
                                <button class="btn btn-primary mx-1 prev" href="javascript:void(0)" title="Previous">
                                  <i class="fa fa-lg fa-chevron-left"></i>
                                </button>
                                <button class="btn btn-primary mx-1 next" href="javascript:void(0)" title="Next">
                                  <i class="fa fa-lg fa-chevron-right"></i>
                                </button>
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
            </div>
          </section>
        </div>

    <!-- JavaScript files-->
    <script>
        (function ($) {
    "use strict";
    // Auto-scroll
    $('#myCarousel').carousel({
      interval: 5000
    });

    // Control buttons
    $('.next').click(function () {
      $('.carousel').carousel('next');
      return false;
    });
    $('.prev').click(function () {
      $('.carousel').carousel('prev');
      return false;
    });

    // On carousel scroll
    $("#myCarousel").on("slide.bs.carousel", function (e) {
      var $e = $(e.relatedTarget);
      var idx = $e.index();
      var itemsPerSlide = 3;
      var totalItems = $(".carousel-item").length;
      if (idx >= totalItems - (itemsPerSlide - 1)) {
        var it = itemsPerSlide -
            (totalItems - idx);
        for (var i = 0; i < it; i++) {
          // append slides to end 
          if (e.direction == "left") {
            $(
              ".carousel-item").eq(i).appendTo(".carousel-inner");
          } else {
            $(".carousel-item").eq(0).appendTo(".carousel-inner");
          }
        }
      }
    });
  })
  (jQuery);
    </script>


@endsection