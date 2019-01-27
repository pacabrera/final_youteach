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
                  <div class="card-header"  >
                    <h3> {{ $myClass->class_name}} </h3>
                    <p>{{ $myClass->user_profile->given_name }} {{ $myClass->user_profile->family_name }} | {{ $myClass->subject->subject_desc}} | {{ $myClass->section->section_name}}</p> 
                  </div>
                  <div class="card-header">
                     <div class="row">
                      <div class="col-xs-1 col-md-1 text-center">
                        <img src="{{ Storage::cloud()->url('avatar/'.$threads->user->user_profile->profile_pic) }}" class="rounded-circle img-responsive" height="50" width="50" /><br>
                    </div>
                    <div class="col-xs-11 col-md-11">
                    <h3 class="h3 text-uppercase mb-0">{{$threads->title}}</h3>
                    <p class="date">{{ $threads->created_at->diffForHumans() }}</p>
                  </div>
                </div>
                  </div>
                  <div class="card-body">
                    <p>{!! nl2br($threads->post[0]->body) !!}</p>
                    @if(!empty($threads->post[0]->postFiles))
                    <table class="table card-text">
                        <tbody>
                    @foreach($threads->post[0]->postFiles as $file)
                    <hr><p>Attached Files: </p>
                            <tr>
                              <td width="10%">
                                <p><i class="fa fa-file-archive" style="font-size:45px;color:#f55b5b"></i></p>
                             </td>
                             <td width="80%">
                                <p style="color: #737373;"><strong>{{$file->file}}</strong><br> {{ ConvertToMB::bytesToHuman(Storage::cloud()->getSize('post_files/'.$file->file, 's3')) }} </p>
                              
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
                  </div>
                  @foreach($threads->post as $key => $post)
                  @if($key > 0)
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                    <header class="cf">
                      @if(Auth::user()->id == $post->usr_id)
                    <div  style="float: right; margin-right: 10px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn dropdown-toggle"> 
                      <img src="http://2016.igem.org/wiki/images/e/e0/Uclascrolldown.png" class="arrow" />
                    </div>
                    <div class="dropdown-menu" style="text-align: left;">
                      <a href="#" class="dropdown-item">Edit <i class="fa fa-edit" aria-hidden="true"> </i>  </a>
                      <a href="#" class="dropdown-item">Delete <i class="fa fa-trash" aria-hidden="true"></i></a> 
                    </div>
                    @endif
                    <a href=#><img class='profile-pic' src="{{ Storage::cloud()->url('avatar/'.$post->user_profile->profile_pic) }}"></a>
                    <h1 class="name"> <a href="#">{{ $post->user_profile->given_name}} {{ $post->user_profile->family_name}}</a>  </h1>   
                    <p class="date">{{ $post->created_at->diffForHumans() }}</p>
                  </header>

                    <p>{!! nl2br($post->body) !!}</p>

                  </div>
                  @endif
                  @endforeach
                  <div class="card-header">
                  </div>

<form method="POST" action="{{ route('post-comment', $threads->id) }}" enctype="multipart/form-data">
                  <div class="card-body" >
                                              @csrf
                                      <div class="form-group">
                                            <textarea id="my-editor" name="comment" class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}"></textarea>
                                            <div class="invalid-feedback">
                                               {{ $errors->first('comment') }}
                                            </div>
                                      </div>
                              

                              <div class="btn-toolbar justify-content-between" style="margin-top: 25px;">
                                  <div class="btn-group">
                                      <button type="submit" class="btn btn-primary" class="btn">Post</button>
                                  </div>
                              </div>
                            </div>
                          </form>
                      </div>
                    </div>
                
            <!-- Side Notification -->
              <div class="col-lg-4">
                <div class="card mb-4">
                  <div class="card-header"  >
                    <h2 class="h6 text-uppercase mb-0">Thread Details</h2>
                  </div>
                  <div class="card-body">
                    <div class="chart-holder">
                      <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between mb-4">
                        <div class="flex-grow-1 d-flex align-items-center">
                          <div class="dot mr-3 bg-red"></div>
                          <div class="text">
                            <h6 class="mb-0">Thread Members</h6>
                            <span class="text-gray">
                              @foreach($threads->post as $thread)
                              {{ $thread->user->user_profile->given_name }}<br>
                              @endforeach
                            </span>
                          </div>
                        </div>
                        <div class="icon bg-red text-white"><i class="fas fa-clock"></i></div>
                      </div>

                      <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between mb-4">
                        <div class="flex-grow-1 d-flex align-items-center">
                          <div class="dot mr-3 bg-red"></div>
                          <div class="text">
                            <h6 class="mb-0">Instructions</h6><span class="text-gray">{{$threads->body}}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <!-- //Side Notification -->  

            </div>
<script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
<script>
  CKEDITOR.replace('my-editor');
</script>


@endsection