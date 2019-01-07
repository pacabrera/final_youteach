@extends('layouts.app')
@section('title', 'YouTeach | Student')

@section('content')
 <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class='onesignal-customlink-container'></div>
          <!-- Post -->   
            <div class="row mb-4">            
              <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="card">
                  <div class="card-body">
                      <div class="card gedf-card">
                          <div class="card-header">
                              <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                  <li class="nav-item">
                                      <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Make post</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="false" href="#images">Assignment</a>
                                  </li>
                              </ul>
                          </div>
                          <div class="card-body">
                              <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                     <form>
                                      <div class="form-group">
                                          <label class="sr-only" for="message">post</label>
                                            <textarea placeholder="Type here..."></textarea>
                                      </div>

                                       <div class="form-group">
                                          <div class="custom-file">
                                              <input type="file" class="custom-file-input" id="customFile">
                                              <label class="custom-file-label" for="customFile">Attach File</label>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                                      <div class="form-group">
                                          <div class="custom-file">
                                              <input type="file" class="custom-file-input" id="customFile">
                                              <label class="custom-file-label" for="customFile">Upload image</label>
                                          </div>
                                      </div>
                                      <div class="py-4"></div>
                                  </div>
                              </div>
                              <div class="btn-toolbar justify-content-between">
                                  <div class="btn-group">
                                      <button type="submit" class="btn btn-primary">Post</button>
                                  </div>
                              </div>
                            </form>
                          </div>
                      </div>
                  </div>
                </div>
              </div>   

            <!-- Side Notification -->
              <div class="col-lg-4">
                <div class="card mb-4">
                  <div class="card-header">
                    <h2 class="h6 text-uppercase mb-0">Notification</h2>
                  </div>
                  <div class="card-body">
                    <div class="chart-holder">
                      <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between mb-4">
                        <div class="flex-grow-1 d-flex align-items-center">
                          <div class="dot mr-3 bg-red"></div>
                          <div class="text">
                            <h6 class="mb-0">Assignment</h6><span class="text-gray">127 new cases</span>
                          </div>
                        </div>
                        <div class="icon bg-red text-white"><i class="fas fa-clipboard-check"></i></div>
                      </div>

                      <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between mb-4">
                        <div class="flex-grow-1 d-flex align-items-center">
                          <div class="dot mr-3 bg-red"></div>
                          <div class="text">
                            <h6 class="mb-0">Quizzes</h6><span class="text-gray">127 new cases</span>
                          </div>
                        </div>
                        <div class="icon bg-red text-white"><i class="fas fa-clipboard-check"></i></div>
                      </div>

                      <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between mb-4">
                        <div class="flex-grow-1 d-flex align-items-center">
                          <div class="dot mr-3 bg-red"></div>
                          <div class="text">
                            <h6 class="mb-0">Events</h6><span class="text-gray">127 new cases</span>
                          </div>
                        </div>
                        <div class="icon bg-red text-white"><i class="fas fa-clipboard-check"></i></div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            <!-- //Side Notification -->  

            </div>
@endsection
