@extends('layouts.app')
@section('title', 'Attendance - YouTeach')

@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
          <!-- Post -->   
            <div class="row mb-4">            
              <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="card">
                  <div class="card-header"  style="background-color: #f55b5b; color: #e8e5e5;">
                    <h3> {{ $myClass->class_name}} </h3>
                    <p>{{ $myClass->user_profile->given_name }} {{ $myClass->user_profile->family_name }} | {{ $myClass->subject->subject_desc}} | {{ $myClass->section->section_name}}</p> 
                  </div>
                  <div class="card-body" >
            <div class="container" id="QR-Code">
            <div class="col-md-6">
                <div class="well" style="position: relative;display: inline-block;">
                    <canvas width="250" height="120" id="webcodecam-canvas"></canvas>
                    <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                    <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                    <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                    <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                </div>
                <div class="well" style="width: 100%;">
                    <label id="zoom-value" width="100">Zoom: 2</label>
                    <input id="zoom" onchange="Page.changeZoom();" type="range" min="10" max="30" value="20">
                    <label id="brightness-value" width="100">Brightness: 0</label>
                    <input id="brightness" onchange="Page.changeBrightness();" type="range" min="0" max="128" value="0">
                    <label id="contrast-value" width="100">Contrast: 0</label>
                    <input id="contrast" onchange="Page.changeContrast();" type="range" min="-128" max="128" value="0">
                    <label id="threshold-value" width="100">Threshold: 0</label>
                    <input id="threshold" onchange="Page.changeThreshold();" type="range" min="0" max="512" value="0">
                    <label id="sharpness-value" width="100">Sharpness: off</label>
                    <input id="sharpness" onchange="Page.changeSharpness();" type="checkbox">
                    <label id="grayscale-value" width="100">grayscale: off</label>
                    <input id="grayscale" onchange="Page.changeGrayscale();" type="checkbox">
                    <br>
                    <label id="flipVertical-value" width="100">Flip Vertical: off</label>
                    <input id="flipVertical" onchange="Page.changeVertical();" type="checkbox">
                    <label id="flipHorizontal-value" width="100">Flip Horizontal: off</label>
                    <input id="flipHorizontal" onchange="Page.changeHorizontal();" type="checkbox">
                </div>
            </div>
            <div class="col-md-6">
                <select class="form-control" id="camera-select"></select>
                <div class="form-group">
                   
                    <button title="Decode Image" class="btn btn-default btn-sm" id="decode-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-upload"></span></button>
                    <button title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-picture"></span></button>
                    <button title="Play" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-play"></span></button>
                    <button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-pause"></span></button>
                    <button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-stop"></span></button>
                 </div>

                <div class="thumbnail" id="result">
                    <div class="well">
                        <img width="320" height="240" id="scanned-img" src="">
                    </div>
                    <div class="caption">
                        <h3>Scanned result</h3>
                        <p id="scanned-QR"></p>
                    </div>
                </div>
            </div>
         

 </div>
     <script type="text/javascript" src=" {{ asset('qr_login/option2/js/filereader.js') }}"></script>
    <script type="text/javascript" src=" {{ asset('qr_login/option2/js/qrcodelib.js') }}"></script>
    <script type="text/javascript" src="{{ asset('qr_login/option2/js/webcodecamjs.js ') }}"></script>
    <script type="text/javascript" src="{{ asset('qr_login/option2/attendance.js ') }}"></script>
 <script>
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
      
    function CallAjaxLoginQr(code) {
        //var s_code = $('#s_code_new').val();

        $.ajax({
            url: '/student/attendance/',
            type: 'POST', //type is any HTTP method
            data: {
                data:code
            }, //Data as js object
            success: function (data) {
                
                if (data==1) {
                    //location.reload()
                 window.location.reload(true);
                  }else{
                   return confirm('Error! You Already take your Attendance or Invalid QR CODE'); 
                  }
            }

        });
    }
 </script>

@endsection
