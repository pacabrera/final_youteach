@extends('layouts.app')
@section('title', 'Sections - YouTeach')
@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <div class="container">

<div class="container">
    <h1 class="mt-5">Sections</h1>
    <div class="row">
        <div class="col-9">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Section Name</th>
                        <th>Classes</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sections as $s)
                    <tr>
                        <th scope="row">{{ $s->section_id }}</th>
                        <td>{{$s->section_name}}</td>
                        <td>{{$s->klase->count()}}</td>
                        <td>
                            <button href="" class="btn btn-primary btn-sm" type="button" class="btn btn-primary btn-sm"
                                data-toggle="modal" data-target="#editSection"
                                data-subid="{{ $s->section_id }}"
                                data-code="{{ $s->section_name }}">
                                Edit
                            </button>
                            <button class="btn btn-danger btn-sm" data-subid="{{ $s->section_id }}" data-toggle="modal" data-target="#deleteSection" {{ $s->klase->count() > 0 ? 'disabled' : '' }}>Delete</button>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-3">
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addSection">Add new Section</button>
        </div>
    </div>
    
</div>
<!-- Edit Subject Modal -->
<div class="modal fade" id="editSection" tabindex="-1" role="dialog" aria-labelledby="editSectionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Section</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form">
                    <input type="hidden" id="usrid" value="-1">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="">Section Name</label>
                            <input id="sub_code" type="text" class="form-control" placeholder="">
                        </div>
                        <input type="hidden" id="sub_id">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="UpdateSection()">Update Section</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Subject Modal -->
<div class="modal fade" id="addSection" tabindex="-1" role="dialog" aria-labelledby="addSectionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="usrid" value="-1">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="">Subject Name</label>
                            <input id="s_code_new" type="text" class="form-control" placeholder="">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addSection()">Add Section</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Subject Confirmation Modal -->
<div class="modal fade" id="deleteSection" tabindex="-1" role="dialog" aria-labelledby="deleteSectionModalLabel" aria-hidden="true">
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
                <input type="text" id="sub_id_del" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="deleteSection()">Delete Section</button>
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

    $('#editSection').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var subid = button.data('subid')
        var s_code = button.data('code')

        var modal = $(this)
        modal.find('#sub_code').val(s_code)
        modal.find('#sub_id').val(subid);
    });

    $('#deleteSection').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var subid = button.data('subid')

        var modal = $(this)
        modal.find('#sub_id_del').val(subid)
    });

    function UpdateSection() {
        var subid = $('#sub_id').val();
        var s_code = $('#sub_code').val();
  
        $.ajax({
            url: '/admin/sections/' + subid,
            type: 'PUT', //type is any HTTP method
            data: {
                s_code,
            }, //Data as js object
            success: function () {
                window.location.reload(true);
            }
        });
    }

    function addSection() {
        var s_code = $('#s_code_new').val();

        $.ajax({
            url: '/admin/sections/',
            type: 'POST', //type is any HTTP method
            data: {
                s_code
            }, //Data as js object
            success: function () {
                window.location.reload(true);
            }
        });
    }

    function deleteSection() {
        var subid = $('#sub_id_del').val();
        
        $.ajax({
            url: '/admin/sections/' + subid,
            type: 'DELETE', //type is any HTTP method
            success: function () {
                window.location.reload(true);
            }
        });
    }
</script>

@endsection