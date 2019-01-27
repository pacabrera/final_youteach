@extends('layouts.app')
@section('title', 'Teacher - YouTeach')
@section('content')

<style>
      .btn {
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 14px;
      text-decoration: none;
      margin: 5px;
      color: #fff;
      position: relative;
      display: inline-block;
      width: 150px;}

 
      /* Table Styles */
      .table-fill {
        background: white;
        border-radius:3px;
        border-collapse: collapse;
        height: 300px;
        margin: auto;
        max-width: 160px;
        padding:5px;
        width: 100%;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        animation: float 5s infinite;
      }
       
      th {
        color:white ;
        background:#f55b5b;
        border-bottom:4px solid #CE3323;
        border-right: 1px solid #CE3323;
        font-size:18px;
        font-weight: 100;
        padding:24px;
        text-align:left;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        vertical-align:middle;
      }

      th:first-child {
        border-top-left-radius:3px;
      }
       
      th:last-child {
        border-top-right-radius:3px;
        border-right:none;
      }
        
      tr {
        border-top: 1px solid #C1C3D1;
        border-bottom-: 1px solid #C1C3D1;
        color:#666B85;
        font-size:16px;
        font-weight:normal;
        text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
      }
       
      tr:hover td {
        background:#f55b5b;
        color:#FFFFFF;
        border-top: 1px solid #CE3323;
      }
       
      tr:first-child {
        border-top:none;
      }

      tr:last-child {
        border-bottom:none;
      }
       
      tr:nth-child(odd) td {
        background:#EBEBEB;
      }
       
      tr:nth-child(odd):hover td {
        background:#f55b5b;
      }

      tr:last-child td:first-child {
        border-bottom-left-radius:3px;
      }
       
      tr:last-child td:last-child {
        border-bottom-right-radius:3px;
      }
       
      td {
        background:#FFFFFF;
        padding:20px;
        text-align:left;
        vertical-align:middle;
        font-weight:300;
        font-size:16px;
        text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
        border-right: 1px solid #C1C3D1;
      }

      td:last-child {
        border-right: 0px;
      }

      th.text-left {
        text-align: left;
      }

      th.text-center {
        text-align: center;
      }

      th.text-right {
        text-align: right;
      }

      td.text-left {
        text-align: left;
      }

      td.text-center {
        text-align: center;
      }

      td.text-right {
        text-align: right;
      }
</style>
<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
              <!-- Basic Form-->

              <!-- Form Elements -->
              <div class="col-lg-12 mb-5">
                <div class="card">
                  <div class="card-header"  >
                    <h3> {{ $myClass->class_name}} </h3>
                    <p>{{ $myClass->user_profile->given_name }} {{ $myClass->user_profile->family_name }} | {{ $myClass->subject->subject_desc}} | {{ $myClass->section->section_name}}</p> 
                  </div>
                  <div class="card-body">
                    <div class="container">
    
              <div style="background-color: #fa9a9a; border-radius: 5px; ">

                 <div  style="color: white;" class="alert">   
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a> 
                   <strong> <i class="fa fa-bell"></i> Group Generator </strong>  <p> Group generator is a tool which randomizes the list of students based on the number of groups inputted. It is also capable of grading students individually or by a group. </p> 
                  </div>
              
              </div>            

             
             <div style="text-align: center;"> 
              <h3>NO. OF STUDENT IN {{ $myClass->class_name }}:</h3> <h1 class="text-red">{{ $myClass->class_members->count() }}</h1>
              <!-- start the realm of the buttons -->
              
              <div id="rndmBtn">
                <a href="" class="btn red" data-toggle="modal" data-target="#myModal">GENERATE</a>
              </div>
  <div class="line"></div>
  <div class="row" >
 @foreach($classlist->chunk($numGroup) as $s)
              
                <table class="table-fill">
                  <thead>
                  <tr>
                  <th class="text-center">GROUP: {{ $loop->iteration }}  
                    <input type="hidden" value="{{$s->count()}}" id="studcount">
                    @foreach($s as $ids)<input type="hidden" value="{{$ids->student_id}}" id="stud{{$loop->iteration}}">@endforeach

                  </th>
                  </tr>
                  </thead>
                  <tbody class="table-hover">
                  @foreach($s as $item)
                  <tr>
                  <td class="text-left" data-toggle="modal" data-target="#myModal" id="{{$item->student_id}}" data-studid="{{ $item->student_id }}">{{ $item->user_profile->given_name }} {{ $item->user_profile->family_name }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @endforeach
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- Modal Form-->
                   <div class="card-body">
                    <!-- Modal-->
                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            Input Grade:
                          </div>
                          <div class="modal-body">
                             
                              <div class="form-group">
                                <input type="text" pattern="\d*" id="grade" name="grade" maxlength="3" 
                                                            style="text-align: 
                                                            center; 
                                                            font-size: 30px; 
                                                            height: 100px; 
                                                            width: 120px; 
                                                            display: block; 
                                                            margin-left: auto; 
                                                            margin-right: auto;
                                                            padding: 20px;
                                                            border-radius: 5px;
                                                            ">
                                  <input type="hidden" id="student_id" name="usr_id" >
                                  <input type="hidden" id="class_id" value="{{ $myClass->class_id }}">
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                            <button type="submit" class="btn btn-primary" onclick="addGrade()" id="b{{$item->student_id}}">Grade </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
        <!-- //Modal Form-->  

<!-- Change password Success Modal -->
<div class="modal fade" id="gradeSuccess" tabindex="-1" role="dialog" aria-labelledby="gradeSuccess"
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
                Successfully Graded!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


</section>
</div>
<script>

  $(function () {
    $('.list-group-item').on('mouseover', function(event) {
    event.preventDefault();
    $(this).closest('li').addClass('open');
  });
      $('.list-group-item').on('mouseout', function(event) {
      event.preventDefault();
    $(this).closest('li').removeClass('open');
  });
});

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#myModal').on('show.bs.modal', function (event) {
        var td = $(event.relatedTarget) // Button that triggered the modal
        var studid = td.data('studid')
        
        var modal = $(this)
        modal.find('#student_id').val(studid);
    });

  function addGrade() {
        var grade = $('#grade').val();
        var student_id = $('#student_id').val();
        var class_id = $('#class_id').val();

        $.ajax({
            url: '/teacher/group/',
            type: 'POST', //type is any HTTP method
            data: {
                grade, student_id, class_id
            },//Data as js object
                success: function () {
                $('#myModal').modal('hide')
                $('#gradeSuccess').modal('show')
                $('#' + student_id).removeAttr("data-toggle");
            }
        });
    }

  function addGradeGroup() {
        var grade = $('#grade').val();
        var class_id = $('#class_id').val();
        
        var student_id = $('#student_id').val();

        $.ajax({
            url: '/teacher/group/',
            type: 'POST', //type is any HTTP method
            data: {
                grade, student_id, class_id
            },//Data as js object
                success: function () {
                $('#myModal').modal('hide')
                $('#gradeSuccess').modal('show')
                $('#' + student_id).removeAttr("data-toggle");
            }
        });
    }


</script>



@endsection