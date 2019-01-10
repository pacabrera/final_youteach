@extends('layouts.app')
@section('title', 'YouTeach | Teacher')

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
                  @if(Auth::user()->permissions == 0)
                  <a href="{{ route('attendance', $myClass->class_id)}}" class="btn-info">Attendance</a>
                             <form method="POST" action="{{ route('post-store', $myClass->class_id) }}" enctype="multipart/form-data">
                  <div class="card-body" >
                      <div class="card gedf-card" >
                          <div class="card-body">
                                     <div class="form-group">
                                            @csrf
                                            <input type="text" name="title" class="form-control" placeholder="Thread Title">
                                      </div>
                                      <div class="form-group">
                                            <textarea id="my-editor" name="body" class="form-control"></textarea>
                                      </div>

                                      <div class="form-group">
                                          <div class="custom-file">
                                              <label class="custom-file-label" for="customFile">Attach File</label>
                                              <input type='file' 
                                              class="custom-file-input" onchange="readURL(this);" name="file[]" multiple />
                                             <hr>
                                          </div>
                                      </div>
                                

                              <div class="btn-toolbar justify-content-between" style="margin-top: 25px;">
                                  <div class="btn-group">
                                      <button type="submit" class="btn btn-primary" class="btn">Post</button>
                                  </div>
                              </div>
                            </form>
                          </div>
                      </div>
                  </div>
                </div>
              </div>   


            <!-- Side Notification -->
              <div class="col-lg-4">
                <div class="card mb-4">
                  <div class="card-header"  style="background-color: #f55b5b; color: #e8e5e5;">
                    <h2 class="h6 text-uppercase mb-0">Notification</h2>
                  </div>
                  <div class="card-body">
                    <div class="chart-holder">
                      <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between mb-4">
                        <div class="flex-grow-1 d-flex align-items-center">
                          <div class="dot mr-3 bg-red"></div>
                          <div class="text">
                            <h6 class="mb-0">Assignment</h6><span class="text-gray">127 new cases</span>
                          </div>
                        </div>
                        <div class="icon bg-red text-white"><i class="fas fa-clipboard-check"></i></div>
                      </div>

                      <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between mb-4">
                        <div class="flex-grow-1 d-flex align-items-center">
                          <div class="dot mr-3 bg-red"></div>
                          <div class="text">
                            <h6 class="mb-0">Quizzes</h6><span class="text-gray">127 new cases</span>
                          </div>
                        </div>
                        <div class="icon bg-red text-white"><i class="fas fa-clipboard-check"></i></div>
                      </div>

                      <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between mb-4">
                        <div class="flex-grow-1 d-flex align-items-center">
                          <div class="dot mr-3 bg-red"></div>
                          <div class="text">
                            <h6 class="mb-0">Events</h6><span class="text-gray">127 new cases</span>
                          </div>
                        </div>
                        <div class="icon bg-red text-white"><i class="fas fa-clipboard-check"></i></div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            <!-- //Side Notification -->  

            </div>

            @foreach($threads as $thread)
            <div class="row mb-4">
              <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                    <div class="col-xs-3 col-md-3 text-center">
                        <img src="{{ Storage::cloud()->url('avatar/'.$thread->user->user_profile->profile_pic) }}" class="rounded-circle img-responsive" height="114px" width="114px" />
                    </div>
                    <div class="col-xs-9 col-md-9 section-box">
                        <h2>
                            @if(!empty($thread->assign_id))
                            <a href="{{ route('assign-turnIn', $thread->assign_id)}}"> {{$thread->title}} 
                            </a>
                             <span class="category">Assignment</span>
                            @elseif(!empty($thread->quiz_id))
                            <a href="{{ route('take.show', $thread->quiz_id) }}"> {{$thread->title}} 
                            </a>
                             <span class="category">Quiz</span>
                             @else
                              <a href="{{ route('post-single', $thread->id)}}"> {{$thread->title}} 
                            </a>
                             @endif
                        </h2>
                        @if(!empty($thread->assign_id))
                        <p style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis">{{$thread->post[0]->body}}</p>
                        @else
                        <div style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis">{!! nl2br($thread->post[0]->body) !!}</div>
                        @endif
                        <hr />
                        <div class="row rating-desc">
                            <div class="col-md-12">
                                <span><h6><a href="#">{{ $thread->user->user_profile->given_name }} {{ $thread->user->user_profile->family_name }}</a></h6></span>
                                <span><p class="date">{{ $thread->created_at->diffForHumans() }}</p></span>
                            </div>
                        </div>
                    </div>
                </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
<script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
<script>
  CKEDITOR.replace('my-editor');
</script>

<script>
  
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
         function getMessage() {
            $.ajax({
               type:'POST',
               url:'/getmsg',
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                  $("#msg").html(data.msg);
               }
            });
         }

      </script>

@endsection

