 @extends('layouts.app')
@section('title', 'YouTeach | Profile')

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
                    <h3 class="h6 text-uppercase mb-0">Update Profile</h3>
                  </div>
                  <div class="card-body">

                                    <div class="form-horizontal">
                                          <div class="custom-file">
                                              <label class="custom-file-label" for="customFile">Upload Picture</label>
                                              <input type='file' 
                                              class="custom-file-input" onchange="readURL(this);" />

                                              <br>
                                              <br>

                                              <img id="blah" src="img/upload.png" alt="No Photo" width="200px;" />
                                          </div>
                                      </div>
                                      <br>
                                      <br>
                                      <br>

                    <form class="form-horizontal">
                      <div class="form-group row" style="margin-top: 200px;">
                         <div class="col-md-2 col-sm-2 col-lg-6">
                            <input type="text" placeholder="First Name" class="form-control">
                        </div>
                        <div class="col-md-2 col-sm-2 col-lg-6">
                            <input type="text" placeholder="Middle Name" class="form-control">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-md-6">
                          <input type="text" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="col-md-6">
                          <input type="email" class="form-control" placeholder="Email">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4" style="text-align: center;">
                          <input type="text" disabled="" placeholder="20479612" class="form-control">
                        </div>
                        <div class="col-md-4">
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <div class="col-md-4 ml-auto">
                          <button type="submit" class="btn btn-secondary">Cancel</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>


    <!--Upload picture -->
    <script type="text/javascript">
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
    @endsection