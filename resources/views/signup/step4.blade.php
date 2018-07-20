<div class="row">
    <div class="col-md-12">
        <h2 class="sn-header">4. ข้อมูลเอกสารเพิ่มเติม</h2>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <label class="control-label">คุณสามารถส่งเอกสารเพิ่มเติมตามข้อมูลด้านล่าง :</label>
        <div class="row">
            <div class="col-md-12 bu_file_show">
                <ul></ul>
                <div class="uploading" style="display: none;"><span class="fa fa-spinner fa-pulse fa-fw"></span> กำลังอัพโหลด ...</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <select name="bu_upload_file_type" class="form-control">
                    <option value="บัตรประชาชน/หนังสือเดินทาง" selected="selected">บัตรประชาชน/หนังสือเดินทาง</option>
                    <option value="หนังสือรับรองทางราชการหรือเอกชน">หนังสือรับรองทางราชการหรือเอกชน</option>
                    <option value="หนังสือรับรองบริษัท">หนังสือรับรองบริษัท</option>
                    <option value="ใบทะเบียนภาษีมูลค่าเพิ่ม (แบบ ภ.พ.20)">ใบทะเบียนภาษีมูลค่าเพิ่ม (แบบ ภ.พ.20)</option>
                    <option value="เอกสารเพิ่มเติม">เอกสารเพิ่มเติม</option>
                </select>
            </div>
            <div class="col-md-6">
                <input type="file" class="form-control" name="bu_upload_files">
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <label for="">สิทธิ์ประโยชน์ของสมาชิก 3 ประเภท (กรุณาเลือกประเภทสมาชิก)</label>
        <div class="radio">
            <label><input type="radio" name="member_type" value="1">1. สมัครแบบธรรมดา</label>
        </div>
        <div class="alert alert-info">
            ไม่มีค่าใช้จ่าย เพียงท่านกรอกแบบฟอร์มใน Application On Mobile เพื่อเก็บเป็นฐานข้อมูล โดยผู้สมัครจะได้รับสติ๊กเกอร์ติดหน้าร้านค้าต่างๆ
        </div>
        <div class="radio">
            <label><input type="radio" name="member_type" value="2">2. สมัครแบบที่ต้องการได้รับสิทธิพิเศษ</label>
        </div>
        <div class="alert alert-info">
            ได้รับสิทธิในการท่องเที่ยวต่างๆ อาทิ “โครงการเที่ยวไทย ช่วยชาติ” ชำระค่าประกัน บัตรในราคา 499 บาท มีอายุบัตร 5 ปี และยังสามารถใช้บัตรร่วมกับโปรโมชั่น อื่นๆ ได้ ซึ่งบัตรสามารถใช้ในร้านสะดวกซื้อ
        </div>
        <div class="radio">
            <label><input type="radio" name="member_type" value="3">3. สมัครแบบเป็นสมาชิก 3 ปี</label>
        </div>
        <div class="alert alert-info">
            ชำระค่าธรรมเนียม 3,888 บาท สมัครเพื่อเป็นสมาชิกวิสามัญ โดยผู้สมัครจะได้ ใบรับรองการเป็นสมาชิกวิสามัญ ได้รับการเชื่อมต่อทางธุรกิจ รวมถึงส่วนลดและสิทธิ พิเศษอื่นๆ อาทิเช่น งาน Road Show, Event หรือเดินทางต่างประเทศ รูปแบบนี้จะได้รับการ สนับสนุนและพิจารณาก่อนเป็นอันดับแรก
        </div>
    </div>
</div>
<div class="form-group row" id="dv-payment" style="display: none;">
    <div class="col-md-12">
        <label>กรุณาเลือกช่องทางการชำระเงิน (กรณีที่ท่านเลือกประเภทสมาชิกแบบที่ 2 หรือ 3)</label>
        <div class="radio">
            <label><input type="radio" name="pay_method" value="1">1. เงินสด / โอนเงินผ่านทางธนาคาร</label>
        </div>
        <div class="alert alert-info">
            ชำระเงินโดยการโอนเงิน ผ่านทางบัญชี<b>ธนาคารกรุงเทพ</b><br><br>
            <b>ชื่อปัญชี</b> : สมาคมการค้าธุรกิจบริการและผลิตภัณฑ์ผสมผสาน<br>
            <b>เลขที่บัญชี</b> : 906-0-15261-9<br>
            <b>สาขา</b> : เดอะ คริสตัล<br><br>
            หลังจากชำระค่าสมาชิกเสร็จเรียบร้อย กรุณาส่งหลักฐานการชำเงินมาได้ที่<br>
            - Email: info@bcscp.org<br>
            - Tel.: 02-184-1808<br>
        </div>
        <div class="radio">
            <label><input type="radio" name="pay_method" value="2">2. บัตรเดบิต / บัตรเครดิต</label>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-8">
        <div class="progress">
            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                4/4
            </div>
        </div>
    </div>
    <div class="col-md-4 text-right">
        <a data-toggle="pill" href="#step3" class="btn btn-success bt-previous"><i class="fa fa-chevron-circle-left"></i> ย้อนกลับ</a>
    </div>
</div>
