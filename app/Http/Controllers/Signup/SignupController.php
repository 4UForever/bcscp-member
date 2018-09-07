<?php

namespace App\Http\Controllers\Signup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//custom
use File;
use URL;
use Intervention\Image\ImageManagerStatic as Image;
use App\Provinces;
use App\Amphures;
use App\Districts;
use App\Member;

class SignupController extends Controller
{
    function index() {
    	return view('signup/priviledge', []);
    }

    function getRegister(Request $request) {
        $input = $request->all();
    	$provinces = Provinces::orderBy('name_th')->get(['id', 'name_th'])->toArray();
    	$province_id = $provinces[0]['id'];
    	$amphures = Amphures::where('province_id', $province_id)->orderBy('name_th')->get(['id','name_th'])->toArray();
    	$amphure_id = $amphures[0]['id'];
    	$districts = Districts::where('amphure_id', $amphure_id)->orderBy('name_th')->get(['id', 'name_th', 'zip_code'])->toArray();
    	$district_id = $districts[0]['id'];
    	$zip_code = $districts[0]['zip_code'];
        $step = (isset($input['step']))? $input['step']:1;
    	return view('signup/fillform', compact('provinces', 'province_id', 'amphures', 'amphure_id', 'districts', 'district_id', 'zip_code', 'step'));
    }

    function postRegister(Request $request) {
        $input = $request->all();
        $arrTreepay = [
            'pay_type' => 'PACA',
            'currency' => '764',
            'tp_langFlag' => 'th',
            'site_cd' => 'P0000076T5',
            'ret_url' => URL::to('/member/payment-status'),
            'user_id' => '',
            ''
        ];
        echo URL::to('/member/payment-status');
        // echo "<pre>";print_r($input);echo "</pre>";
        /*if(!empty($input)){
            $bu_place_imgs = (isset($input['bu_place_imgs']))? json_encode($input['bu_place_imgs']):"";
            $bu_product_imgs = (isset($input['bu_product_imgs']))? json_encode($input['bu_product_imgs']):"";
            if(isset($input['bu_files'])){
                $arrTmp = array();
                foreach($input['bu_files'] as $k=>$v){
                    $arrTmp[$k] = [$input['bu_files'][$k]=>$input['bu_files_type'][$k]];
                }
                $bu_files = json_encode($arrTmp, JSON_UNESCAPED_UNICODE);
            }
            $arrInsert = [
                'email' => $input['email'],
                'password' => $input['password'],
                'prefix' => $input['prefix'],
                'fname' => $input['fname'],
                'lname' => $input['lname'],
                'birthdate' => $input['birthdate'],
                'religion' => $input['religion'],
                'mobile' => $input['mobile'],
                'facebook' => $input['facebook'],
                'line_id' => $input['line_id'],
                'address' => $input['address'],
                'provinces_id' => $input['provinces_id'],
                'amphures_id' => $input['amphures_id'],
                'districts_id' => $input['districts_id'],
                'postcode' => $input['postcode'],
                'joined_type' => $input['joined_type'],
                'bu_name' => $input['bu_name'],
                'bu_products' => $input['bu_products'],
                'bu_type' => $input['bu_type'],
                'bu_detail' => $input['bu_detail'],
                'bu_feature' => $input['bu_feature'],
                'bu_market' => $input['bu_market'],
                'bu_geolat' => $input['bu_geolat'],
                'bu_geolon' => $input['bu_geolon'],
                'bu_address' => $input['bu_address'],
                'bu_provinces_id' => $input['bu_provinces_id'],
                'bu_amphures_id' => $input['bu_amphures_id'],
                'bu_districts_id' => $input['bu_districts_id'],
                'bu_postcode' => $input['bu_postcode'],
                'bu_taxid' => $input['bu_taxid'],
                'bu_mobile' => $input['bu_mobile'],
                'bu_email' => $input['bu_email'],
                'bu_website' => $input['bu_website'],
                'bu_facebook' => $input['bu_facebook'],
                'bu_line_id' => $input['bu_line_id'],
                'bu_place_imgs' => $bu_place_imgs,//bu_place_imgs page 2
                'bu_product_imgs' => $bu_product_imgs,//bu_product_imgs page 3
                'bu_files' => $bu_files,//bu_files, bu_files_type page 4
                'member_type' => $input['member_type'],
                'active' => 1,
                'payment_method' => $input['payment_method'],
                'payment_status' => '0'
            ];
            // echo "<pre>";print_r($arrInsert);echo "</pre>";
            // Member::insert($arrInsert);
            if($input['payment_method']=="2"){
                
            }
        } else {
            return view('signup/success');
        }*/
    }

