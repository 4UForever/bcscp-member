<div class="row">
    <div class="col-md-12">
        <h2 class="sn-header">1. ข้อมูลผู้สมัคร</h2>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6 has-success">
        <label class="control-label" for="email">อีเมล์ (สำหรับแก้ไขข้อมูล) :</label>
        <input type="email" name="email" class="form-control" placeholder="email@yourdomain.com" value="">
    </div>
    <div class="col-md-6 has-error">
        <label class="control-label" for="password">รหัสผ่าน (สำหรับแก้ไขข้อมูล) :</label>
        <input type="password" name="password" class="form-control" placeholder="********">
        <small class="text-danger">โปรดตรวจสอบ</small>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        <label class="control-label" for="prefix">คำนำหน้าชื่อ :</label>
        <select name="prefix" class="form-control">
            <option value="Mr">นาย</option>
            <option value="Mrs">นาง</option>
            <option value="Miss">นางสาว</option>
        </select>
    </div>
    <div class="col-md-5">
        <label class="control-label" for="fname">ชื่อ :</label>
        <input type="text" name="fname" class="form-control">
    </div>
    <div class="col-md-5">
        <label class="control-label" for="lname">นามสกุล :</label>
        <input type="text" name="lname" class="form-control">
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6">
        <label class="control-label" for="birthdate">วัน/เดือน/ปีเกิด(เพื่อสิทธิประโยชน์ในวันเกิดของท่าน) :</label>
        <input type="text" name="birthdate" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="control-label" for="religion">ศาสนา :</label>
        <input type="text" name="religion" class="form-control">
    </div>
</div>
<div class="form-group row">
    <div class="col-md-8">
        <label class="control-label" for="address">ที่อยู่ปัจจุบัน :</label>
        <input type="text" name="address" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="control-label" for="province">จังหวัด :</label>
        <select name="province" class="form-control">
            @foreach ($provinces as $province)
            <option value="{{ $province['id'] }}"{{ (($province_id==$province['id'])? " selected":"") }}>{{ $province['name_th'] }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-4">
        <label class="control-label" for="amphure">อำเภอ/เขต :</label>
        <select name="amphure" class="form-control">
            @foreach ($amphures as $amphure)
            <option value="{{ $amphure['id'] }}"{{ (($amphure_id==$amphure['id'])? " selected":"") }}>{{ trim($amphure['name_th']) }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label class="control-label" for="district">ตำบล/แขวง :</label>
        <select name="district" class="form-control">
            @foreach ($districts as $district)
            <option value="{{ $district['id'] }}"{{ (($district_id==$district['id'])? " selected":"") }} data-zipcode="{{ $district['zip_code'] }}">{{ trim($district['name_th']) }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label class="control-label" for="postcode">รหัสไปรษณีย์ :</label>
        <input type="text" name="postcode" class="form-control" value="{{ $zip_code }}">
    </div>
</div>
<div class="form-group row">
    <div class="col-md-4">
        <label class="control-label" for="mobile">เบอร์โทรศัพท์ :</label>
        <input type="text" name="mobile" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="control-label" for="facebook">Facebook ID :</label>
        <input type="text" name="facebook" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="control-label" for="line_id">Line ID :</label>
        <input type="text" name="line_id" class="form-control">
    </div>
</div>
<div class="form-group row has-error">
    <div class="col-md-12">
        <label class="control-label" for="joined_type">ประเภทการสมัคร :</label>
        <div class="row">
            <div class="col-md-4">
                <div class="radio">
                    <label><input type="radio" name="joined_type" value="1" checked="checked">ผู้ประกอบการ</label>
                </div>
            </div>
            <div class="col-md-8">
                <div class="radio">
                    <label><input type="radio" name="joined_type" value="2">บุคคลทั่วไป</label>
                </div>
            </div>
        </div>
        <small class="text-danger">กรุณาระบุด้วย</small>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-8">
        <div class="progress">
            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:25%">
                1/4
            </div>
        </div>
    </div>
    <div class="col-md-4 text-right">
        <a data-toggle="pill" data-current="1" class="btn btn-success bt-next">ต่อไป <i class="fa fa-chevron-circle-right"></i></a><!--  href="#step2" -->
    </div>
</div>