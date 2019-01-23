@extends('layouts.app')
@section('title', 'Classes - YouTeach')
@section('content')

<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
          <!-- Post -->   
            <div class="row mb-4">            
              <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="card">
                  <div class="card-header"  style="background-color: #f55b5b; color: #e8e5e5;">
                    <div class="row">
                        <div class="col-lg-9 col-md-6 col-sm-6">
                             <h3>Sections: {{$sections->count()}}</h3>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                             <a class="btn btn-warning" href="{{ route('add-section')}}">Add New Class</a>
                        </div>
                    </div>
                </div>
                  <div class="card-body" >
<div class="card gedf-card" >
                          <div class="card-body">
            <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Section Name</th>
                        <th>Classes</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sections as $s)
                    <tr>
                        <th scope="row">{{ $s->section_id }}</th>
                        <td>{{$s->section_name}}</td>
                        <td>{{$s->klase->count()}}</td>
                        <td>
                            <a href="{{ route('edit-section', $s->section_id)}}" class="btn btn-primary btn-sm" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                            <button class="btn btn-danger btn-sm" data-subid_del="{{ $s->section_id }}" data-toggle="modal" data-target="#deleteSection" {{ $s->klase->count() > 0 ? 'disabled' : '' }}>Delete</button>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

@endsection