    function regisSuccess() {
        return view('signup/success');
    }

    function ajaxSelect(Request $request) {
    	$input = $request->all();
    	// print_r($input);
    	$str = "";
    	if ($input['type']=="amphures") {
    		$amphures = Amphures::where('province_id', $input['province_id'])->orderBy('name_th')->get(['id','name_th'])->toArray();
    		$amphure_id = $amphures[0]['id'];
    		foreach($amphures as $amphure){
    			$str .= "<option value=\"".$amphure['id']."\"".(($amphure_id==$amphure['id'])? " selected":"").">".trim($amphure['name_th'])."</option>";
    		}
    	} elseif ($input['type']=="districts") {
    		$districts = Districts::where('amphure_id', $input['amphure_id'])->orderBy('name_th')->get(['id', 'name_th', 'zip_code'])->toArray();
    		if(!empty($districts)){
	    		$district_id = $districts[0]['id'];
	    		foreach($districts as $district){
	    			$str .= "<option value=\"".$district['id']."\"".(($district_id==$district['id'])? " selected":"")." data-zipcode=\"".trim($district['zip_code'])."\">".trim($district['name_th'])."</option>";
	    		}
    		}
    	}
    	return $str;
    }

    function ajaxUpload(Request $request) {
        $input = $request->all();
        // print_r($input);
        if(!empty($input['files'])){
            foreach($input['files'] as $file){
                $allowedMimeTypes = ['image/jpeg','image/gif','image/png','image/bmp','image/svg+xml'];
                $contentType = mime_content_type($file->getRealPath());
                if(! in_array($contentType, $allowedMimeTypes) ){
                    return response()->json([
                        'status' => 'failure',
                        'message' => 'Input file is not an image',
                        'img' => null
                    ]);
                }
            }
            $res_files = [];
            $max_width = 1000;
            foreach($input['files'] as $key=>$file){
                $file_path = "assets/images/uploads/".date("YmdHis")."-".$this->randomStr().".".$file->getClientOriginalExtension();
                $image = Image::make($file->getRealPath());
                if($image->width()>$max_width){
                    $image->resize($max_width, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                $image->save($file_path);
                $res_files[] = $file_path;
            }
            return response()->json([
                'status' => 'success',
                'message' => 'The image has been saved',
                'img' => $res_files
            ]);
        } else {
            return response()->json([
                'status' => 'failure',
                'message' => 'Input file is not an image',
                'img' => null
            ]);
        }
    }

    function ajaxUploadFile(Request $request) {
        $input = $request->all();
        // print_r($input);
        if(!empty($input['file'])){
            $extension = $input['file']->getClientOriginalExtension();
            $allowed_extension = ['jpg','jpeg','png','gif','tif','tiff','pdf','doc','docx','xls','xlsx','rtf','odt','ods','txt'];
            if(! in_array($extension, $allowed_extension) ){
                return response()->json([
                    'status' => 'failure',
                    'message' => 'Input file type is not allowed',
                    'file' => null
                ]);
            }
            $max_width = 1000;
            $destinationPath = "assets/files";
            $fileName = date("YmdHis")."-".$this->randomStr().".".$input['file']->getClientOriginalExtension();
            $input['file']->move($destinationPath, $fileName);
            $res_files = $destinationPath."/".$fileName;
            return response()->json([
                'status' => 'success',
                'message' => 'The file has been saved',
                'file' => $res_files,
                'file_type' => $input['file_type']
            ]);
        } else {
            return response()->json([
                'status' => 'failure',
                'message' => 'Input file type is not allowed',
                'file' => null
            ]);
        }
    }

    function ajaxUploadDel(Request $request){
        $input = $request->all();
        if(File::exists($input['del'])) {
            File::delete($input['del']);
            $res = ['status'=>'success', 'message'=>'File "'.$input['del'].'" has been deleted'];
        } else {
            $res = ['status'=>'failure', 'message'=>'Not found this file "'.$input['del'].'"'];
        }
        return response()->json($res);
    }

    function randomStr($length=4) {
        $str = "";
        $characters = array_merge(range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
}
