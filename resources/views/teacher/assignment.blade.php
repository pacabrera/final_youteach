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
                  <div class="card-header"  >
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
                            <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="Assignment Title" name="title">
                <div class="invalid-feedback">
                    {{ $errors->first('title') }}
                </div>                            
                      </div>
                    </div>
                      <div class="form-group row">
                         <div class="col-md-2 col-sm-2 col-lg-12">
                            <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" placeholder="Instructions" name="body" rows="10"></textarea> 
                <div class="invalid-feedback">
                    {{ $errors->first('body') }}
                </div>                            
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-6">
                <div class="input-group date form_datetime col-md-12"  data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input class="form-control {{ $errors->has('deadline') ? 'is-invalid' : '' }}" size="16" type="text" value="" readonly placeholder="Deadline Date"> 
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                          <div class="invalid-feedback">
                    {{ $errors->first('deadline') }}
                </div>
                </div>
				<input type="hidden" id="dtp_input1" value="" name="deadline" class="{{ $errors->has('deadline') ? 'is-invalid' : '' }}" />

                        <br/>

                        </div>
                        <div class="col-md-6">
                          <input type="file" class="form-control-file {{ $errors->has('file.*') ? 'is-invalid' : '' }}" name="file[]" placeholder="Mobile Number" multiple>

                                        <div class="invalid-feedback">
                                        @if ($errors->has('file.*'))
                                          <div class="help-block">
                                            <ul role="alert"><li>{{ $errors->first('file.*') }}</li></ul>
                                         </div>
                                        @endif
                                        </div>                       
                        </div>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
    <input type="checkbox" id="xd" name="late" class="custom-control-input" value="1">
  <label class="custom-control-label" for="xd">Allow Late Submissions</label>
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
                      <div class="line"></div>
                  <div class="card-body">
                <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                      <th>Assignment Title</th>
                      <th>Action</th>
                      <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assignments as $ass)
                    <tr>
                         <td>{{$ass->title}}</td>
                         <td><a href="{{ route('assign-submissions', $ass->id)}}" class="btn btn-primary">Submissions</a>
                         <a href="{{ route('assign-scores', $ass->id)}}" class="btn btn-secondary">Scores</a></td>
                         <td>
                       <button class="btn btn-danger" data-subid="{{ $ass->id }}" data-toggle="modal" data-target="#deleteSubject">Delete</button>
                     </td>
                    </tr>
                    @endforeach
                </tbody>
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

<!-- Delete Subject Confirmation Modal -->
<div class="modal fade" id="deleteSubject" tabindex="-1" role="dialog" aria-labelledby="DeleteSubjectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this subject? This is irreversible!
                <input type="hidden" id="sub_id_del" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="DeleteSubject()">Delete Subject</button>
            </div>
        </div>
    </div>
</div>
<script>
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

      $('#deleteSubject').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var s_id = button.data('subid')

        var modal = $(this)
        modal.find('#sub_id_del').val(s_id)
    });

    function DeleteSubject() {
        var s_id = $('#sub_id_del').val();

        $.ajax({
            url: '/teacher/assignments/' + s_id,
            type: 'DELETE', //type is any HTTP method
            success: function () {
                window.location.reload(true);
            }
        });
    }
</script>
@endsection