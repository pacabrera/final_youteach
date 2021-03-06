@extends('layouts.app')
@section('title', 'Classes - YouTeach')
@section('content')

<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
          <!-- Post -->   
            <div class="row mb-4">            
              <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="card">
                  <div class="card-header"  >
                    <div class="row">
                        <div class="col-lg-9 col-md-6 col-sm-6">
                             <h3>Manage Class</h3>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                             <a href="{{route('sched', $myClass->class_id)}}" class="btn btn-warning">Schedule</h3></a>
                        </div>
                    </div>
                </div>
                  <div class="card-body" >
<div class="card gedf-card" >
                          <div class="card-body">
                            <h3>Edit Class</h3>
                            <br>
                            <form action="{{ route('edit-classT', $myClass->class_id)}}" method="POST">
                            <div class="row">

                            <div class="col-lg-12 col-md-3">
            @csrf
                <div class="form-group">
                    <label for="">Class Name</label>
                    <input  name="class_name" type="text" class="form-control {{ $errors->has('class_name') ? 'is-invalid' : '' }}" value="{{$myClass->class_name}}">

                <div class="invalid-feedback">
                    {{ $errors->first('class_name') }}
                </div>

                </div>
                <div class="form-group">
                    <label for="">Section</label>
                    @php( $sections = \App\Section::all() )  
                    <select name="section_id" class="form-control {{ $errors->has('section_id') ? 'is-invalid' : '' }}">
                      @foreach($sections as $section)
                      <option value="{{ $section->section_id }}">{{ $section->section_name }}</option>
                       @endforeach
                    </select>
                <div class="invalid-feedback">
                    {{ $errors->first('section_id') }}
                </div>
                </div>
                <div class="form-group">
                  @php( $subjects = \App\Subject::all() )  
                    <label for="">Subject</label>
                    <select name="subject_id" class="form-control {{ $errors->has('subject_id') ? 'is-invalid' : '' }}">
                      @foreach($subjects as $subject)
                      <option value="{{ $subject->subject_id }}">{{ $subject->subject_code }}</option>
                       @endforeach
                    </select>
                <div class="invalid-feedback">
                    {{ $errors->first('subject_id') }}
                </div>
                </div>
                           <div class="form-group">
                <a href="{{route('view-classes')}}" class="btn btn-secondary" >Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>

            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>

@endsection