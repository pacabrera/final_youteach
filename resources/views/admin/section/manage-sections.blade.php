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
                             <h3>Sections: {{$sections->count()}}</h3>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                             <a class="btn btn-warning" href="{{ route('add-section')}}">Add New Section</a>
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
                            <a href="{{ route('edit-section', $s->section_id)}}" class="btn btn-success btn-sm" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                            <button class="btn btn-danger btn-sm" data-subid="{{ $s->section_id }}" data-toggle="modal" data-target="#deleteSubject" {{ $s->klase->count() > 0 ? 'disabled' : '' }}>Delete</button>
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
            url: '/admin/delete-section/' + s_id,
            type: 'POST', //type is any HTTP method
            success: function () {
                window.location.reload(true);
            }
        });
    }
</script>
@endsection