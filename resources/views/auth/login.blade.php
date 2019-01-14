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
    <link href="{{ asset('assets/css/orionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.sea.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">

    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png?3">


    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="{{ asset('assets/js/charts-home.js') }}"></script>
    <script src="{{ asset('assets/js/front.js') }}"></script>

</head>
  <body>
    <div class="page-holder d-flex align-items-center">
      <div class="container">
        <div class="row align-items-center py-5">
          <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
            <div class="pr-lg-5"><img src="{{ asset('assets/img/illustration.svg') }}" alt="" class="img-fluid"></div>
          </div>
          <div class="col-lg-5 px-lg-4">
            <h1 class="text-base text-primary text-uppercase mb-4">YouTeach LMS</h1>
            <h2 class="mb-4">Welcome back!</h2>
            <p class="text-muted">A Learning Management System for Junior High School Department of Holy Angel University</p>
            <form action="{{ route('login') }}" method="POST">
                   @csrf
                     <div class="form-group mb-4">
                        <input id="id" name="id" type="text" placeholder="Student Number or Employee Number" value="{{ old('id') }}" class="form-control border-0 shadow form-control-lg  {{ $errors->has('id') ? 'is-invalid' : '' }}" required autofocus>
                    </div>
                    <div class="form-group mb-4 {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" name="password" type="password" placeholder="Password" class="form-control border-0 shadow form-control-lg text-violet {{ $errors->has('id') ? 'is-invalid' : '' }}" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('id') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary shadow px-5">Log in</button>
                    </div>
                    <p class="text-center text-muted">
                        Don't have an account?
                        <a href="{{ route('register') }}">Register here!</a>
                    </p>
                </form>

          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
      <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/teckquiz.js') }}"></script>
  </body>
</html>
