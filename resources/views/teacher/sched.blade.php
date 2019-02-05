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
                             <h3>Manage Schedule</h3>
                        </div>
                    </div>
                </div>
                  <div class="card-body" >
<div class="card gedf-card" >
                          <div class="card-body">
            
                            <form action="{{ route('edit-schedule', $myClass->class_id)}}" method="POST">
                            <div class="row">

                            <div class="col-lg-12 col-md-3">
            @csrf
<div class="form-group">
                    <div class="row">
                    <!--monday-->
                    <div class="col-lg-4 col-md-3">
                        <label for=""><strong>Monday</strong></label> 
                        <input type="text" name="roomM" class="form-control {{ $errors->has('roomM') ? 'is-invalid' : '' }}" placeholder="Room">
                        <div class="invalid-feedback">
                            {{ $errors->first('roomM') }}
                        </div>                    
                    </div>
                    <div class="col-lg-4 col-md-3">
                        <label for="">Start Time</label>
                        <input type="time" name="monday" class="form-control {{ $errors->has('monday') ? 'is-invalid' : '' }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('monday') }}
                        </div> 
                    </div>
                    <div class="col-lg-4 col-md-3">   
                        <label for="">End Time</label>
                         <input type="time" name="monday2" class="form-control {{ $errors->has('monday2') ? 'is-invalid' : '' }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('monday2') }}
                        </div>  
                    </div>
                    <!--/monday-->

                    <!--tuesday-->
                    <div class="col-lg-4 col-md-3">
                        <label for=""><strong>Tuesday</strong></label> 
                        <input type="text" name="roomT" class="form-control {{ $errors->has('roomT') ? 'is-invalid' : '' }}" placeholder="Room">
                        <div class="invalid-feedback">
                            {{ $errors->first('roomT') }}
                        </div>                    
                    </div>
                    <div class="col-lg-4 col-md-3">
                        <label for="">Start Time</label>
                        <input type="time" name="tuesday" class="form-control {{ $errors->has('tuesday') ? 'is-invalid' : '' }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('tuesday2') }}
                        </div> 
                    </div>
                    <div class="col-lg-4 col-md-3">   
                        <label for="">End Time</label>
                         <input type="time" name="tuesday2" class="form-control {{ $errors->has('tuesday2') ? 'is-invalid' : '' }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('tuesday2') }}
                        </div>  
                    </div>
                    <!--/tues-->

                    <!--wednesday-->
                    <div class="col-lg-4 col-md-3">
                        <label for=""><strong>Wednesday</strong></label> 
                        <input type="text" name="roomW" class="form-control {{ $errors->has('roomW') ? 'is-invalid' : '' }}" placeholder="Room">
                        <div class="invalid-feedback">
                            {{ $errors->first('roomW') }}
                        </div>                    
                    </div>
                    <div class="col-lg-4 col-md-3">
                        <label for="">Start Time</label>
                        <input type="time" name="wednesday" class="form-control {{ $errors->has('wednesday') ? 'is-invalid' : '' }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('wednesday') }}
                        </div> 
                    </div>
                    <div class="col-lg-4 col-md-3">   
                        <label for="">End Time</label>
                         <input type="time" name="wednesday2" class="form-control {{ $errors->has('wednesday2') ? 'is-invalid' : '' }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('wednesday2') }}
                        </div>  
                    </div>
                    <!--/wednesday-->

                     <!--thursday-->
                    <div class="col-lg-4 col-md-3">
                        <label for=""><strong>Thursday</strong></label> 
                        <input type="text" name="roomTH" class="form-control {{ $errors->has('roomTH') ? 'is-invalid' : '' }}" placeholder="Room">
                        <div class="invalid-feedback">
                            {{ $errors->first('roomTH') }}
                        </div>                    
                    </div>
                    <div class="col-lg-4 col-md-3">
                        <label for="">Start Time</label>
                        <input type="time" name="thursday" class="form-control {{ $errors->has('thursday') ? 'is-invalid' : '' }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('thursday') }}
                        </div> 
                    </div>
                    <div class="col-lg-4 col-md-3">   
                        <label for="">End Time</label>
                         <input type="time" name="thursday2" class="form-control {{ $errors->has('thursday2') ? 'is-invalid' : '' }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('thursday2') }}
                        </div>  
                    </div>
                    <!--/thursday-->

                    <!--friday-->
                    <div class="col-lg-4 col-md-3">
                        <label for=""><strong>Friday</strong></label> 
                        <input type="text" name="roomF" class="form-control {{ $errors->has('roomF') ? 'is-invalid' : '' }}" placeholder="Room">
                        <div class="invalid-feedback">
                            {{ $errors->first('roomF') }}
                        </div>                    
                    </div>
                    <div class="col-lg-4 col-md-3">
                        <label for="">Start Time</label>
                        <input type="time" name="friday" class="form-control {{ $errors->has('friday') ? 'is-invalid' : '' }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('friday') }}
                        </div> 
                    </div>
                    <div class="col-lg-4 col-md-3">   
                        <label for="">End Time</label>
                         <input type="time" name="friday2" class="form-control {{ $errors->has('friday2') ? 'is-invalid' : '' }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('friday2') }}
                        </div>  
                    </div>
                    <!--/friday-->

                    <!--saturday-->
                    <div class="col-lg-4 col-md-3">
                        <label for=""><strong>Saturday</strong></label> 
                        <input type="text" name="roomS" class="form-control {{ $errors->has('roomS') ? 'is-invalid' : '' }}" placeholder="Room">
                        <div class="invalid-feedback">
                            {{ $errors->first('roomS') }}
                        </div>                    
                    </div>
                    <div class="col-lg-4 col-md-3">
                        <label for="">Start Time</label>
                        <input type="time" name="saturday" class="form-control {{ $errors->has('saturday') ? 'is-invalid' : '' }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('saturday') }}
                        </div> 
                    </div>
                    <div class="col-lg-4 col-md-3">   
                        <label for="">End Time</label>
                         <input type="time" name="saturday2" class="form-control {{ $errors->has('saturday2') ? 'is-invalid' : '' }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('saturday2') }}
                        </div>  
                    </div>
                    <!--/saturday-->
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