@extends('layouts.app')
@section('title', 'Classes - YouTeach')
@section('content')

<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
          <!-- Post -->   
            <div class="row mb-4">            
              <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="card">
                  <div class="card-header"  >
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-sm-6">
                             <h3>Add Section</h3>
                        </div>
                    </div>
                </div>
                  <div class="card-body" >
<div class="card gedf-card" >
                          <div class="card-body">
                            <form action="{{ route('sections.store' )}}" method="POST">
                            <div class="row">

                            <div class="col-lg-12 col-md-6">
            @csrf
                <div class="form-group">
                    <label for="">Section Name</label>
                    <input  name="section_name" type="text" class="form-control {{ $errors->has('section_name') ? 'is-invalid' : '' }}">

                <div class="invalid-feedback">
                    {{ $errors->first('section_name') }}
                </div>

                </div>
                <div class="form-group">
                <a href="{{route('sections.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>

            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>

@endsection