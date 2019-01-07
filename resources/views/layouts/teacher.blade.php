<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

<script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/css/orionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.red.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">

    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png?3">



    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="{{ asset('assets/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="{{ asset('assets/js/charts-home.js') }}"></script>
    <script src="{{ asset('assets/js/front.js') }}"></script>

</head>
 @if(Auth::guest())
    
@else
<body>

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
            <form id="searchForm" class="ml-auto d-none d-lg-block">
              <div class="form-group position-relative mb-0">

                <input type="search" placeholder="Search ..." class="form-control form-control-sm border-0 no-shadow pl-4">
              </div>
            </form>
          </li>
          <li class="nav-item dropdown mr-3"><a id="notifications" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-gray-400 px-1"><i class="fa fa-bell"></i><span class="notification-icon"></span></a>
            <div aria-labelledby="notifications" class="dropdown-menu"><a href="#" class="dropdown-item">
              @foreach (Auth::user()->notifications as $notification)
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-green text-white"><i class="fas fa-envelope"></i></div>
                  <div class="text ml-2">
                    <p class="mb-0">{{ $notification->data['data'] }}</p>
                  </div>
                </div></a><a href="#" class="dropdown-item"> 
                  @endforeach
                </a>
              <div class="dropdown-divider"></div><a href="#" class="dropdown-item text-center"><small class="font-weight-bold headings-font-family text-uppercase">View all notifications</small></a>
            </div>
          </li>
          <li class="nav-item dropdown ml-auto"><a id="userInfo" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><img src="{!! Auth::user()->profile_photo() !!}" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
            <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family"> {!! Auth::user()->username() !!} </strong>
              <small>Teacher</small></a>
              <div class="dropdown-divider"></div><a href="#" class="dropdown-item">Settings</a><a href="#" class="dropdown-item">Activity log       </a>
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
      <div id="sidebar" class="sidebar py-3">
        <ul class="sidebar-menu list-unstyled">
            <li class="sidebar-list-item"><a data-toggle="modal" data-target="#createClass" class="sidebar-link text-muted active"><i class="o-search-magnify-1 mr-3 text-gray"></i><span>Create Class</span></a></li>
          </ul>
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
        <ul class="sidebar-menu list-unstyled">
              <li class="sidebar-list-item"><a href="{{ route('home') }}" class="sidebar-link text-muted"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
              <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-sales-up-1 mr-3 text-gray"></i><span>About</span></a></li>
              <li class="sidebar-list-item"><a href="forms.html" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span>Events</span></a></li>
            </ul>
 <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MY CLASSES</div>
         @foreach(Auth::user()->klases() as $classes)      
        <ul class="sidebar-menu list-unstyled">
             
          <li class="sidebar-list-item"><a href="{{ route('class-teacher', $classes->class_id) }}" data-toggle="collapse" data-target="#pages" aria-expanded="false" aria-controls="pages" class="sidebar-link text-muted"><i class="o-wireframe-1 mr-3 text-gray"></i><span>{{ $classes->class_name }}</span></a>
            <div id="pages" class="collapse">
              <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                <li class="sidebar-list-item"><a href="{{ route('class-teacher', $classes->class_id) }}"class="sidebar-link text-muted pl-lg-5">{{ $classes->class_name }}</a></li>
                <li class="sidebar-list-item"><a href="{{ route('recitation', $classes->class_id) }}"class="sidebar-link text-muted pl-lg-5">Recitation Tool</a></li>
                <li class="sidebar-list-item"><a href="{{ route('group', $classes->class_id) }}"class="sidebar-link text-muted pl-lg-5">Group Generator</a></li>
                <li class="sidebar-list-item"><a href="{{ route('quizzes', $classes->class_id) }}"class="sidebar-link text-muted pl-lg-5">Quizzes</a></li>
              </ul>
            </div>
          
        </ul>
        @endforeach

        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MY PROFILE</div>
        <ul class="sidebar-menu list-unstyled">
              <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-database-1 mr-3 text-gray"></i><span>Schedule</span></a></li>
              <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-imac-screen-1 mr-3 text-gray"></i><span>Grades</span></a></li>
              <li class="sidebar-list-item"><a href="{{ route('acc-settings') }}" class="sidebar-link text-muted"><i class="o-paperwork-1 mr-3 text-gray"></i><span>Account Settings</span></a></li>
              <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-wireframe-1 mr-3 text-gray"></i><span>Help</span></a></li>
        </ul>
      </div>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/teckquiz.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

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
    //File Preview
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

</script>
@include('vendor.sweetalert.view')
</body>

</html>