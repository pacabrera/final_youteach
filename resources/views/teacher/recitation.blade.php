@extends('layouts.app')
@section('title', 'Teacher - YouTeach')
@section('content')

<style type="text/css">
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
                   <strong> <i class="fa fa-bell"></i> ATTENDANCE </strong>  <p> This tool pick random student to do a mouth to mouth recitation. Also you can grade the student base on his/her answer by clicking the grade button. </p> 
                  </div>
              
              </div>            
<br>
             
             <div style="text-align: center;">   

              <h3 id="student_name">Student Name</h3>
              <!-- start the realm of the buttons -->
              <div id="rndmBtn">
                <a href="" class="btn red" style="
                  border-radius: 5px;
                  padding: 10px 20px;
                  font-size: 14px;
                  text-decoration: none;
                  margin: 5px;
                  color: #fff;
                  position: relative;
                  display: inline-block;
                  width: 150px;" data-toggle="modal" data-target="#myModal" id="gradeButton">GRADE</a>
              </div>

              <!-- start the realm of the buttons -->
              @if($class->count() != 0)
              <div id="rndmBtn">
                <a onClick='getStudent()' class="btn red" style="
                    border-radius: 5px;
                    padding: 10px 20px;
                    font-size: 14px;
                    text-decoration: none;
                    margin: 5px;
                    color: #fff;
                    position: relative;
                    display: inline-block;
                    width: 150px;">RANDOMIZE</a>
              </div>
             @else
              <div id="rndmBtn">
                <button onClick='reset()'class="btn red" style="
                    border-radius: 5px;
                    padding: 10px 20px;
                    font-size: 14px;
                    text-decoration: none;
                    margin: 5px;
                    color: #fff;
                    position: relative;
                    display: inline-block;
                    width: 150px;">Reset</button>
              </div>
@endif
            </div>
            
        </div>
    </div>
</div>
</div>
</div>
<!-- Modal Form-->
<form action="{{ route('grade-recitation') }}" method="POST">
                   <div class="card-body">
                    <!-- Modal-->
                    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">

                          </div>
                          <div class="modal-body">
                             
                              <div class="form-group">
                            
                                  @csrf
                                <input class="{{ $errors->has('grade') ? 'is-invalid' : '' }}" id="grade" name="grade" type="text" pattern="\d*" maxlength="3"
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
                                                            " required>

                                  <input type="hidden" id="student_id" name="usr_id">
                                  <input type="hidden" name="category" value="{{ $gradecateg }}">
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                            <button type="submit" class="btn btn-primary">Grade </button>
                        
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
</form>
        <!-- //Modal Form-->   


</section>
</div>
 <audio id="audio" src="https://s3-ap-southeast-1.amazonaws.com/youteachlms/audio/recitation-%5BAudioTrimmer.com%5D.mp3" autostart="false" ></audio>
<script>
   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  $(document).ready(function(){
    $("#gradeButton").hide();
});
  var $urlRandom = '{{ route('randomize', $myClass->class_id) }}';
         function getStudent() {
            $.ajax({
               type:'POST',
               url: $urlRandom,
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                  $("#student_name").html(data.student_name);
                  $('#student_id').val(data.student_id);
                  $("#gradeButton").show();
                  var sound = document.getElementById("audio");
                  sound.play()
               }
            });
         }

        function reset() {
        $.ajax({
            url: '{{ route('resetRecitation', $myClass->class_id )}}',
            type: 'POST', //type is any HTTP method
                        success: function () {
                window.location = '{{ route("start-rec" , $myClass->class_id) }}';
            }
        });
    }
      </script>


@endsection