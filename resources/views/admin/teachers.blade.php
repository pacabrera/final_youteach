@extends('layouts.app')
@section('title', 'Teachers - YouTeach')
@section('content')

<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
          <!-- Post -->   
            <div class="row mb-4">            
              <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="card">
                  <div class="card-header"  >
                    <div class="row">
                        <div class="col-lg-9 col-md-6 col-sm-6">
                             <h3>Teachers</h3>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                             <button class="btn btn-warning" data-toggle="modal" data-target="#addSubject">Add new teacher</button>
                        </div>
                    </div>
                </div>
                  <div class="card-body" >
<div class="card gedf-card" >
                          <div class="card-body">
            <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Teacher's Name</th>
                        <th>Classes</th>
                        <th>Active</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teachers as $t)
                    <tr>
                        <th scope="row">{{ $t->id }}</th>
                        <td>
                            {{ $t->user_profile->family_name }}, {{ $t->user_profile->given_name }} {{ $t->user_profile->ext_name}} {{ $t->user_profile->middle_name
                            }}.
                        </td>
                        <td>{{ $t->klase->count() }}</td>
                        <td>@if($t->isOnline()) <span class="dot-online"></span> @else <span class="dot-offline"></span> @endif</td>
                        <td>
                            <button href="" class="btn btn-danger btn-sm" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#deleteTeacher"
                                data-tid="{{ $t->id }}">
                                Delete
                            </button>
                            <button href="" class="btn btn-warning btn-sm" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#resetTeacherPassword"
                                data-tid="{{ $t->id }}">
                                Reset Password
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



    <!-- Add Teacher Modal -->
    <div class="modal fade" id="addSubject" tabindex="-1" role="dialog" aria-labelledby="AddSubjectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('account.store') }}">
                        {{ csrf_field() }}
                         <div class="form-group">
                                        <label for="">Name</label>
                                        <div class="form">
                                            <input name="given_name" id="n_given" type="text" placeholder="Given name" class="form-control mb-2 {{ $errors->has('given_name') ? 'is-invalid' : '' }}" value="{{ old('given_name') }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('given_name') }}
                                        </div>                                            
                                            <input name="middle_name" id="n_middle" type="text" placeholder="M.I." class="form-control mb-2 {{ $errors->has('middle_name') ? 'is-invalid' : '' }}" value="{{ old('middle_name') }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('middle_name') }}
                                        </div>
                                            <input name="family_name" id="n_family" type="text" placeholder="Family name" class="form-control mb-2 {{ $errors->has('family_name') ? 'is-invalid' : '' }}" value="{{ old('family_name') }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('family_name') }}
                                        </div>
                                            <input name="ext_name" id="ext_name" type="text" placeholder="Ext." class="form-control mb-2 {{ $errors->has('ext_name') ? 'is-invalid' : '' }}" value="{{ old('ext_name') }}">
                                        <div class="ext_name-feedback">
                                            {{ $errors->first('ext_name') }}
                                        </div>                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email Address</label>
                                        <input name="email" id="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="gender">Gender</label>
                                      <select id="gender" class="form-control" name="gender">
                                        <option selected value="Male">Male</option>
                                        <option value="Female">Female</option>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Employee No.</label>
                                        <input name="id" id="id" type="text" class="form-control {{ $errors->has('id') ? 'is-invalid' : '' }}" value="{{ old('id') }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('id') }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-block">Register</button>
                                        <small class="form-text text-muted text-center">By clicking "Register", you agree to our terms of service and privacy policy.</small>
                                    </div>
                                </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Reset Teacher password Confirmation Modal -->
    <div class="modal fade" id="resetTeacherPassword" tabindex="-1" role="dialog" aria-labelledby="resetTeacherPassword" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm reset of password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure to reset this teacher's password?
                    <input type="hidden" id="t_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="ResetTeacherPassword()">Reset password</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Reset Teacher password Success Modal -->
    <div class="modal fade" id="resetTeacherPasswordSuccess" tabindex="-1" role="dialog" aria-labelledby="resetTeacherPassword"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Successful reset of password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Success! The password is reseted to:
                    <b>password</b>
                    <input type="hidden" id="t_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Teacher Confirmation Modal -->
    <div class="modal fade" id="deleteTeacher" tabindex="-1" role="dialog" aria-labelledby="DeleteSubjectModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm deletion of teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this teacher? Any classes under this teacher will also be deleted. <b>This is irreversible!</b>
                    <input type="hidden" id="tid_del" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="DeleteTeacher()">Delete Teacher</button>
                </div>
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

    $('#deleteTeacher').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var t_id = button.data('tid')

        var modal = $(this)
        modal.find('#tid_del').val(t_id)
    });

    $('#resetTeacherPassword').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var t_id = button.data('tid')

        var modal = $(this)
        modal.find('#t_id').val(t_id)
    });

    function ResetTeacherPassword() {
        var t_id = $('#t_id').val();
        var password = "password";
        var update_type = 1;
        $.ajax({
            url: '/admin/account/' + t_id,
            type: 'PUT', //type is any HTTP method
            data: {
                update_type, password
            }, //Data as js object
            success: function () {
                $('#resetTeacherPassword').modal('hide')
                $('#resetTeacherPasswordSuccess').modal('show')
            }
        });
    }

    function DeleteTeacher() {
            var t_id = $('#tid_del').val();
            $.ajax({
                url: '/admin/account/' + t_id,
                type: 'DELETE', //type is any HTTP method
                success: function () {
                    window.location.reload(true);
                }
            });
        }
</script>

@endsection