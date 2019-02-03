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
                             <h3>Edit Event</h3>
                        </div>
                    </div>
                </div>
                  <div class="card-body" >
<div class="card gedf-card" >
                          <div class="card-body">
                             <form class="form" action="{{route('edit-event', $event->id)}}" method="POST">
                                @csrf
                    <input type="hidden" id="usrid" value="-1">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="">Event Title</label>
                           <input type="text" placeholder="Event Title" name="title" class="form-control" value="{{ $event->title }}{{ old('title') }}"> 
                        </div>
                        <div class="form-group">
                            <label for="">Event Venue</label>
                           <input type="text" placeholder="Event Venue" name="venue" class="form-control" value="{{ $event->venue }}{{ old('venue') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Event Description</label>
                           <textarea placeholder="Event Description" name="desc" class="form-control" rows="4">{{ $event->description }}{{ old('desc') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Display Color</label>
                           <input type="color" placeholder="Last Name" name="color" class="form-control" value="{{ $event->color }}{{ old('color') }}">
                        </div>

             <div class="input-group date form_datetime col-md-12"  data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input class="form-control" size="16" type="text" value="{{ $event->start_date }}" readonly placeholder="Event Start Date"> 
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
                <input type="hidden" id="dtp_input1" value="{{ $event->start_date }}" name="start_date" name="deadline" /><br/>

            <div class="input-group date form_datetime col-md-12"  data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input2">
                    <input class="form-control" size="16" type="text" value="{{ $event->end_date }}" readonly placeholder="Event End Date"> 
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
                <input type="hidden" id="dtp_input2" value="{{ $event->end_date }}" name="end_date" name="deadline" /><br/>
                    </div>
            
                           <div class="form-group">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>

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