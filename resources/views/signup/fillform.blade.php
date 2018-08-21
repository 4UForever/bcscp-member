@extends('layouts.master')
@section('title', 'BCSCP ลงทะเบียนสมาชิก')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.min.css">
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                language: 'th',
                autoclose: true
            });
            //autocomplete address
            $("select[name='provinces_id']").change(function(event) {
                $.get("ajax-select", {'type':'amphures', 'province_id':$(this).val()}, function(data){
                    $("select[name='amphures_id']").html(data);
                    $("select[name='amphures_id']").change();
                });
            });
            $("select[name='amphures_id']").change(function(event) {
                $.get("ajax-select", {'type':'districts', 'amphure_id':$(this).val()}, function(data){
                    $("select[name='districts_id']").html(data);
                    $("select[name='districts_id']").change();
                });
            });
            $("select[name='districts_id']").change(function(event) {
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
                $( element ).parents("div[class^='col']").addClass("has-error");
                $( element ).parents("div[class^='col']").find("span.glyphicon").addClass("glyphicon-remove");
            },
            unhighlight: function ( element, errorClass, validClass ) {
                $( element ).parents("div[class^='col']").removeClass("has-feedback");
                $( element ).parents("div[class^='col']").removeClass("has-error");
                $( element ).parents("div[class^='col']").find("span.glyphicon").remove();
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
                provinces_id: "required",
                amphures_id: "required",
                districts_id: "required",
                postcode: "required",
                mobile: {
                    required: true,
                    digits: true
                }
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
                provinces_id: "กรุณาระบุจังหวัด",
                amphures_id: "กรุณาระบุอำเภอ",
                districts_id: "กรุณาระบุตำบล",
                postcode: "กรุณาระบุรหัสไปรษณีย์",
                mobile: {
                    required: "กรุณาระบุเบอร์โทรศัพท์",
                    digits: "กรุณาระบุเบอร์โทรศัพท์เป็นตัวเลขเท่านั้น"
                }
            }
        };
        step[2] = {
            rules: {
                bu_address: "required",
                bu_provinces_id: "required",
                bu_amphures_id: "required",
                bu_districts_id: "required",
                bu_postcode: "required",
                bu_confirm_map: "required",
                bu_mobile: {
                    required: true,
                    digits: true
                },
                bu_email: {
                    required: true,
                    validEmail: true
                }
            },
            messages: {
                bu_address: "กรุณาระบุที่อยู่ที่ทำการ",
                bu_provinces_id: "กรุณาระบุจังหวัดที่ทำการ",
                bu_amphures_id: "กรุณาระบุอำเภอที่ทำการ",
                bu_districts_id: "กรุณาระบุตำบลที่ทำการ",
                bu_postcode: "กรุณาระบุรหัสไปรษณีย์ที่ทำการ",
                bu_confirm_map: "กรุณายืนยันแผนที่ที่ทำการ",
                bu_mobile: {
                    required: "กรุณาระบุเบอร์โทรศัพท์ที่ทำการ",
                    digits: "กรุณาระบุเบอร์โทรศัพท์เป็นตัวเลขเท่านั้น"
                },
                bu_email: {
                    required: "กรุณาระบุอีเมล์ที่ทำการ",
                    validEmail: "รูปแบบอีเมล์แอดเดรสไม่ถูกต้อง"
                }
            }
        };
        step[3] = {};
        step[4] = {};

    $(".bt-next").click(function(e){
        e.preventDefault();
        var current = $(this).data("current");
        if($("#fSignup").validate(step[current]).form()){
            $(".tab-content").children('div').removeClass('active');
            $("#step"+(current+1)).addClass('active');
            $("#fSignup").validate(step[current]).destroy();
        }
    });
    $(".bt-previous").click(function(e){
        e.preventDefault();
        var current = $(this).data("current");
        // if($("#fSignup").validate(step[current]).form()){
            $(".tab-content").children('div').removeClass('active');
            $("#step"+(current-1)).addClass('active');
            $("#fSignup").validate(step[current]).destroy();
        // }
    });

    $("#auto-address").on("click", function(){
        if($(this).is(':checked')){
            $("input[name='bu_address']").val($("input[name='address']").val());
            $("select[name='bu_provinces_id']").html($("select[name='provinces_id']").html());
            $("select[name='bu_provinces_id']").val($("select[name='provinces_id']").val());
            $("select[name='bu_amphures_id']").html($("select[name='amphures_id']").html());
            $("select[name='bu_amphures_id']").val($("select[name='amphures_id']").val());
            $("select[name='bu_districts_id']").html($("select[name='districts_id']").html());
            $("select[name='bu_districts_id']").val($("select[name='districts_id']").val());
            $("input[name='bu_postcode']").val($("input[name='postcode']").val());
        }
    });
    $("select[name='bu_provinces_id']").on("change", function(event) {
        $.get("ajax-select", {'type':'amphures', 'province_id':$(this).val()}, function(data){
            $("select[name='bu_amphures_id']").html(data);
            $("select[name='bu_amphures_id']").change();
        });
    });
    $("select[name='bu_amphures_id']").on("change", function(event) {
        $.get("ajax-select", {'type':'districts', 'amphure_id':$(this).val()}, function(data){
            $("select[name='bu_districts_id']").html(data);
            $("select[name='bu_districts_id']").change();
        });
    });
    $("select[name='bu_districts_id']").on("change", function(event) {
        // console.log($(this).find(':selected').attr('data-zipcode'));
        var zip_code = $(this).find(':selected').attr('data-zipcode');
        $("input[name='bu_postcode']").val(((zip_code=="0")? "":zip_code));
    });

    /* Easy drop */
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
        dropUpload(files, dv_images, input_imgs);
        return false;
    });
    $(".easy-drop input[type='file']").on('change', function(e) {
        e.preventDefault();
        var files = event.target.files;
        console.log('total='+files.length);
        var dv_images = $(this).parents(".easy-drop").children("div.easy-drop-images");
        var input_imgs = $(this).parents(".easy-drop").children("div.easy-drop-input").attr("data-input");
        dropUpload(files, dv_images, input_imgs);
    });

    var csrfToken = $('input[name="_token"]').val();
    setInterval(refreshToken, 3600000);
    function refreshToken(){
        $.get('refresh-csrf').done(function(data){
            csrfToken = data; // the new token
            $('input[name="_token"]').val(data);
        });
    }

    function dropUpload(files, dv_images, input_imgs){
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
            } else {
                $.each(files, function(k, v) {
                    $(dv_images.children("div")[current_img]).remove();
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

    $("#bt_upload_file").on('click', function(e) {
        e.preventDefault();
        var file = $('input[name="bu_upload_files"]').prop('files')[0];
        var file_type = $("select[name='bu_upload_file_type']").val();
        if(file){
            $("#bt_upload_file").prop('disabled', true);
            var formData = new FormData();
            formData.append('_token', csrfToken);
            formData.append('file', file);
            formData.append('file_type', file_type);
            $.ajax({
                url: 'ajax-upload-file',
                type: 'POST',
                data: formData,
                cache: false,
                dataType: 'json',
                processData: false,
                contentType: false,
                beforeSend: function(){
                    $(".bu_file_show").find(".uploading").show();
                }
            }).done(function(data){
                // console.log(data);
                if(data.status=="success"){
                    $(".bu_file_show").find(".uploading").hide();
                    $(".bu_file_show").find("ul").append('<li><a href="'+data.file+'" target="_blank">'+data.file_type+'</a><input type="hidden" name="bu_files[]" value="'+data.file+'"><input type="hidden" name="bu_files_type[]" value="'+data.file_type+'"> <a href="javascript:void(0);" class="bt-remove-file"><span class="fa fa-times-circle"></span></a></li>');
                } else {
                    $(".bu_file_show").find(".uploading").hide();
                }
                $("#bt_upload_file").prop('disabled', false);
            });
        }
    });

    $(".tab-content").on('click', '.bt-remove-file', function(e) {
        var file = $(this).parent("li").find("input[name='bu_files[]']").val();
        var li = $(this).parent("li");
        $.get("ajax-upload-delete", { del:file }, function(data) {
            li.remove();
        });
    });

    $(".tab-content").on('click', 'input[name="member_type"]', function(e) {
        if( ($("input[name='member_type']:checked").val()=="2") || ($("input[name='member_type']:checked").val()=="3") ){
            $("#dv-payment").slideDown();
        } else {
            $("#dv-payment").slideUp();
        }
    });
    </script>
@endsection
