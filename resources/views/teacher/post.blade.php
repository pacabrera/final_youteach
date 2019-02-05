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
                    @if($threads->usr_id == Auth::user()->id)
                 <div  style="float: right; margin-right: 10px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn dropdown-toggle"> 
                    <img src="http://2016.igem.org/wiki/images/e/e0/Uclascrolldown.png" class="arrow" />
                    </div>
                    <div class="dropdown-menu" style="text-align: left;">
                      <a href="#" class="dropdown-item">Edit <i class="fa fa-edit" aria-hidden="true"> </i>  </a>
                      <a href="#" class="dropdown-item">Delete <i class="fa fa-trash" aria-hidden="true"></i></a> 
                    </div>
                    @endif
                  </div>
                </div>
                  </div>
                  <div class="card-body">
                    <p>{!! nl2br($threads->post[0]->body) !!}</p>
                    
                      @php
$embed = Embed::make($threads->video)->parseUrl();
// Will return Embed class if provider is found. Otherwie will return false - not found. No fancy errors for now.
if ($embed) {
  // Set width of the embed.
  $embed->setAttribute(['class' => 'img-content', ]);

  // Print html: '<iframe width="600" height="338" src="//www.youtube.com/embed/uifYHNyH-jA" frameborder="0" allowfullscreen></iframe>'.
  // Height will be set automatically based on provider width/height ratio.
  // Height could be set explicitly via setAttr() method.
  echo $embed->getHtml();
}

@endphp
                    @if(!empty($threads->post[0]->postFiles))
                     @foreach($threads->post[0]->postFiles as $image)
                        @if (pathinfo(Storage::cloud()->url('post_files/'.$image->file, 's3'), PATHINFO_EXTENSION) == 'png')
                        <img src="{{ Storage::cloud()->url('post_files/'.$image->file, 's3') }}" class="img-content">
                        @endif
                     @endforeach
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
                      <button data-toggle="modal" data-target="#editPost" class="dropdown-item" data-postid="{{ $post->id }}"
                                data-body="{{ $post->body }}">Edit <i class="fa fa-edit" aria-hidden="true"> </i>  </button>
                      <button href="#" class="dropdown-item" data-subid="{{ $post->id }}" data-toggle="modal" data-target="#deleteSubject">Delete <i class="fa fa-trash" aria-hidden="true"></i></button> 
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
</section>
            </div>

      <div class="modal fade" id="editPost" tabindex="-1" role="dialog" aria-labelledby="editPost" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                                      <div class="form-group">
                                        <input type="hidden" value="" id="postid">
                                            <textarea id="editor" name="comment" class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}"></textarea>
                                            <div class="invalid-feedback">
                                               {{ $errors->first('comment') }}
                                            </div>
                                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="editPost()">Edit Post</button>
                </div>
            </div>
        </div>
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
                Are you sure you want to delete this post? This is irreversible!
                <input type="hidden" id="sub_id_del" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="DeleteSubject()">Delete Post</button>
            </div>
        </div>
    </div>
</div>

<script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
<script>
  CKEDITOR.replace('my-editor');
  CKEDITOR.replace('editor');
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#editPost').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var postid = button.data('postid')
        var body = button.data('body')
        

        var modal = $(this)
        modal.find('#editor').val(body)
        modal.find('#postid').val(postid)
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
            url: '/delete-post/' + s_id,
            type: 'POST', //type is any HTTP method
            success: function () {
                window.location.reload(true);
            }
        });
    }


    function editPost() {
        var body = CKEDITOR.instances['editor'].getData();
        var post_id = $('#postid').val();
;


        $.ajax({
            url: '/edit-post/' + post_id,
            type: 'POST', //type is any HTTP method
            data: {
                body
            }, //Data as js object
            success: function () {
                window.location.reload(true);
            }
        });
    }
  </script>

@endsection