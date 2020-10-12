<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PatientController extends Controller
{
    public function all_patient(){

    	$patients = User::where('userType','patient')->orderBy('id','DESC')->get();
    	return view('pages.patient.list',compact('patients'));

    }

    public function create(){
    	return view('pages.patient.create');
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

        $code = rand(0000,9999);
    	
    	$user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
    	$user->password = bcrypt($code);
        $user->code = $code;
        $user->dob = date('Y-m-d',strtotime($request->dob));
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->userType = 'patient';
        $user->role = 'user';
        $user->age = $request->age;
        $user->verify_account = 1;
        $user->status = 1;
        $user->slug = preg_replace('/[^a-zA-Z0-9]+/', '-', $slug);
    	$user->save();


    	return redirect()->route('patient.view')->with('success','Patient Added Successfully');
 


    }

    public function delete($id){
    	$user = User::find($id);
    	$user->delete();
    	return redirect()->back()->with('success','User Deleted Successfully');
    }
}
