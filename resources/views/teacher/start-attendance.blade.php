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
                  width: 150px;" data-toggle="modal" data-target="#myModal" id="gradeButton">Start Attendance</a>
              </div>

              
            </div>
            
        </div>
    </div>
</div>
</div>
</div>

</section>
</div>
@endsection