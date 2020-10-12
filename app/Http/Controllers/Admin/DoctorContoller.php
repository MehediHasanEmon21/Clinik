<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\DoctorDetail;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DoctorContoller extends Controller
{
      public function all_doctor(){

    	$doctors = User::where('userType','doctor')->orderBy('id','DESC')->get();
    	return view('pages.doctor.list',compact('doctors'));

    }

    public function create(){
    	return view('pages.doctor.create');
    }

    public function store(Request $request){

    	$request->validate([
    		'email' => 'unique:users'
    	]);

        $user = new User();

        $name_list =  explode(" ", $request->name);
        $name_list = array_map('strtolower', $name_list);
        $user_slug = implode("-", $name_list);
        $similar_slug = DB::table('users')->where('slug', 'like', $user_slug.'%')->get();
        if(count($similar_slug) > 0){
            $slug = $user_slug.'-'.Str::random(20);
        }
        else{
            $slug = $user_slug;
        }

        $image = $request->file('image');

        if ($image) {
            $unique_str = Str::random(10);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_name = $unique_str.'.'.$ext;
            $upload_path = 'assets/backend/images/doctor/';
            $image_url = $upload_path.$image_name;
            $image->move($upload_path,$image_name);
            $user->image = $image_url;

        }

    	
    	$user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
    	$user->password = bcrypt($request->password);
        $user->dob = date('Y-m-d',strtotime($request->dob));
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->userType = 'doctor';
        $user->role = 'user';
        $user->verify_account = 1;
        $user->status = 1;
        $user->slug = preg_replace('/[^a-zA-Z0-9]+/', '-', $slug);
    	$user->save();


        $doctor_detail = new DoctorDetail();
        $doctor_detail->user_id = $user->id;
        $doctor_detail->designation = $request->designation;
        $doctor_detail->degree = $request->degree;
        $doctor_detail->department = $request->department;
        $doctor_detail->experience = $request->experience;
        $doctor_detail->service_place = $request->service_place;
        $doctor_detail->blood_group = $request->blood_group;
        $doctor_detail->about = $request->about;
        $doctor_detail->specialist = $request->specialist;
        $doctor_detail->save();


    	return redirect()->route('doctor.view')->with('success','Doctor Added Successfully');
 


    }

    public function delete($id){
    	$user = User::find($id);
    	$user->delete();
    	return redirect()->back()->with('success','User Deleted Successfully');
    }
}
