@extends('layouts.master')
@section('title', 'BCSCP ลงทะเบียนสมาชิก')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<style type="text/css">
body {
    background-image: url(assets/images/background.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    font-family: 'Kanit';
}
.margin-top {
    margin-top: 10px;
}
.header-bgwhite {
    text-align: center;
    font-size: 3em;
    font-weight: bold;
    text-shadow: -3px -1px 0 #fff, 3px -1px 0 #fff, -3px 1px 0 #fff, 3px 1px 0 #fff;
    padding-bottom: 10px;
}
.sn-header {
    text-align: center;
    background-color: #d9edf7;
    border-radius: 10px;
    padding: 15px 0;
}
.sn-box {
    padding: 20px;
    font-size: 1.2em;
    line-height: 2em;
    background-color: #dff0d8;
    border-radius: 10px;
}
.sn-box h3 {
    margin-top: 0;
}
.sn-listtext {
    font-size: 1.2em;
    padding: 15px;
    background-color: #dff0d8;
}

.easy-drop {
    width: 100%;
    min-height: 200px;
    border: 2px dashed #77bbcc;
    text-align: center;
    border-radius: 10px;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
}
.easy-drop label {
    color: #337ab7;
    cursor: pointer;
}
.easy-drop input[type='file'] {
    display: none;
}
.easy-drop-images {
    display: flex;
    flex-flow: row wrap;
    /*width: 100%;*/
}
.easy-drop-images div {
    border: 1px solid #ddd;
    border-radius: 10px;
    width: 100px;
    height: 100px;
    margin: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    background-color: #fff;
}
.easy-drop-images div img {
    max-width: 100%;
    max-height: 100%;
}
.easy-drop-images div span.close {
    position: absolute;
    background: red;
    color: white;
    top: -10px;
    right: -10px;
}
.easy-drop-images span.remove {
    position: absolute;
    top: -8px;
    right: -8px;
    cursor: pointer;
    opacity: 0.5;
    font-size: 1.5em;
}
.easy-drop-images span.remove:hover {
    opacity: 1;
}
.easy-drop-input {
    padding: 30px 0;
    width: 100%;
}
.easy-drop-input label img {
    max-width: 100px;
    opacity: 0.7;
}
.easy-drop:hover {
    background-color: #eee;
}
</style>
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
        <form id="fSignup" method="post" class="form-horizontal well margin-top">
            {{ csrf_field() }}
            <!-- <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#step1">Home</a></li>
                <li><a data-toggle="pill" href="#step2">Menu 1</a></li>
                <li><a data-toggle="pill" href="#step3">Menu 2</a></li>
                <li><a data-toggle="pill" href="#step4">Menu 3</a></li>
            </ul> -->
            <div class="tab-content">
                <div id="step1" class="tab-pane fade">
                    @include('signup.step1')
                </div>
                <div id="step2" class="tab-pane fade in active">
                    @include('signup.step2')
                </div>
                <div id="step3" class="tab-pane fade">
                    @include('signup.step3')
                </div>
                <div id="step4" class="tab-pane fade">
                    @include('signup.step4')
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script> -->
    <script type="text/javascript">
        $(document).ready(function() {
            //autocomplete address
            $("select[name='province']").change(function(event) {
                $.get("ajax-select", {'type':'amphures', 'province_id':$(this).val()}, function(data){
                    $("select[name='amphure']").html(data);
                    $("select[name='amphure']").change();
                });
            });
            $("select[name='amphure']").change(function(event) {
                $.get("ajax-select", {'type':'districts', 'amphure_id':$(this).val()}, function(data){
                    $("select[name='district']").html(data);
                    $("select[name='district']").change();
                });
            });
            $("select[name='district']").change(function(event) {
                // console.log($(this).find(':selected').attr('data-zipcode'));
                var zip_code = $(this).find(':selected').attr('data-zipcode');
                $("input[name='postcode']").val(((zip_code=="0")? "":zip_code));
            });
        });

        $.validator.addMethod("validEmail", function(value, element) {
            return this.optional( element ) || (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test( value ) );
        }, 'รูปแบบอีเมล์แอดเดรสไม่ถูกต้อง');
        $.validator.setDefaults({
            errorElement: "small",
            errorClass: "text-danger",
            errorPlacement: function ( error, element ) {
                if( !element.closest("div[class^='col']").find("span.glyphicon")[0] ){
                    $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").appendTo( element.closest("div[class^='col']") );
                }
                error.appendTo(element.closest("div[class^='col']"));
            },
            success: function ( label, element ) {
                if( !$( element ).closest("div[class^='col']").find("span.glyphicon")[0] ){
                    $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").appendTo( $( element ).closest("div[class^='col']") );
                }
            },
            highlight: function ( element, errorClass, validClass ) {
                if(!$( element ).parents("div[class^='col']").hasClass("has-feedback")){
                    $( element ).parents("div[class^='col']").addClass("has-feedback");
                }
                $( element ).parents("div[class^='col']").addClass("has-error").removeClass("has-success");
                $( element ).parents("div[class^='col']").find("span.glyphicon").addClass("glyphicon-remove").removeClass("glyphicon-ok");
            },
            unhighlight: function ( element, errorClass, validClass ) {
                if(!$( element ).parents("div[class^='col']").hasClass("has-feedback")){
                    $( element ).parents("div[class^='col']").addClass("has-feedback");
                }
                $( element ).parents("div[class^='col']").addClass("has-success").removeClass("has-error");
                $( element ).parents("div[class^='col']").find("span.glyphicon").addClass("glyphicon-ok").removeClass("glyphicon-remove");
            }
        });

        // $('#fSignup').validate();
        var step = [];
        step[1] = {
            rules: {
                email: {
                    required: true,
                    validEmail: true
                },
                password: "required",
                prefix: "required",
                fname: "required",
                lname: "required",
                birthdate: "required",
                religion: "required",
                address: "required",
                province: "required",
                amphure: "required",
                district: "required",
                postcode: "required",
                mobile: {
                    required: true,
                    digits: true
                },
            },
            messages: {
                email: {
                    required: "กรุณาระบุอีเมล์",
                    validEmail: "รูปแบบอีเมล์แอดเดรสไม่ถูกต้อง"
                },
                password: "กรุณาระบุรหัสผ่าน",
                prefix: "กรุณาระบุคำนำหน้าชื่อ",
                fname: "กรุณาระบุชื่อ",
                lname: "กรุณาระบุนามสกุล",
                birthdate: "กรุณาระบุวันเกิด",
                religion: "กรุณาระบุศาสนา",
                address: "กรุณาระบุที่อยู่",
                province: "กรุณาระบุจังหวัด",
                amphure: "กรุณาระบุอำเภอ",
                district: "กรุณาระบุตำบล",
                postcode: "กรุณาระบุรหัสไปรษณีย์",
                mobile: {
                    required: "กรุณาระบุเบอร์โทรศัพท์",
                    digits: "กรุณาระบุเบอร์โทรศัพท์เป็นตัวเลขเท่านั้น"
                },
            }
        };
        step[2] = {
            rules: {
                bu_address: "required",
                bu_province: "required"
            },
            messages: {
                bu_address: "กรุณาระบุที่อยู่ที่ทำการ",
                bu_province: "กรุณาระบุจังหวัดที่ทำการ"
            }
        };
/*
rules: {
    email: {
        required: true,
        validEmail: true
    },
    password: "required",
    prefix: "required",
    fname: "required",
    lname: "required",
    birthdate: "required",
    religion: "required",
    address: "required",
    province: "required",
    amphure: "required",
    district: "required",
    postcode: "required",
    mobile: {
        required: true,
        digits: true
    },
},
messages: {
    email: {
        required: "กรุณาระบุอีเมล์",
        validEmail: "รูปแบบอีเมล์แอดเดรสไม่ถูกต้อง"
    },
    password: "กรุณาระบุรหัสผ่าน",
    prefix: "กรุณาระบุคำนำหน้าชื่อ",
    fname: "กรุณาระบุชื่อ",
    lname: "กรุณาระบุนามสกุล",
    birthdate: "กรุณาระบุวันเกิด",
    religion: "กรุณาระบุศาสนา",
    address: "กรุณาระบุที่อยู่",
    province: "กรุณาระบุจังหวัด",
    amphure: "กรุณาระบุอำเภอ",
    district: "กรุณาระบุตำบล",
    postcode: "กรุณาระบุรหัสไปรษณีย์",
    mobile: {
        required: "กรุณาระบุเบอร์โทรศัพท์",
        digits: "กรุณาระบุเบอร์โทรศัพท์เป็นตัวเลขเท่านั้น"
    },
}
*/
    $("#bt-test").click(function(e){
        e.preventDefault();
        if($("#fSignup").validate(step2).form()){//$('#fSignup').validate(step1).valid()
            console.log('valid law');
            $(this).attr("href", "#step2");
        } else {
            console.log('not valid');
        }
    });


    $(".easy-drop").on('dragover', function (e) {
        e.preventDefault();
        // console.log('drag over');
    })
    .on("dragleave", function(e) {
        e.preventDefault();
        // console.log('drag leave');
    })
    .on('drop', function (e) {
        // console.log('drop');
        var files = e.originalEvent.dataTransfer.files;
        // console.log('total='+files.length);
        var dv_images = $(this).children("div.easy-drop-images");
        var input_imgs = $(this).children("div.easy-drop-input").attr("data-input");
        upload(files, dv_images, input_imgs);
        return false;
    });
    $(".easy-drop input[type='file']").on('change', function(e) {
        e.preventDefault();
        var files = event.target.files;
        console.log('total='+files.length);
        var dv_images = $(this).parents(".easy-drop").children("div.easy-drop-images");
        var input_imgs = $(this).parents(".easy-drop").children("div.easy-drop-input").attr("data-input");
        upload(files, dv_images, input_imgs);
    });

    var csrfToken = $('input[name="_token"]').val();
    setInterval(refreshToken, 3600000);
    function refreshToken(){
        $.get('refresh-csrf').done(function(data){
            csrfToken = data; // the new token
            $('input[name="_token"]').val(data);
        });
    }

    function upload(files, dv_images, input_imgs){
        var current_img = dv_images.children("div").length;
        var formData = new FormData();
        formData.append('_token', csrfToken);
        $.each(files, function(key, value) {
            // dv_images.append('<div><span class="fa fa-spinner fa-pulse fa-4x fa-fw"></span></div>');
            formData.append('files[]', value);
        });
        $.ajax({
            url: 'ajax-upload',
            type: 'POST',
            data: formData,
            cache: false,
            dataType: 'json',
            processData: false,
            contentType: false,
            beforeSend: function(){
                $.each(files, function() {
                    dv_images.append('<div><span class="fa fa-spinner fa-pulse fa-4x fa-fw"></span></div>');
                });
            }
        }).done(function(data){
            // console.log(data);
            if(data.status=="success"){
                $.each(data.img, function(k, v) {
                    var n = current_img+k;
                    $(dv_images.children("div")[n]).html('<img src="'+v+'"><span class="fa fa-2x fa-times-circle remove"></span>');
                    $(dv_images.parents(".easy-drop")).append('<input type="hidden" name="'+input_imgs+'" value="'+v+'">');
                });
            }
        });
    }

    $(".easy-drop").on("click", ".remove", function(){
        var div_delete = $(this).parent("div");
        var pic_delete = div_delete.children("img").attr("src");
        var input_imgs = $(this).parents(".easy-drop").children("div.easy-drop-input").attr("data-input");
        $.get("ajax-upload-delete", { del:pic_delete }, function(data) {
            div_delete.remove();
            $("input[name='"+input_imgs+"'][value='"+pic_delete+"']").remove();
        });
    });
    </script>
@endsection
