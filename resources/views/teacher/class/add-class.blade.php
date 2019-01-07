@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Class') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('add-class') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="class_name" class="col-md-4 col-form-label text-md-right">{{ __('Class Name') }}</label>

                            <div class="col-md-6">
                                <input id="class_name" type="text" class="form-control{{ $errors->has('class_name') ? ' is-invalid' : '' }}" name="class_name" value="{{ old('class_name') }}" required>

                                @if ($errors->has('class_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('class_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gradelvl" class="col-md-4 col-form-label text-md-right">{{ __('Grade Level') }}</label>

                            <div class="col-md-6">
                                <select class="form-control{{ $errors->has('gradelvl') ? ' is-invalid' : '' }}" name="gradelvl">
                                    <option value="7">7th</option>
                                    <option value="8">8th</option>
                                    <option value="9">9th</option>
                                    <option value="10">10th</option>
                                </select>

                                @if ($errors->has('gradelvl'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gradelvl') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" name="section" value="WD">

                        <div class="form-group row">
                            <label for="subject" class="col-md-4 col-form-label text-md-right">{{ __('Grade Level') }}</label>

                            <div class="col-md-6">
                                <select class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" name="subject">
                                    <option value="AP">Araling Panlipunan</option>
                                    <option value="CLE">CLE</option>
                                    <option value="ENG">English</option>
                                    <option value="MATH">Math</option>
                                </select>

                                @if ($errors->has('subject'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Class') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
