<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
  @yield('css')
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>

    <!-- Styles -->

    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/css/orionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.red.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link href=" {{ URL::asset('/qr_login/option2/css/style.css') }}" rel="stylesheet">
<link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
   <!-- OneSignal for Notifcations --> 
<link rel="manifest" href="{{ asset('assets/onesignal/manifest.json') }}" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

   @include('vendor.sweetalert.cdn') 


    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="{{ asset('assets/js/front.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
</head>
 @if(Auth::guest())
    
@else
<body>
@include('vendor.sweetalert.view')
<!-- navbar-->
    <header class="header">
      <nav id="mainNav" class="navbar navbar-expand-lg px-4 py-2">
        <a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead">
          <i class="fas fa-align-left"></i>
        </a>
        
        <a href="index.html" class="navbar-brand font-weight-bold text-uppercase text-base" style="color: white;">
          YOUTEACH LMS
        </a>

        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
          <li class="nav-item">
          </li>
          <li class="nav-item dropdown mr-3"><a id="notifications" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-gray-400 px-1"><i class="fa fa-bell"></i><span class="notification-icon"></span></a>
            <div aria-labelledby="notifications" class="dropdown-menu"><a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-violet text-white"><i class="fab fa-twitter"></i></div>
                  <div class="text ml-2">
                    <p class="mb-0">You have 2 followers</p>
                  </div>
                </div></a><a href="#" class="dropdown-item"> 
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-green text-white"><i class="fas fa-envelope"></i></div>
                  <div class="text ml-2">
                    <p class="mb-0">You have 6 new messages</p>
                  </div>
                </div></a><a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-blue text-white"><i class="fas fa-upload"></i></div>
                  <div class="text ml-2">
                    <p class="mb-0">Server rebooted</p>
                  </div>
                </div></a><a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-violet text-white"><i class="fab fa-twitter"></i></div>
                  <div class="text ml-2">
                    <p class="mb-0">You have 2 followers</p>
                  </div>
                </div></a>
              <div class="dropdown-divider"></div><a href="#" class="dropdown-item text-center"><small class="font-weight-bold headings-font-family text-uppercase">View all notifications</small></a>
            </div>
          </li>
          <li class="nav-item dropdown ml-auto"><a id="userInfo" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><img src="{!! Auth::user()->profile_photo() !!}" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
            <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family"> {!! Auth::user()->username() !!} </strong>
            </a>
              <div class="dropdown-divider"></div><a href="{{ route('acc-settings')}}" class="dropdown-item">Settings</a><a href="#" class="dropdown-item">Activity log       </a>
              <div class="dropdown-divider"></div><a href="{{ route('logout')  }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
            </div>
          </li>
        </ul>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">


