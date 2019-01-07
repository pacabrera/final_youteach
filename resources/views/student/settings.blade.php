@extends('layouts.app')
@section('title', 'Quiz - TeckQuiz')
@section('content')
<main>
<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <div class="container">
            
            <h1 class="mt-5">Account Settings</h1>
          </div>

<div class="container-fluid">
        <div class="row">
                            <div class="card" style="width: 40rem;">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#changePassword" style="float: right">Change password</button>
                                        <strong>Change password</strong>
                                        <p>This will allow you to change your password.</p>
                                    </li>
                                    <li class="list-group-item">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#changeProfile" style="float: right">Change Profile Picture</button>
                                        <strong>Change Profile Picture</strong>
                                        <p>This will allow you to change/add a profile picture.</p>
                                    </li>
                                </ul>
                            </div>
                  
                </div>
            </main>
        </div>
    </div>
</main>


<!-- Change password modal -->
<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="changePassword" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Current password</label>
                    <input id="pwd" type="password" class="form-control">
                    <div class="invalid-feedback">
                        Input your correct password.
                    </div>
                </div>
                <div class="form-group">
                    <label for="">New password</label>
                    <input id="pwd_new" type="password" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="changePassword()">Change password</button>
            </div>
        </div>
    </div>
</div>

<!-- Change password Success Modal -->
<div class="modal fade" id="changePasswordSuccess" tabindex="-1" role="dialog" aria-labelledby="changePasswordSuccess"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Success!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Password changed successfully!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <!-- Add Teacher Modal -->
    <div class="modal fade" id="changeProfile" tabindex="-1" role="dialog" aria-labelledby="changeProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Profile Picture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('profile-pic') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Select File</label>
                            <div class="form-group">
                               <input type='file' name='file' id='file' class='form-control'>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" onclick="" class="btn btn-success btn-block">Upload</button>
                        </div>
                    </form>
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
    function changePassword(){
        var oldPass = $('#pwd').val();
        var newPass = $('#pwd_new').val();
        

         $.ajax({
            url: '/student/account/' + {{Auth::id()}},
            type: 'PUT', //type is any HTTP method
            data: {
                oldPass, newPass
            }, //Data as js object
            success: function () {
                $('#changePassword').modal('hide')
                $('#changePasswordSuccess').modal('show')
                $('#pwd').removeClass('is-invalid');
            },
            error: function(data){
                $('#pwd').addClass('is-invalid');
            }
        });
    }


</script>
    
@endsection
