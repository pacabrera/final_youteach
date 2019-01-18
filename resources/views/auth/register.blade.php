@extends('layouts.app')

@section('title', 'YouTeach')
@section('content')
    <main>
        <style>
            p.home-lead {
                font-size: 26px;
            }

            h1.home-title {
                font-size: 72px;
            }
            .logo {
                background-image: url('/assets/img/logo.png');
                background-position: center;
                background-size: cover;
                height: 400px;
                width: 400px;
            }
        </style>
        
        <div class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 text-left mr-auto">
                        <img src="{{ asset('assets/img/illustration.svg') }}" alt="" class="img-fluid">

                    </div>
                    @if (Auth::guest())
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <p class="text-center text-muted">
                                    Already have an account and just want to join to a class?
                                    <a href="{{ route('login') }}">Click here</a> to join!
                                </p>
                                <hr>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <div class="form">
                                            <input name="n_given" id="n_given" type="text" placeholder="Given name" class="form-control mb-2" value="{{ old('n_given') }}">
                                            <input name="n_middle" id="n_middle" type="text" placeholder="M.I." class="form-control mb-2" value="{{ old('n_middle') }}">
                                            <input name="n_family" id="n_family" type="text" placeholder="Family name" class="form-control mb-2" value="{{ old('n_family') }}">
                                            <input name="n_ext" id="n_ext" type="text" placeholder="Ext." class="form-control mb-2" value="{{ old('n_ext') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="gender">Gender</label>
                                      <select id="gender" class="form-control" name="gender">
                                        <option selected value="Male">Male</option>
                                        <option value="Female">Female</option>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Student No.</label>
                                        <input name="id" id="id" type="text" class="form-control {{ $errors->has('id') ? 'is-invalid' : '' }}" value="{{ old('id') }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('id') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input name="password" id="password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                        <small class="form-text text-muted">At least 8 characters</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password_confirmation" required>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-block">Register</button>
                                        <small class="form-text text-muted text-center">By clicking "Register", you agree to our terms of service and privacy policy.</small>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    
@endsection