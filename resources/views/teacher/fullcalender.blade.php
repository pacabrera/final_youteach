@extends('layouts.app')
@section('title', 'Teacher - YouTeach')
@section('content')
 <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
          	<a href="{{ route('add-event') }}" class="btn btn-info">Add New Event</a>
            <div class='onesignal-customlink-container'></div>
          		
                <div class="panel-body">
                    {!! $calendar->calendar() !!}
                </div>

                {!! $calendar->script() !!}
@endsection