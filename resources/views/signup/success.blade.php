@extends('layouts.master')
@section('title', 'BCSCP ลงทะเบียนสมาชิก')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center margin-top">
                    <img src="assets/images/logo.png">
                </div>
            </div>
        </div>
        <h3 class="header-bgwhite">ลงทะเบียนสมาชิกเสร็จสิ้น</h3>
        <!-- <div class="form-group text-center">
            <div class="col-xs-offset-4 col-xs-8 col-md-4 alert alert-danger">
                <strong>Failure</strong> ddddd
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-12 text-center alert alert-success">
                <strong>แบบฟอร์มสมัครสมบูรณ์แล้ว ขอขอบคุณที่ร่วมเป็นส่วนหนึ่งของเรา</strong>
                <hr>
                <a href="//bcscp.org" class="btn btn-success"><span class="fa fa-home"></span> กลับสู่หน้าหลัก</a>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
@endsection
