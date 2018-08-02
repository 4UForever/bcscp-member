<?php

namespace App\Http\Controllers\Signup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//custom
use File;
use Intervention\Image\ImageManagerStatic as Image;
use App\Provinces;
use App\Amphures;
use App\Districts;

class SignupController extends Controller
{
    function index() {
    	return view('signup/priviledge', []);
    }

    function create() {
    	$provinces = Provinces::orderBy('name_th')->get(['id', 'name_th'])->toArray();
    	$province_id = $provinces[0]['id'];
    	$amphures = Amphures::where('province_id', $province_id)->orderBy('name_th')->get(['id','name_th'])->toArray();
    	$amphure_id = $amphures[0]['id'];
    	$districts = Districts::where('amphure_id', $amphure_id)->orderBy('name_th')->get(['id', 'name_th', 'zip_code'])->toArray();
    	$district_id = $districts[0]['id'];
    	$zip_code = $districts[0]['zip_code'];
    	return view('signup/fillform', compact('provinces', 'province_id', 'amphures', 'amphure_id', 'districts', 'district_id', 'zip_code'));
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
