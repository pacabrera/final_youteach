@extends('layouts.app')
@section('title', 'Teacher - YouTeach')
@section('content')

<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
          <!-- Post -->   
            <div class="row mb-4">            
              <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="card">
                  <div class="card-header"  style="background-color: #f55b5b; color: #e8e5e5;">
                    <h3> {{ $myClass->class_name}} </h3>
                    <p>{{ $myClass->user_profile->given_name }} {{ $myClass->user_profile->family_name }} | {{ $myClass->subject->subject_desc}} | {{ $myClass->section->section_name}}</p> 
                  </div>
                  <div class="card-header">
                    <h3 class="h6 text-uppercase mb-0">Assignment Submission</h3>
                  </div>
                  <div class="card-body">
                    @if(!empty($checkIfAlreadySubmitted->response))
                    <h6>Text Response:</h6>
                    <p>{{ $checkIfAlreadySubmitted->response }}</p>
                    @endif
                    <br>
                    @if(!empty($checkIfAlreadySubmitted->assignSubmissionFile))
                    <table class="table card-text">
                        <tbody>
                    <hr><h6>Attached Files: </h6>
                    @foreach($checkIfAlreadySubmitted->assignSubmissionFile as $file)
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
                      <div class="form-group row">
                        <div class="col-md-4 ml-auto">
                          <button type="submit" class="btn btn-primary" disabled="">Submit Assignment</button>
                        </div>
                      </div>
                    </form>
                  </div>
              </div>  
              </div>

            <!-- Side Notification -->
              <div class="col-lg-4">
                <div class="card mb-4">
                  <div class="card-header"  style="background-color: #f55b5b; color: #e8e5e5;">
                    <h2 class="h6 text-uppercase mb-0">Assignment Details</h2>
                  </div>
                  <div class="card-body">
                    <div class="chart-holder">
                      <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between mb-4">
                        <div class="flex-grow-1 d-flex align-items-center">
                          <div class="dot mr-3 bg-red"></div>
                          <div class="text">
                            <h6 class="mb-0">Deadline</h6><span class="text-gray">{{ \Carbon\Carbon::parse($assignment->deadline)->format('M d, Y - g:i A')}}
                          </span>
                          </div>
                        </div>
                        <div class="icon bg-red text-white"><i class="fas fa-clock"></i></div>
                      </div>

                      <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between mb-4">
                        <div class="flex-grow-1 d-flex align-items-center">
                          <div class="dot mr-3 bg-red"></div>
                          <div class="text">
                            <h6 class="mb-0">Instructions</h6><span class="text-gray">{{$assignment->body}}</span>
                          </div>
                        </div>
                      </div>
                    @if($assignment->assignfile->count() > 0 )
                      <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between mb-4">
                        <div class="flex-grow-1 d-flex align-items-center">
                          <div class="dot mr-3 bg-red"></div>
                          <div class="text">
                            <h6 class="mb-0">Attached Files</h6><span class="text-gray">
                              @foreach($assignment->assignfile as $file)
                              <a href="{{ Storage::cloud()->url('assign_files/'.$file->file, 's3') }}">{{$file->file}}</a><br/>
                              @endforeach
                            </span>
                          </div>
                        </div>
                        <div class="icon bg-red text-white"><i class="fas fa-file"></i></div>
                      </div>
                    @endif
                    </div>
                  </div>
                </div>
              </div>
            <!-- //Side Notification -->  

            </div>


@endsection