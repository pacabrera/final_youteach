@extends('layouts.app')

@section('title', 'YouTeach')
@section('content')
    <main>
        <style>
        .jumbotron{
            background-color: maroon;
        }
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
                    <div class="col-lg-4 col-md-12 text-left mr-auto">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="" class="img-fluid">
                        <br>
                        <br>
                        <br>
                        <h3 class="text-center" style="color:white"> A Junior High School Learning Management System for Holy Angel University</h3>
                    </div>
                    @if (Auth::guest())
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <p class="text-center text-muted">
                                    Already have an account and just want to join to a class?
                                    <a href="{{ route('login') }}">Click here</a> to join!
                                </p>
                                <hr>
                                 <form method="POST" action="{{ route('register') }}">
                                <div class="row">
                                    <div class="col-lg-6 md-6">
                               
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <div class="form">
                                            <input name="given_name" id="n_given" type="text" placeholder="Given name" class="form-control mb-2 {{ $errors->has('given_name') ? 'is-invalid' : '' }}" value="{{ old('given_name') }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('given_name') }}
                                        </div>                                            
                                            <input name="middle_name" id="n_middle" type="text" placeholder="M.I." class="form-control mb-2 {{ $errors->has('middle_name') ? 'is-invalid' : '' }}" value="{{ old('middle_name') }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('middle_name') }}
                                        </div>
                                            <input name="family_name" id="n_family" type="text" placeholder="Family name" class="form-control mb-2 {{ $errors->has('family_name') ? 'is-invalid' : '' }}" value="{{ old('family_name') }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('family_name') }}
                                        </div>
                                            <input name="ext_name" id="ext_name" type="text" placeholder="Ext." class="form-control mb-2 {{ $errors->has('ext_name') ? 'is-invalid' : '' }}" value="{{ old('ext_name') }}">
                                        <div class="ext_name-feedback">
                                            {{ $errors->first('ext_name') }}
                                        </div>                                            
                                        </div>
                                    </div>
                                
                                   
                                    <div class="form-group">
                                        <label for="">Email Address</label>
                                        <input name="email" id="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="gender">Gender</label>
                                      <select id="gender" class="form-control" name="gender">
                                        <option selected value="Male">Male</option>
                                        <option value="Female">Female</option>
                                      </select>
                                    </div>
                                </div>
                                 <div class="col-lg-6 md-6">
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
                                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                                    </div>
                                </div>
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