@if(Auth::user()->permissions == 0)
<div id="sidebar" class="sidebar py-3">
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
        <ul class="sidebar-menu list-unstyled">
              <li class="sidebar-list-item"><a href="{{ route('home') }}" class="sidebar-link text-muted"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
              <li class="sidebar-list-item"><a href="{{ route('subjects.index') }}" class="sidebar-link text-muted"><i class="o-sales-up-1 mr-3 text-gray"></i><span>Subjects</span></a></li>
              <li class="sidebar-list-item"><a href="{{ route('teachers.index') }}" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span>Teachers</span></a></li>
              <li class="sidebar-list-item"><a href="{{ route('sections.index') }}" class="sidebar-link text-muted"><i class="o-paperwork-1 mr-3 text-gray"></i><span>Sections</span></a></li>
              <li class="sidebar-list-item"><a href="{{ route('events-admin') }}" class="sidebar-link text-muted"><i class="o-paperwork-1 mr-3 text-gray"></i><span>Events</span></a></li>
        </ul>
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MY PROFILE</div>
        <ul class="sidebar-menu list-unstyled">
              <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-user-details-1 mr-3 text-gray"></i><span>Account Settings</span></a></li>
              <li class="sidebar-list-item"><a href="{{ route('acc-settings') }}" class="sidebar-link text-muted"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Help</span></a></li>
        </ul>
      </div>

 @elseif(Auth::user()->permissions == 1)
      <div id="sidebar" class="sidebar py-3">
        <ul class="sidebar-menu list-unstyled">
            <li class="sidebar-list-item"><a data-toggle="modal" data-target="#createClass" class="sidebar-link text-muted active"><i class="o-search-magnify-1 mr-3 text-gray"></i><span>Create Class</span></a></li>
          </ul>
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
        <ul class="sidebar-menu list-unstyled">
              <li class="sidebar-list-item"><a href="{{ route('home') }}" class="sidebar-link text-muted"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
              <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-sales-up-1 mr-3 text-gray"></i><span>About</span></a></li>
              <li class="sidebar-list-item"><a href="{{ route('events') }}" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span>Events</span></a></li>
            </ul>
 <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MY CLASSES</div>
         @foreach(Auth::user()->klases() as $classes)      
        <ul class="sidebar-menu list-unstyled">
             
          <li class="sidebar-list-item"><a href="{{ route('class-forum', $classes->class_id) }}" data-toggle="collapse" data-target="#pages" aria-expanded="false" aria-controls="pages" class="sidebar-link text-muted"><i class="o-wireframe-1 mr-3 text-gray"></i><span>{{ $classes->class_name }}</span></a>
            <div id="pages" class="collapse">
              <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                <li class="sidebar-list-item"><a href="{{ route('class-forum', $classes->class_id) }}"class="sidebar-link text-muted pl-lg-5">Forum</a></li>
                <li class="sidebar-list-item"><a href="{{ route('recitation', $classes->class_id) }}"class="sidebar-link text-muted pl-lg-5">Recitation Tool</a></li>
                <li class="sidebar-list-item"><a href="{{ route('group', $classes->class_id) }}"class="sidebar-link text-muted pl-lg-5">Group Generator</a></li>
                <li class="sidebar-list-item"><a href="{{ route('quizzes', $classes->class_id) }}"class="sidebar-link text-muted pl-lg-5">Quizzes</a></li>
                <li class="sidebar-list-item"><a href="{{ route('assignments', $classes->class_id) }}"class="sidebar-link text-muted pl-lg-5">Assignments</a></li>
                <li class="sidebar-list-item"><a href="{{ route('qr-attendance', $classes->class_id) }}"class="sidebar-link text-muted pl-lg-5">Attendance</a></li>
                <li class="sidebar-list-item"><a href="{{ route('score-class', $classes->class_id) }}"class="sidebar-link text-muted pl-lg-5">Scores</a></li>
              </ul>
            </div>
          
        </ul>
        @endforeach

        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MY PROFILE</div>
        <ul class="sidebar-menu list-unstyled">
              <li class="sidebar-list-item"><a href="{{ route('schedule-teacher')}}" class="sidebar-link text-muted"><i class="o-database-1 mr-3 text-gray"></i><span>Schedule</span></a></li>
              <li class="sidebar-list-item"><a href="{{ route('acc-settings') }}" class="sidebar-link text-muted"><i class="o-paperwork-1 mr-3 text-gray"></i><span>Account Settings</span></a></li>
              <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Help</span></a></li>
        </ul>
      </div>
@else
      <div id="sidebar" class="sidebar py-3">
        <ul class="sidebar-menu list-unstyled">
            <li class="sidebar-list-item"><a data-toggle="modal" data-target="#joinClass" class="sidebar-link text-muted active"><i class="o-search-magnify-1 mr-3 text-gray"></i><span>Join Class</span></a></li>
          </ul>
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
        <ul class="sidebar-menu list-unstyled">
              <li class="sidebar-list-item"><a href="{{ route('home') }}" class="sidebar-link text-muted"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
              <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-sales-up-1 mr-3 text-gray"></i><span>About</span></a></li>
              <li class="sidebar-list-item"><a href="{{ route('events') }}" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span>Events</span></a></li>
          <li class="sidebar-list-item"><a href="#" data-toggle="collapse" data-target="#pages" aria-expanded="false" aria-controls="pages" class="sidebar-link text-muted"><i class="o-wireframe-1 mr-3 text-gray"></i><span>My Classes</span></a>
            <div id="pages" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                @foreach(Auth::user()->stud_klases() as $classes)      
                <li class="sidebar-list-item"><a href="{{ route('class-forum', $classes->class_id) }}"class="sidebar-link text-muted pl-lg-5">{{ $classes->klase->class_name }}</a></li>
                 @endforeach
              </ul>
            </div>
          </li>
        </ul>
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MY PROFILE</div>
        <ul class="sidebar-menu list-unstyled">
              <li class="sidebar-list-item"><a href="{{ route('schedule')}}" class="sidebar-link text-muted"><i class="o-database-1 mr-3 text-gray"></i><span>Schedule</span></a></li>
              <li class="sidebar-list-item"><a href="{{ route('acc-settings') }}" class="sidebar-link text-muted"><i class="o-paperwork-1 mr-3 text-gray"></i><span>Account Settings</span></a></li>
              <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Help</span></a></li>
        </ul>
      </div>
@endif

@endif

    @yield('content')
     <footer class="footer align-self-end py-3 px-xl-5 w-100">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 text-center text-md-left text-primary">
                <p class="mb-2 mb-md-0" style="color: white;">Copyright 2018 - All Rights Reserved</p>
              </div>
            </div>
          </div>
        </footer>
  </div>

         
    <!-- New Class Modal -->
