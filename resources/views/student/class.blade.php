@extends('layouts.app')
@section('title', 'YouTeach | Student')

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
                  <div class="card-body" >
                      <div class="card gedf-card" >
                              <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist" style="margin-left: 30px;">
                                  <li class="nav-item">
                                      <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Make Post</a>
                                  </li>
                              </ul>
              
                          <div class="card-body">
                              <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                      <div class="form-group">
                                          <label class="sr-only" for="message">post</label>
                                          <form method="POST" action="{{ route('post-s', $myClass->class_id) }}" enctype="multipart/form-data">
                                            @csrf
                                            <textarea placeholder="Type here..." name="body"></textarea>
                                         
                                      </div>

                                      <div class="form-group">
                                          <div class="custom-file">
                                              <label class="custom-file-label" for="customFile">Attach File</label>
                                              <input type='file' 
                                              class="custom-file-input" onchange="readURL(this);" name="file" />

                                             <hr>

                                              <img id="blah" src="img/upload.png" alt="No Photo" name="file" width="200px;" />
                                          </div>
                                      </div>

                              <div class="btn-toolbar justify-content-between" style="margin-top: 250px;">
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

            @foreach($posts as $post)
             <!-- SECOND POST -->
            <div class="row mb-4">
              <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="card">
                  <div class="card-body">

                  <header class="cf">
                    <div  style="float: right; margin-right: 10px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn dropdown-toggle"> 
                      <img src="http://2016.igem.org/wiki/images/e/e0/Uclascrolldown.png" class="arrow" />
                    </div>
                    <div class="dropdown-menu" style="text-align: left;">
                      <a href="#" class="dropdown-item">Edit <i class="fa fa-edit" aria-hidden="true"> </i>  </a>
                      <a href="#" class="dropdown-item">Delete <i class="fa fa-trash" aria-hidden="true"></i></a> 
                    </div>
                    <a href=#><img class='profile-pic' src="{{ Storage::cloud()->url($post->user_profile->profile_pic) }}"></a>
                    <h1 class="name"> <a href="#">{{ $post->user_profile->given_name}} {{ $post->user_profile->family_name}}</a>  </h1>   
                    <p class="subname">
                      @if($post->user->permissions == 1)Teacher
                      @else Student
                      @endif
                    </p>
                    <p class="date">{{ $post->created_at->diffForHumans() }}</p>
                  </header>

                  <div class="form-group" style="margin-left: 30px;" >
                    <br>
                  @if(!empty($post->quiz_event_id))
                  <div class="card">
                    <div class="card-header">
                      <h6 class="text-uppercase mb-0">{{ $post->body }}</h6>
                    </div>
                    <div class="card-body">
                      <table class="table card-text">
                        <thead>
                          <tr>
                            <div class="custom-file col-lg-12 ">
                               <a href="{{ route('take.show', $post->quiz_event_id) }}" class="btn btn-outline-primary">Start</a>
                               @php( $quizEvent = \App\QuizEvent::all()->where('quiz_event_id', $post->quiz_event_id)->count() )
                               <p class="status">{{ $quizEvent }} question/s  </p>
                               <p class="status"> {{ $post->created_at->format('F d, Y') }}</p>
                            </div>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                  @else
                      <p class="status">{{ $post->body }}</p>
                      @if(Storage::cloud()->has($post->post_image))
                      <img class="img-content" src="{{ Storage::cloud()->url($post->post_image) }}" />
                      @endif
                      @endif
                  </div>

                  <hr/>
                
                @foreach($comments as $comment)
                  @if($post->id == $comment->post_id)
                   <div class="form-group" style="margin-left: 30px;">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <div >
                            <img src="{{ Storage::cloud()->url($comment->user_profile->profile_pic) }}" style="width: 30px; height: 30px;" class="img img-circle" id="comment_img"> 
                          </div>
                           <p style="margin-left: 10px;" id="koment"> 
                            <strong> <a href="">{{ $comment->user_profile->given_name }} {{ $comment->user_profile->family_name }}</a> </strong>
                            {{ $comment->comment}}
                           </p>
                      </div>  
                    </div>
                  </div>
                  <div class="new_comments"></div>  
                  @endif
                @endforeach

                   <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <div >
                            <img src="{{ Storage::cloud()->url($post->user_profile->profile_pic) }}" style="width: 30px; height: 30px;" class="img img-circle">
                              <button type="" @if( Auth::guest() ) disabled="" @endif class="btn btn-primary" id="add_comment" data-post="{{ $post->id  }}">Submit</button>
                          </div>
                      </div>
                      
                     
                        <input type="text" placeholder="Type your comment here..." class="form-control form-control-sm" style="margin-left: 10px;" name="comment" id="comment">
                     
                      </div>
                  </div>

                  </div>
                </div>
              </div>
            </div>
            <!-- //SECOND POST -->
@endforeach

<script>
$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#add_comment").click(function(){
        var comment_data = $('#comment').val();
        var post = $(this).attr('data-post');
        var author_name = '{{ $usr->given_name }} {{ $usr->family_name }}';
        var author_image = '{{ Storage::cloud()->url($usr->profile_pic) }}';

        if (comment_data.length > 1){
            jQuery.post("/student/comment/",
                {
                    data: comment_data,
                    post: post,
                },
                function(data,status){
                    if ( data === 'success' && status === 'success' ){
                        $('.new_comments')
                            .append("<div class='form-group' style='margin-left: 30px;'><div class='input-group mb-3'><div class='input-group-prepend'><div>"+
                                "<img src='"+ author_image +"' style='width: 30px; height: 30px;' class='img img-circle' id='comment_img'> </div>"+
                                "<p style='margin-left: 10px;' id='koment'> "+
                                "<strong> <a href=''>"+ author_name +"</a> </strong>"+
                                  comment_data +
                                "<p></div></div>"+
                                "</div>");
                        $('#comment').val('');
                    }
                });
        }
    });
});
</script>




@endsection

