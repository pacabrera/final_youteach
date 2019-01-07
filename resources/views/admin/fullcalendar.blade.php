@extends('layouts.app')
@section('title', 'Admin - YouTeach')
@section('content')
 <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class='onesignal-customlink-container'></div>
            <div class="row">
            	<a href="{{ route('add-event') }}" class="btn btn-info">Manage Events </a>

            </div>
            <br>
                <div class="panel-body">
                    {!! $calendar->calendar() !!}
                </div>

                {!! $calendar->script() !!}
@endsection