<div class="row">
    <div class="col-md-12">
        <h2 class="sn-header">2. ข้อมูลกิจการหรือสถานประกอบการ</h2>
    </div>
</div>
<div class="form-group row">
	<div class="col-md-12">
		<label>สถานที่สำหรับติดต่อหรือส่งเอกสารจากทางสมาคมฯ</label>
		<div class="checkbox">
			<label><input type="checkbox" value="">ตามที่อยู่ผู้สมัครในหน้าแรก</label>
		</div>
	</div>
</div>
<div class="form-group row">
    <div class="col-md-8">
        <label class="control-label" for="bu_address">ที่อยู่สถานประกอบการ :</label>
        <input type="text" name="bu_address" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="control-label" for="bu_province">จังหวัด :</label>
        <select name="bu_province" class="form-control">
            @foreach ($provinces as $province)
            <option value="{{ $province['id'] }}"{{ (($province_id==$province['id'])? " selected":"") }}>{{ $province['name_th'] }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-4">
        <label class="control-label" for="bu_amphure">อำเภอ/เขต :</label>
        <select name="bu_amphure" class="form-control">
            @foreach ($amphures as $amphure)
            <option value="{{ $amphure['id'] }}"{{ (($amphure_id==$amphure['id'])? " selected":"") }}>{{ trim($amphure['name_th']) }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label class="control-label" for="bu_district">ตำบล/แขวง :</label>
        <select name="bu_district" class="form-control">
            @foreach ($districts as $district)
            <option value="{{ $district['id'] }}"{{ (($district_id==$district['id'])? " selected":"") }} data-zipcode="{{ $district['zip_code'] }}">{{ trim($district['name_th']) }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label class="control-label" for="bu_postcode">รหัสไปรษณีย์ :</label>
        <input type="text" name="bu_postcode" class="form-control" value="{{ $zip_code }}">
    </div>
</div>
<div class="form-group">
	<div class="col-md-12">
		<label class="control-label" for="bu_taxid">เลขประจำตัวผู้เสียภาษี :</label>
        <input type="text" name="bu_taxid" class="form-control">
	</div>
</div>
<div class="form-group">
	<div class="col-md-12">
		<label class="control-label" for="pac-input">ระบุที่ตั้งสถานประกอบการด้วยแผนที่ :</label>
        <input type="text" id="pac-input" name="pac-input" class="form-control" placeholder="พิมพ์เพื่อค้นหาที่อยู่">
        <div id="map" style="height: 350px;"></div>
        <input type="hidden" name="bu_geolat" value="">
        <input type="hidden" name="bu_geolon" value="">
        <div class="checkbox text-center">
            <label><input type="checkbox" value=""> ยืนยันแผนที่ (ถูกต้องไหมตามหมุดที่ปัก)</label>
        </div>
	</div>
</div>
<div class="form-group">
    <div class="col-md-12">
        <label class="control-label">ภาพถ่ายกิจการ / สถานประกอบการ :</label>
        <div class="easy-drop">
            <div class="easy-drop-images"></div>
            <div class="easy-drop-input" data-input="bu_place_imgs[]">
                <label for="bu_images"><img src="assets/images/drop_folder.png">กรุณากดเพื่อเลือกไฟล์ หรือลากไฟล์มาวางที่นี่</label>
                <input type="file" class="form-control" accept="image/*" name="bu_images[]" id="bu_images" data-limit="10" multiple>
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6">
        <label class="control-label" for="bu_phone">เบอร์โทรศัพท์ :</label>
        <input type="text" name="bu_phone" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="control-label" for="bu_email">อีเมล์ :</label>
        <input type="text" name="bu_email" class="form-control">
    </div>
</div>
<div class="form-group row">
    <div class="col-md-4">
        <label class="control-label" for="bu_website">เว็บไซต์ :</label>
        <input type="text" name="bu_website" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="control-label" for="bu_facebook">Facebook :</label>
        <input type="text" name="bu_facebook" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="control-label" for="bu_line_id">Line ID :</label>
        <input type="text" name="bu_line_id" class="form-control">
    </div>
</div>
<div class="form-group row">
    <div class="col-md-8">
        <div class="progress">
            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                2/4
            </div>
        </div>
    </div>
    <div class="col-md-4 text-right">
        <a data-toggle="pill" data-current="2" class="btn btn-success bt-previous"><i class="fa fa-chevron-circle-left"></i> ย้อนกลับ</a>
        <a data-toggle="pill" data-current="2" class="btn btn-success bt-next">ต่อไป <i class="fa fa-chevron-circle-right"></i></a>
    </div>
</div>

<script src="https://maps.google.com/maps/api/js?libraries=places&key=AIzaSyCPFKpkpD7LLtZvPtLyvWGyEWBXuIuSRR4"></script>
<script>
    function initialize() {
        var myLatLng = new google.maps.LatLng(13.76494141545393, 100.5382395983612);
        var mapOptions = {
            zoom: 15,
            center: myLatLng
        }
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);

        var newmk = new google.maps.Marker({
            position: myLatLng,
            map: map,
            draggable: true,
            icon: 'assets/images/location_pin.png'
        });

        google.maps.event.addListener(newmk, 'dragend', function () {
            var latlng = newmk.getPosition();
            setLatLng(latlng.lat(), latlng.lng());
            map.setCenter( latlng );
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach(function(marker) {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };

                // Create a marker for each place.
                /*markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                }));*/

                latlng = place.geometry.location;
                newmk.setPosition(latlng);
                setLatLng(latlng.lat(), latlng.lng());
                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }
    function setLatLng(lat, lng){
        document.getElementsByName('bu_geolat')[0].value = lat;
        document.getElementsByName('bu_geolon')[0].value = lng;
        $('#pac-input').slideUp();
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
