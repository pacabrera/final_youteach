@extends('layouts.app')
@section('title', 'Events - YouTeach')
@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
              <!-- Basic Form-->

              <!-- Form Elements -->
              <div class="col-lg-12 mb-5">
                <div class="card">
                  <div class="card-header"  >
                    <div class="row">
                        <div class="col-lg-9 col-md-6 col-sm-6">
                             <h3>Events</h3>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                             <a href="{{ route('add-event') }}" class="btn btn-warning">Manage Events </a>
                        </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="container">
                    {!! $calendar->calendar() !!}
                </div>
            </div>
        </div>
    </div>
</div>

</section>
</div>

                {!! $calendar->script() !!}
@endsection