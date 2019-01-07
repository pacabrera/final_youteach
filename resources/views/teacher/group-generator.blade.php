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
                  <div class="card-header"  style="background-color: #f55b5b; color: #e8e5e5;">
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
<br>
             
             <div style="text-align: center;">   
              <h2>No. of Students in {{ $myClass->class_name }}: {{ $myClass->class_members->count() }}</h2>
              <h3 id="student_name">Input Number of Members per Group</h3>
              <!-- start the realm of the buttons -->
              <form action="{{ route('generate-group', $myClass->class_id )}}" method="POST">
                @csrf
                <input type="text" id="numGroup" name="numGroup" maxlength="3" 
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
       

              <!-- start the realm of the buttons -->
              <div id="rndmBtn">
                <button type="submit" onClick='generateGroup()' class="btn red" style="
                    border-radius: 5px;
                    padding: 10px 20px;
                    font-size: 14px;
                    text-decoration: none;
                    margin: 5px;
                    color: #fff;
                    position: relative;
                    display: inline-block;
                    width: 150px;">Generate</button>
              </div>
</form>
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
                                <input type="text" id="grade" name="grade" maxlength="3" 
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
                                  <input type="hidden" id="student_id" name="usr_id" value="">
                                  <input type="hidden" name="class_id" value="{{ $myClass->class_id }}">
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                            <button type="submit" class="btn btn-primary">Grade </button>
                        </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

        <!-- //Modal Form-->     

</section>
</div>


@endsection