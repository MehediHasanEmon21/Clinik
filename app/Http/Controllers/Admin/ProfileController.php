<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\UserProfile;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function view(){

    	$user = User::find(Auth::id());
    	return view('pages.profile.show',compact('user'));

    }

    public function edit($slug){

    	$user = User::where('slug',$slug)->first();
    	return view('pages.profile.edit',compact('user'));

    }

    public function update($id, Request $request){



        $user = User::find($id);

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
        $cv = $request->file('cv');

    	if ($image) {
    		
    		$user_info = DB::table('users')->where('id',$id)->first();
    		$old_pic = $user_info->image;
    		if (file_exists($old_pic)) {
    			unlink($old_pic);
    		}
    		$unique_str = Str::random(10);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_name = $unique_str.'.'.$ext;
            $upload_path = 'assets/backend/images/profile/';
            $image_url = $upload_path.$image_name;
            $image->move($upload_path,$image_name);
    		$user->image = $image_url;

    	}


    	
    	$user->name = $request->name;
    	$user->email  = $request->email ;
    	$user->mobile = $request->mobile;
    	$user->gender = $request->gender;
    	$user->address = $request->address;
       

    	$user->save();

        return redirect()->route('profile.view')->with('success','Profile Updated Successfully');

    }

    public function changePasswordForm(){

        return view('pages.profile.change_password');

    }

    public function PasswordStore(Request $request){


        $new_password = $request->new_password;
        
        $user = Auth::user();
        $user->password = Hash::make($new_password);
        $user->save();
        return redirect()->route('profile.view')->with('success','Password Updated Successfully');


    }

}
