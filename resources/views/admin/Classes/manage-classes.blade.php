@extends('layouts.app')
@section('title', 'Classes - YouTeach')
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
                             <h3>Classes: {{$classes->count()}}</h3>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                             <a class="btn btn-warning" href="{{ route('new-class')}}">Add New Class</a>
                        </div>
                    </div>
                </div>
                  <div class="card-body" >
<div class="card gedf-card" >
                          <div class="card-body">
            <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Class ID</th>
                        <th>Class Name</th>
                        <th>Subject</th>
                        <th>Section</th>
                        <th>Instructor</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($classes as $klase)
                    <tr>
                        <th scope="row">{{ $klase->class_id }}</th>
                        <td>
                            {{ $klase->class_name}}
                        </td>
                        <td>{{$klase->subject->subject_code}}</td>
                        <td>{{ $klase->section->section_name }}</td>
                       <td>{{ $klase->user_profile->given_name }} {{ substr($klase->user_profile->middle_name, 0,1) }}. {{ $klase->user_profile->family_name }}</td>
                        <td>
                            <a href="{{ route('edit-class', $klase->class_id)}}" class="btn btn-warning btn-sm" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                            <button class="btn btn-danger btn-sm" data-subid="{{ $klase->class_id }}" data-toggle="modal" data-target="#deleteSubject">Delete</button>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
</div>
</div>
</div>
</div>
</section>
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
                Are you sure you want to delete this subject? This is irreversible!
                <input type="hidden" id="sub_id_del" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="DeleteSubject()">Delete Subject</button>
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

    $('#deleteSubject').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var s_id = button.data('subid')

        var modal = $(this)
        modal.find('#sub_id_del').val(s_id)
    });

    function DeleteSubject() {
        var s_id = $('#sub_id_del').val();

        $.ajax({
            url: '/admin/delete-class/' + s_id,
            type: 'POST', //type is any HTTP method
            success: function () {
                window.location.reload(true);
            }
        });
    }
</script>
@endsection