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
                    <h3 class="h6 text-uppercase mb-0">Assignment Submissions</h3>
                  </div>
                  <div class="card-body">
                    <h3>{{ $assign->title }}</h3>
                    <p>Deadline: {{ \Carbon\Carbon::parse($assign->deadline)->format('M d, Y - g:i A')}}</p>
                    <div class="line">
                    </div>

                    <h4> Submitted by: {{ $submission->user_profile->family_name }}, {{ $submission->user_profile->given_name }} </h4>
                    <br><br>
                    <p>Date Submitted: {{ \Carbon\Carbon::parse($submission->created_at)->format('M d, Y - g:i A')}} </p>
                    <br>
                    @if(!empty($submission->response))
                    <h6>Text Response:</h6>
                    <p>{{ $submission->response }}</p>
                    @endif
                    <br>
                    @if(!empty($submission->assignSubmissionFile))
                    <table class="table card-text">
                        <tbody>
                    <hr><h6>Attached Files: </h6>
                    @foreach($submission->assignSubmissionFile as $file)
                            <tr>
                              <td width="10%">
                                <p><i class="fa fa-file-archive" style="font-size:45px;color:#f55b5b"></i></p>
                             </td>
                             <td width="80%">
                                <p style="color: #737373;"><strong>{{$file->file}}</strong><br> {{ ConvertToMB::bytesToHuman(Storage::cloud()->getSize('assign_files/'.$file->file, 's3')) }} </p>
                              
                             </td>
                             <td width="10%">
                                <a href="{{ Storage::cloud()->url('post_files/'.$file->file, 's3') }}" style="float: right; padding-top: 15px; "> 
                                  <i class="fa fa-download" style="font-size: 20px;"></i>
                                </a>
                             </td>
                            </tr> 
                    @endforeach
                        </tbody>
                      </table>
                    @endif
                    <div class="line"></div>
                                          <div class="col-md-4 ml-auto">
                          <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Grade Assignment</button>
                        </div>  
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</section>
</div>


<form action="{{ route('grade-assign') }}" method="POST">
                   <div class="card-body">
                    <!-- Modal-->
                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                          Grade Assignment
                          </div>
                          <div class="modal-body">
                             
                              <div class="form-group">
                            
                                  @csrf
                                <input class="{{ $errors->has('grade') ? 'is-invalid' : '' }}" id="grade" name="grade" type="text" pattern="\d*" maxlength="3"
                                                            style="text-align: 
                                                            center; 
                                                            font-size: 30px; 
                                                            height: 100px; 
                                                            width: 120px; 
                                                            display: block; 
                                                            margin-left: auto; 
                                                            margin-right: auto;
                                                            padding: 20px;
                                                            border-radius: 5px;
                                                            " required>

                                  <input type="hidden" id="student_id" name="usr_id" value="{{ $submission->usr_id}}">
                                  <input type="hidden" name="class_id" value="{{ $myClass->class_id }}">
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                            <button type="submit" class="btn btn-primary">Grade </button>
                        
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
</form>
        <!-- //Modal Form-->   
                  @endsection