<div class="modal fade" id="createClass" tabindex="-1" role="dialog" aria-labelledby="createClass" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content form" action="{{ route('class.store' )}}" method="POST">
            {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="modal-title" id="ModalTitle">New Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Class Name</label>
                    <input id="class_name" name="class_name" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Section</label>
                    @php( $sections = \App\Section::all() )  
                    <select name="section_id" class="form-control">
                      @foreach($sections as $section)
                      <option value="{{ $section->section_id }}">{{ $section->section_name }}</option>
                       @endforeach
                    </select>
                   
                </div>
                <div class="form-group">
                  @php( $subjects = \App\Subject::all() )  
                    <label for="">Subject</label>
                    <select name="subject_id" class="form-control">
                      @foreach($subjects as $subject)
                      <option value="{{ $subject->subject_id }}">{{ $subject->subject_code }}</option>
                       @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Schedule</label> <br/>
                    <div class="row">
                    <div class="col-lg-12 col-md-3">
                    Monday <input type="text" name="roomM" class="form-control" placeholder="Room">
                    <br>
                  </div>
                    <div class="col-lg-6 col-md-3">
                    <input type="time" name="monday" class="form-control">
                    </div>
                    <div class="col-lg-6 col-md-3">
                    <input type="time" name="monday2" class="form-control">
                    </div>

                    <div class="col-lg-12 col-md-3">
                    Tuesday <input type="text" name="roomT" class="form-control" placeholder="Room">
                    <br>
                  </div>
                    <div class="col-lg-6 col-md-3">
                     <input type="time" name="tuesday" class="form-control">
                    </div>
                    <div class="col-lg-6 col-md-3">
                     
                    <input type="time" name="tuesday2" class="form-control">
</div>
                    <div class="col-lg-12 col-md-3">
                    Wednesday <input type="text" name="roomW" class="form-control" placeholder="Room">
                    <br>
                  </div>
                    <div class="col-lg-6 col-md-3">
                     <input type="time" name="wednesday" class="form-control">
                    </div>
                    <div class="col-lg-6 col-md-3">
                     
                    <input type="time" name="wednesday2" class="form-control">
</div>
                    <div class="col-lg-12 col-md-3">
                    Thursday <input type="text" name="roomTH" class="form-control" placeholder="Room">
                    <br>
                  </div>
                    <div class="col-lg-6 col-md-3">
                     <input type="time" name="thursday" class="form-control">
                    </div>
                    <div class="col-lg-6 col-md-3">
                      
                    <input type="time" name="thursday2" class="form-control">
</div>
                    <div class="col-lg-12 col-md-3">
                    Friday <input type="text" name="roomF" class="form-control" placeholder="Room">
                    
                  </div>
                    <div class="col-lg-6 col-md-3">
                     <input type="time" name="friday" class="form-control">
                    </div>
                    <div class="col-lg-6 col-md-3">
                      
                    <input type="time" name="friday2" class="form-control">
                  </div>
                    <div class="col-lg-12 col-md-3">
                    Saturday <input type="text" name="roomS" class="form-control" placeholder="Room">
                    <br>
                  </div>
                  <div class="col-lg-6 col-md-3">
                     <input type="time" name="saturday" class="form-control">
                    </div>
                    <div class="col-lg-6 col-md-3">
                      
                    <input type="time" name="saturday2" class="form-control">
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
    
    <!--Join Class Modal -->
<div class="modal fade" id="joinClass" tabindex="-1" role="dialog" aria-labelledby="joinClass" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Join class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Class Code</label>
                    <input id="class_code" type="text" class="form-control">
                    <div class="invalid-feedback">
                        Either this is an invalid class code or you have already joined.
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="joinClass()">Join Class</button>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->

    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/teckquiz.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>


     <script type="text/javascript">

      $(document).ready( function () {
    $('#dataTable').DataTable();
} );

    $('.form_datetime').datetimepicker({        //language:  'fr',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
        showMeridian: 1
    });
</script> 
    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function changePassword(){
        var oldPass = $('#pwd').val();
        var newPass = $('#pwd_new').val();
        var update_type = 0;

         $.ajax({
            url: '/account/' + {{Auth::id()}},
            type: 'PUT', //type is any HTTP method
            data: {
                update_type, oldPass, newPass
            }, //Data as js object
            success: function () {
                $('#changePassword').modal('hide')
                $('#changePasswordSuccess').modal('show')
                $('#pwd').removeClass('is-invalid');
            },
            error: function(data){
                $('#pwd').addClass('is-invalid');
            }
        });
    }
    function joinClass(){
        var class_code = $('#class_code').val();
         $.ajax({
            url: '/student/join',
            type: 'POST', //type is any HTTP method
            data: {
                class_code
            }, //Data as js object
            success: function () {
                $('#class_code').removeClass('is-invalid');
                window.location.reload(true);
            },
            error: function(){
                $('#class_code').addClass('is-invalid');
            }
        });
    }
</script>
@yield('js')
</body>

</html>