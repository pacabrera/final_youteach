@extends('layouts.app')
@section('title', 'Teacher - YouTeach')
@section('content')

<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
          <!-- Post -->   
            <div class="row mb-4">            
              <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="card">
                  <div class="card-header"  style="background-color: #f55b5b; color: #e8e5e5;">
                    <h3> {{ $myClass->class_name}} </h3>
                    <p>{{ $myClass->user_profile->given_name }} {{ $myClass->user_profile->family_name }} | {{ $myClass->subject->subject_desc}} | {{ $myClass->section->section_name}}</p> 
                  </div>
                  <div class="card-body" >
                      <div class="card gedf-card" >
                                         <div class="card">
                  <div class="card-header">
                    <h3 class="h6 text-uppercase mb-0">Assignment</h3>
                  </div>
                  <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('assignments.store')}}" enctype="multipart/form-data">
                    	@csrf
                      <div class="form-group row">
                         <div class="col-md-2 col-sm-2 col-lg-12">
                            <input type="text" class="form-control" placeholder="Assignment Title" name="title">
                      </div>
                    </div>
                      <div class="form-group row">
                         <div class="col-md-2 col-sm-2 col-lg-12">
                            <textarea class="form-control" placeholder="Instructions" name="body" rows="10"></textarea> 
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-6">
                <div class="input-group date form_datetime col-md-12"  data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input class="form-control" size="16" type="text" value="" readonly placeholder="Deadline Date"> 
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
				<input type="hidden" id="dtp_input1" value="" name="deadline" /><br/>
                        </div>
                        <div class="col-md-6">
                          <input type="file" class="form-control-file" name="file[]" placeholder="Mobile Number" multiple>
                        </div>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
  <input type="checkbox" id="customRadioInline1" name="status" class="custom-control-input" value="0">
  <label class="custom-control-label" for="customRadioInline1">Open Assignment</label>
</div>
                     <input type="hidden" id="xd" value="{{$myClass->class_id}}" name="class_id" /><br/>
                      <div class="line"></div>
                      <div class="form-group row">
                        <div class="col-md-4 ml-auto">
                          <button type="submit" class="btn btn-secondary">Cancel</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="card-body">
                  	<table width="100%">
                  		<tr>
                  		<th>Assignment No.</th>
                  		<th>Action</th>
						</tr>
						@foreach($assignments as $ass)
						<tr>
							<td>{{$ass->id}}</td>
							<td><a href="{{ route('assign-submissions', $ass->id)}}">View Submissions</a></td>
						</tr>
						@endforeach
                  	</table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
</div>


@endsection