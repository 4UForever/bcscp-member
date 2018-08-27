@extends('layouts.master')
@section('title', 'BCSCP ลงทะเบียนสมาชิก')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.min.css">
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
        <h3 class="header-bgwhite">ลงทะเบียนสมาชิก</h3>
        <!-- <div class="form-group text-center">
            <div class="col-xs-offset-4 col-xs-8 col-md-4 alert alert-danger">
                <strong>Failure</strong> ddddd
            </div>
        </div> -->
        <form id="fSignup" method="post" class="form-horizontal well margin-top" action="register-success">
            {{ csrf_field() }}
            <div class="tab-content">
                <div id="step1" class="tab-pane fade in active">
                    @include('signup.step1')
                </div>
                <div id="step2" class="tab-pane fade in">
                    @include('signup.step2')
                </div>
                <div id="step3" class="tab-pane fade in">
                    @include('signup.step3')
                </div>
                <div id="step4" class="tab-pane fade in">
                    @include('signup.step4')
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    @parent
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.th.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script> -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
@endsection
