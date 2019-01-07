@extends('layouts.app')
@section('title', 'Teacher - YouTeach')
@section('content')


{!! QrCode::size(250)->generate('Make me a QrCode!'); !!}
<script type="text/javascript" src="{{ URL::asset('/qr_login/jsqrcode-combined.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/qr_login/html5-qrcode.min.js') }}"></script>
 <div class="row">
       <div class="col-md-12">
           <h2>QR Code</h2>
           <div id="reader" style="width:300px;height:250px">
           </div>
           <h6>Result</h6>
           <span id="read" class="center"></span>
       <br>
      </div>
  </div>
<script>
       $(document).ready(function () {
                $('#reader').html5_qrcode(function (data) {
                   alert(data);
               },
                   function (error) {
                       console.log(error);
                   }, function (videoError) {
                      console.log(videoError);
               }
              );
           });
     
</script>
@endsection