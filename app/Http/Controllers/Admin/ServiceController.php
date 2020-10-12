<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
   public function all_service(){

    	$services = Service::orderBy('id','DESC')->get();
    	return view('pages.service.list',compact('services'));

    }

    public function create(){
    	return view('pages.service.create');
    }

    public function store(Request $request){

    	

        $service = new Service();
        $service->name = $request->name;
        $service->price = $request->price;
    	$service->save();


    	return redirect()->route('service.view')->with('success','Service Added Successfully');
 


    }

    public function delete($id){
    	$user = User::find($id);
    	$user->delete();
    	return redirect()->back()->with('success','User Deleted Successfully');
    }
}
