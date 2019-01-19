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
                     <h3>YouTeach - LMS </h3>
                  </div>
                  
                <form method="POST" action="{{ route('post-store') }}" enctype="multipart/form-data">
                  <div class="card-body" >
                      <div class="card gedf-card" >
                          <div class="card-body">
                              <div class="form-group">
                                @csrf
                                <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="Thread Title" value="{{ old('title')}}">
                                <div class="invalid-feedback">
                                  {{ $errors->first('title') }}
                                </div>
                              </div>

                              <div class="form-group">
                                <textarea id="my-editor" name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}">{{ old('body')}}</textarea>
                                <div class="invalid-feedback">
                                  {{ $errors->first('body') }}
                                </div>
                              </div>

                              <div class="form-group">
                                  <div class="custom-file">
                                      <label class="custom-file-label" for="customFile">Attach File</label>
                                      <input type='file' class="custom-file-input {{ $errors->has('file.*') ? 'is-invalid' : '' }}" onchange="readURL(this);" name="file[]" multiple />
                                        <div class="invalid-feedback">
                                        @if ($errors->has('file.*'))
                                          <div class="help-block">
                                            <ul role="alert"><li>{{ $errors->first('file.*') }}</li></ul>
                                         </div>
                                        @endif
                                        </div>
                                      <hr>
                                  </div>
                              </div>
                              
                              <div class="form-group">
                                  <select class="form-control" name="class_id">
                                    @foreach($myClass as $class)
                                      <option value="{{ $class->class_id}}">{{ $class->class_name }}</option>
                                    @endforeach
                                  </select>
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
                    <h2 class="h6 text-uppercase mb-0">Dashboard</h2>
                  </div>
                  <div class="card-body">

                  </div>
                </div>
              </div>
            <!-- //Side Notification -->  

            </div>

              @foreach($myClass as $klase)
              @foreach($klase->thread as $xd)
            <div class="row mb-4">
              <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                    <div class="col-xs-3 col-md-3 text-center">
                        <img src="{{ Storage::cloud()->url('avatar/'.$xd->user->user_profile->profile_pic) }}" class="rounded-circle img-responsive" height="114px" width="114px" />
                    </div>
                    <div class="col-xs-9 col-md-9 section-box">
                        <h2>
                            @if(!empty($xd->assign_id))
                            <a href="{{ route('assign-turnIn', $xd->assign_id)}}"> {{$xd->title}} 
                            </a>
                             <span class="category">Assignment</span>
                            @elseif(!empty($xd->quiz_id))
                            <a href="{{ route('take.show', $xd->quiz_id) }}"> {{$xd->title}} 
                            </a>
                             <span class="category">Quiz</span>
                             @else
                              <a href="{{ route('post-single', $xd->id)}}"> {{$xd->title}} 
                            </a>
                             @endif
                        </h2>
                        @if(!empty($xd->assign_id))
                        <p style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis">{{$xd->post[0]->body}}</p>
                        @else
                        <div style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis">{!! nl2br($xd->post[0]->body) !!}</div>
                        @endif
                        <hr />
                        <div class="row rating-desc">
                            <div class="col-md-12">
                                <span><h6><a href="#">{{ $xd->user->user_profile->given_name }} {{ $xd->user->user_profile->family_name }}</a></h6></span>
                                <span><p class="date">{{ $xd->created_at->diffForHumans() }}</p></span>
                            </div>
                        </div>
                    </div>
                </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            @endforeach
          </div>
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

