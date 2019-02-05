@extends('layouts.app')
@section('title', 'YouTeach | About')

@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
              <!-- Basic Form-->

              <!-- Form Elements -->
              <div class="col-lg-12 mb-5">
                <div class="card">
                  <div class="card-header">
                    <h3 class="h6 text-uppercase mb-0">ABOUT</h3>
                  </div>
                  <div class="card-body" style="font-family: Calibri;">
                    <div class="container">
                        <div class="row">
                   
                          <div class="col-lg-12" style="background-color:#700f20; font-size: 16px; color: white; border-radius: 20px">
                            <img src="{{ asset('assets/img/logo1.png') }}" class="img-responsive" style="width: 230px; padding: 30px 30px 30px 30px;
                                                            display: block;
                                                            margin-left: auto;
                                                            margin-right: auto;
                                                            ">


                            <p style="font-family: 'Calibri">Youteach: A Junior High School Learning Management System for Holy Angel University is an educational technology which offers a communication, collaboration, and teaching tools for teachers.
                            <br><br>
                          Youteach LMS enables teachers to share content, distribute quizzes, assignments, and manage communication with students. It was developed to improve the learning experience for students and instructors.</p>
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