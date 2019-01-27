@extends('layouts.app')
@section('title', 'Sections - YouTeach')
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
                             <h3>Events</h3>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                             <button class="btn btn-warning" data-toggle="modal" data-target="#addEvent">Add new Event</button>
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
                        <th>Event Title</th>
                        <th>Color</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $s)
                    <tr>
                        <th scope="row">{{ $s->id }}</th>
                        <td>{{$s->title}}</td>
                        <td><div class="btn" style="background-color: {{ $s->color }}"></div></td>
                        <td>{{$s->start_date}}</td>
                        <td>{{$s->end_date}}</td>
                        
                        <td>
                            <button href="" class="btn btn-primary btn-sm" type="button" class="btn btn-primary btn-sm"
                                data-toggle="modal" data-target="#editEvent"

                                data-title="{{ $s->title }}"
                                data-event_id="{{ $s->id }}"
                                data-color="{{ $s->color }}"
                                data-start_date="{{ $s->start_date }}"
                                data-end_date="{{ $s->end_date }}">
                                Edit
                            </button>
                            <button class="btn btn-danger btn-sm" data-event_id="{{ $s->id }}" data-toggle="modal" data-target="#deleteEvent">Delete</button>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Edit Subject Modal -->
<div class="modal fade" id="editEvent" tabindex="-1" role="dialog" aria-labelledby="editEventModalLabel" aria-hidden="true">
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
                        <div class="form-group">
                            <label for="">Event Title</label>
                           <input type="text" placeholder="Event Title" id="ev_title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Event Venue</label>
                           <input type="text" placeholder="Event Venue" id="ev_venue" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Event Description</label>
                           <textarea placeholder="Event Description" id="ev_desc" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Display Color</label>
                           <input type="color" placeholder="Last Name" id="ev_color" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Start Date</label>
                           <input type="date" class="form-control" id="ev_start_date" placeholder="Start Date">
                        </div>
                        <div class="form-group">
                            <label for="">End Date</label>
                          <input type="date" class="form-control" id="ev_end_date" placeholder="End Date">
                        </div>
                        </div>
                        <input type="hidden" id="ev_id">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="UpdateEvent()">Update Event</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Subject Modal -->
<div class="modal fade" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form">
                    <input type="hidden" id="usrid" value="-1">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="">Event Title</label>
                           <input type="text" placeholder="Event Title" id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Event Venue</label>
                           <input type="text" placeholder="Event Venue" id="venue" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Event Description</label>
                           <textarea placeholder="Event Description" id="desc" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Display Color</label>
                           <input type="color" placeholder="Last Name" id="color" class="form-control">
                        </div>

             <div class="input-group date form_datetime col-md-12"  data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input class="form-control" size="16" type="text" value="" readonly placeholder="Deadline Date"> 
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
                <input type="hidden" id="dtp_input1" value="" id="start_date" name="deadline" /><br/>

            <div class="input-group date form_datetime col-md-12"  data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input2">
                    <input class="form-control" size="16" type="text" value="" readonly placeholder="Deadline Date"> 
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
                <input type="hidden" id="dtp_input2" value="" id="end_date" name="deadline" /><br/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addEvent()">Add Event</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Subject Confirmation Modal -->
<div class="modal fade" id="deleteEvent" tabindex="-1" role="dialog" aria-labelledby="deleteEventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this event? This is irreversible!
                <input type="hidden" id="sub_id_del" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="deleteEvent()">Delete Event</button>
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

    $('#editEvent').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var event_id = button.data('event_id')
        var title = button.data('title')
        var color = button.data('title')
        var start_date = button.data('start_date')
        var end_date = button.data('end_date')

        var modal = $(this)
        modal.find('#ev_title').val(title)
        modal.find('#ev_color').val(color)
        modal.find('#ev_start_date').val(start_date)
        modal.find('#ev_end_date').val(end_date)
        modal.find('#ev_id').val(event_id);
    });

    $('#deleteEvent').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var event_id = button.data('event_id')

        var modal = $(this)
        modal.find('#sub_id_del').val(event_id)
    });

    function UpdateEvent() {
        var event_id = $('#ev_id').val();
        var title = $('#ev_title').val();
        var color = $('#ev_color').val();
        var start_date = $('#dtp_input2').val();
        var end_date = $('#ev_end_date').val();
  
        $.ajax({
            url: '/admin/events/' + event_id,
            type: 'PUT', //type is any HTTP method
            data: {
                title, color, start_date, end_date
            }, //Data as js object
            success: function () {
                window.location.reload(true);
            }
        });
    }

    function addEvent() {
        var title = $('#title').val();
        var color = $('#color').val();
        var venue = $('#venue').val();
        var desc = $('#desc').val();
        var start_date = $('#dtp_input1').val();
        var end_date = $('#dtp_input2').val();


        $.ajax({
            url: '/admin/events/',
            type: 'POST', //type is any HTTP method
            data: {
                title, color, start_date, end_date, venue , desc
            }, //Data as js object
            success: function () {
                window.location.reload(true);
            }
        });
    }

    function deleteEvent() {
        var event_id = $('#sub_id_del').val();

        $.ajax({
            url: '/admin/events/' + event_id,
            type: 'DELETE', //type is any HTTP method
            success: function () {
                window.location.reload(true);
            }
        });
    }
</script>

@endsection