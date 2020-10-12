<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class SettingController extends Controller
{
    public function create(){

    	$data['setting'] = Setting::where('id',1)->first();
    	return view('pages.setting.create',$data);

    }

    public function store(Request $request){

    	$setting = Setting::where('id',1)->first();
    	if (!isset($setting)) {
    		$setting = new Setting();
    	}

    	$image = $request->file('image');

    	if ($image) {
    		
    		$setting_info = DB::table('settings')->where('id',1)->first();
    		$old_pic = $setting_info->image;
    		if (file_exists($old_pic)) {
    			unlink($old_pic);
    		}
    		$unique_str = Str::random(10);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_name = $unique_str.'.'.$ext;
            $upload_path = 'assets/backend/images/setting/';
            $image_url = $upload_path.$image_name;
            $image->move($upload_path,$image_name);
    		$setting->image = $image_url;

    	}


    	
    	$setting->name = $request->name;
    	$setting->email  = $request->email;
    	$setting->phone = $request->phone;
    	$setting->address = $request->address;
    	$setting->save();

    	return redirect()->back()->with('success','Setting Updated Successfully');

    }
}
