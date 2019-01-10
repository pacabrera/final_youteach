@extends('layouts.app')
@section('title', 'Admin - YouTeach')
@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <div class="container">

<div class="container">
    <h1 class="mt-5">Sections</h1>
    <div class="row">
        <div class="col-9">
            	<a href="{{ route('add-event') }}" class="btn btn-info">Manage Events </a>

            </div>
            <br>
                <div class="panel-body">
                    {!! $calendar->calendar() !!}
                </div>

                {!! $calendar->script() !!}
@endsection