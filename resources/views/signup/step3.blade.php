<div class="row">
    <div class="col-md-12">
        <h2 class="sn-header">3. ข้อมูลสินค้าหรือบริการ</h2>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6">
        <label class="control-label" for="bu_name">ชื่อกิจการ :</label>
        <input type="text" name="bu_name" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="control-label" for="bu_products">ชื่อสินค้าหรือบริการ :</label>
        <input type="text" name="bu_products" class="form-control">
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <label class="control-label" for="bu_type">ประเภทสินค้า (ถ้ามี เช่น สินค้าเด็ก, เครื่องเขียน, ยานวด, อื่น ๆ) :</label>
        <input type="text" name="bu_type" class="form-control">
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <label class="control-label" for="bu_detail">อธิบายรายละเอียดของสินค้าหรือบริการ (เช่น ให้ข้อมูลการใช้, ปริมาณ, ลักษณะการใช้งาน, สินค้าคืออะไร, อื่น ๆ) :</label>
        <textarea class="form-control" rows="3" name="bu_detail"></textarea>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <label class="control-label" for="bu_feature">จุดเด่นของสินค้าหรือบริการ (กรอกข้อมูลให้ครบถ้วนเพิ่มความเด่นเพื่อส่งเสริมความสำเร็จ) :</label>
        <textarea class="form-control" rows="3" name="bu_feature"></textarea>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <label class="control-label" for="bu_market">สิ่งที่ต้องการพัฒนาหรือช่องทางการตลาด (กรอกข้อมูลให้ครบถ้วนเพิ่มการพัฒนาเพื่อความสำเร็จ) :</label>
        <textarea class="form-control" rows="3" name="bu_market"></textarea>
    </div>
</div>
<div class="form-group">
    <div class="col-md-12">
        <label class="control-label">รูปภาพสินค้าหรือบริการ :</label>
        <div class="easy-drop">
            <div class="easy-drop-images"></div>
            <div class="easy-drop-input" data-input="bu_product_imgs[]">
                <label for="bu_product_images"><img src="assets/images/drop_folder.png">กรุณากดเพื่อเลือกไฟล์ หรือลากไฟล์มาวางที่นี่</label>
                <input type="file" class="form-control" accept="image/*" name="bu_product_images[]" data-limit="10" multiple>
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-8">
        <div class="progress">
            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:75%">
                3/4
            </div>
        </div>
    </div>
    <div class="col-md-4 text-right">
        <a data-toggle="pill" href="#step2" class="btn btn-success bt-previous"><i class="fa fa-chevron-circle-left"></i> ย้อนกลับ</a>
        <a data-toggle="pill" href="#step4" class="btn btn-success bt-next">ต่อไป <i class="fa fa-chevron-circle-right"></i></a>
    </div>
</div>