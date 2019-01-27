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
                    <h3> Events </h3>
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