@extends('layouts.master')
@section('title', 'BCSCP สิทธิประโยชน์การเป็นสมาชิก')
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
    font-size: 2.2em;
    text-align: center;
    padding: 5px 0;
    margin: 15px 0;
    background-color: #d9edf7;
    border-radius: 10px;
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
        <h3 class="header-bgwhite">สิทธิประโยชน์ที่คุณจะได้รับ</h3>
        <div class="row well">
            <div class="col-md-12">
                <h2 class="sn-header">ประเภทผู้เข้าร่วม</h2>
            </div>
            <div class="col-md-6">
                <div class="sn-box">
                    <h3>สำหรับผู้ประกอบการ</h3>
                    <span class="fa fa-dot-circle-o"></span> เพื่อทำการประชาสัมพันธ์ธุรกิจท่าน<br>
                    <span class="fa fa-dot-circle-o"></span> เพื่อเพิ่มช่องทางการตลาดให้ธุรกิจท่าน<br>
                    <span class="fa fa-dot-circle-o"></span> เพื่อมีสิทธิ์หรือส่วนร่วมในการพัฒนา<br>
                </div>
            </div>
            <div class="col-md-6">
                <div class="sn-box">
                    <h3>สำหรับบุคคลทั่วไป</h3>
                    <span class="fa fa-dot-circle-o"></span> เพื่อรับสิทธิ์พิเศษและผลประโยชน์<br>
                    <span class="fa fa-dot-circle-o"></span> เพื่อพัฒนาตนเองและเริ่มต้นธุรกิจ<br>
                    <span class="fa fa-dot-circle-o"></span> เพื่อสร้างเครือข่ายหรือขายด้านต่างๆ<br>
                </div>
            </div>
            <div class="col-md-12"><hr></div>
            <div class="col-md-12">
                <h2 class="sn-header">สิทธิ์ประโยชน์ของสมาชิก 3 ประเภท (กรุณาเลือกประเภทสมาชิก)</h2>
            </div>
            <div class="col-md-12">
                <h3>1. สมัครแบบธรรมดา</h3>
                <div class="sn-listtext">ไม่มีค่าใช้จ่าย เพียงท่านกรอกแบบฟอร์มใน Application On Mobile เพื่อเก็บเป็นฐานข้อมูล โดยผู้สมัครจะได้รับสติ๊กเกอร์ติดหน้าร้านค้าต่างๆ</div>
                <h3>2. สมัครแบบที่ต้องการได้รับสิทธิพิเศษ</h3>
                <div class="sn-listtext">ได้รับสิทธิในการท่องเที่ยวต่างๆ อาทิ “โครงการเที่ยวไทย ช่วยชาติ” ชำระค่าประกัน บัตรในราคา 499 บาท มีอายุบัตร 5 ปี และยังสามารถใช้บัตรร่วมกับโปรโมชั่น อื่นๆ ได้ ซึ่งบัตรสามารถใช้ในร้านสะดวกซื้อ</div>
                <h3>3. สมัครแบบเป็นสมาชิก 3 ปี</h3>
                <div class="sn-listtext">ชำระค่าธรรมเนียม 3,888 บาท สมัครเพื่อเป็นสมาชิกวิสามัญ โดยผู้สมัครจะได้ ใบรับรองการเป็นสมาชิกวิสามัญ ได้รับการเชื่อมต่อทางธุรกิจ รวมถึงส่วนลดและสิทธิ พิเศษอื่นๆ อาทิเช่น งาน Road Show, Event หรือเดินทางต่างประเทศ รูปแบบนี้จะได้รับการ สนับสนุนและพิจารณาก่อนเป็นอันดับแรก</div>
            </div>
            <div class="col-md-12 margin-top text-center"><a href="//www.bcscp.org"><span class="fa fa-hand-o-right"></span> สามารถศึกษาและดูรายละเอียดได้ในเว็บไซต์</a></div>
            <div class="col-md-12"><hr></div>
            <div class="col-md-6 margin-top text-center">
                เป็นสมาชิกแล้ว ต้องการแก้ไขข้อมูล คลิก
                <a href="" class="btn btn-success"><span class="fa fa-sign-in"></span> เข้าสู่ระบบ</a>
            </div>
            <div class="col-md-6 margin-top text-center">
                ยังไม่เป็นสมาชิก ต้องการสมัครสมาชิกใหม่ คลิก
                <a href="fill-form" class="btn btn-success"><span class="fa fa-user-plus"></span> สมัครสมาชิก</a>
            </div>
        </div>
    </div>
@endsection
