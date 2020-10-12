<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Invoice;
use App\Model\InvoiceDetail;
use App\Model\Payment;
use App\Model\PaymentDetail;
use App\Model\Service;
use App\Model\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PDF;

class InvoiceController extends Controller
{
    public function all_invoice(){

    	$data['invoices'] = Invoice::orderBy('id','DESC')->get();
    	return view('pages.invoice.list',$data);

    }

    public function create(){



    	$data['doctors'] = User::where('userType','doctor')->orderBy('name','asc')->get();
        $data['patients'] = User::where('userType','patient')->orderBy('name','asc')->get();
        $data['sevices'] = Service::orderBy('name','asc')->get();
        $invoice_data = Invoice::orderBy('id','DESC')->first();



        if ($invoice_data == null) {
            $firstRegis = 0;
            $data['invoice_no'] = $firstRegis + 1;
        }else{
            $invoice_no = Invoice::orderBy('id','DESC')->first()->invoice_no;
            $data['invoice_no'] = $invoice_no + 1;
        }
    	return view('pages.invoice.create',$data);
    }

    public function store(Request $request){

    

        if ($request->service_id == null) {
            return redirect()->back()->with('error','please insert Test Name first !!');
        }elseif ($request->paid_amount > $request->estimated_amount) {
            return redirect()->back()->with('error','paid amount must be equal or less than total amount !!');
        }else{

            $invoice = new Invoice();
            $invoice->invoice_no = $request->invoice_no;
            $invoice->delivery_time = $request->delivery_time;
            $invoice->date = date('Y-m-d',strtotime($request->date));
            $invoice->delivery_date = date('Y-m-d',strtotime($request->delivery_date));
            $invoice->status = 1;

            DB::transaction(function() use ($request,$invoice){

                if ($invoice->save()) {

                    $service_count = count($request->service_id);
                    for ($i=0; $i < $service_count; $i++) { 
                        $in_detail = new InvoiceDetail();
                        $in_detail->invoice_id  = $invoice->id;
                        $in_detail->date  = date('Y-m-d',strtotime($request->date));
                        $in_detail->doctor_id  = $request->doctor_id[$i];
                        $in_detail->test_id  = $request->service_id[$i];
                        $in_detail->selling_qty  = $request->sellling_qty[$i];
                        $in_detail->unit_price  = $request->unit_price[$i];
                        $in_detail->selling_price  = $request->selling_price[$i];
                        $in_detail->discount  = $request->discount_price_item[$i];

                        if ($request->discount_price_item[$i] == null || $request->discount_price_item[$i] == '0') {
                            $in_detail->discount_price_type  = null;

                        }else{
                            if ($request->discount_price_type[$i] == 'percent') {
                           
                               $i_discount = (float)($request->unit_price[$i]*($request->discount_price_item[$i]/100));
                               $in_detail->discount_amount  = $i_discount;
                               $in_detail->discount_price_type  = $request->discount_price_type[$i];

                            }else{
                                $in_detail->discount_amount  = $request->discount_price_item[$i];
                                $in_detail->discount_price_type  = $request->discount_price_type[$i];
                            }
                            
                        }

                        $in_detail->save();

                        
                    }

                    $payment = new Payment();
                    $payment_detail = new PaymentDetail();

                    $payment->invoice_id = $invoice->id;
                    if ($request->patient_id == '0') {

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

                        $code = rand(0000,9999);
        
                        $user->name = $request->name;
                        $user->email = 'patient'.$request->invoice_no.'@gmail.com';
                        $user->mobile = $request->mobile;
                        $user->password = bcrypt($code);
                        $user->code = $code;
                        $user->address = $request->address;
                        $user->userType = 'patient';
                        $user->role = 'user';
                        $user->verify_account = 1;
                        $user->status = 1;
                        $user->slug = preg_replace('/[^a-zA-Z0-9]+/', '-', $slug);
                        $user->save();
                        $payment->patient_id = $user->id;

                    }else{
                        $payment->patient_id = $request->patient_id;
                    }


                    $without_special_discount = 0;
                    $without_special_tax_total = 0;
                    $invoice_details = InvoiceDetail::where('invoice_id',$invoice->id)->get();
                    foreach ($invoice_details as $key => $in_d) {

                        $without_special_discount += $in_d->discount_amount;
                        $without_special_tax_total += $in_d->selling_price;
                    }
                    if ($without_special_discount != 0) {
                       $payment->discount_amount = $without_special_discount;
                    }
                    
                    $payment->total_after_discount_amount = $without_special_tax_total;

                    if($request->special_discount == '0' || $request->special_discount == null){

                        $payment->special_discount_type = null;
                        $payment->total_after_special_discount = $without_special_tax_total;
                        

                    }else{

                        $payment->special_discount = $request->special_discount;
                        $payment->special_discount_type = $request->special_discount_type;

                        if ($request->special_discount_type == 'percent') {
                               
                           $s_discount = (float)($without_special_tax_total*($request->special_discount/100));
                           $payment->special_discount_amount  = $s_discount;
                           $payment->total_after_special_discount = $without_special_tax_total-$s_discount;

                        }else{
                            $payment->special_discount_amount  = $request->special_discount;
                            $payment->total_after_special_discount = $without_special_tax_total-$request->special_discount;
                        }
                        


                        
                    }


                    $payment->tax = $request->tax;
                    $tax_amount = (float)($without_special_tax_total*($request->tax/100));
                    $payment->tax_amount  = $tax_amount;
                    $payment->total_after_tax = $without_special_tax_total+$tax_amount;

                    
                    $payment->total_amount = $request->estimated_amount;


                    if ($request->paid_amount == $request->estimated_amount) {
                        $payment->paid_amount = $request->estimated_amount;
                        $payment_detail->current_paid_amount = $request->estimated_amount;
                        $payment->due_amount = 0;
                    }elseif($request->paid_amount == 0){
                        $payment->paid_amount = 0;
                        $payment_detail->current_paid_amount = 0;
                        $payment->due_amount = $request->estimated_amount;
                    }elseif($request->paid_amount < $request->estimated_amount){

                        $payment->paid_amount = $request->paid_amount;
                        $payment_detail->current_paid_amount = $request->paid_amount;
                        $payment->due_amount = $request->estimated_amount - $request->paid_amount;
                    }

                    $payment_detail->invoice_id = $invoice->id;
                    $payment_detail->date = date('Y-m-d',strtotime($request->date));
                    $payment->save();
                    $payment_detail->save();

                    
            
                }

            });
        }

        return redirect()->route('invoice.details',$invoice->id)->with('success', 'Invoice done successfully');
 


    }

    public function delete($id){
    	$user = User::find($id);
    	$user->delete();
    	return redirect()->back()->with('success','User Deleted Successfully');
    }

    public function details($id){

        $data['setting'] = Setting::where('id',1)->first();

        $data['type'] = false;
        $data['invoice'] = Invoice::where('id',$id)->first();
        foreach ($data['invoice']->invoice_details as $key => $invoice_detail) {
            $type = $invoice_detail->discount_price_type;
            if ($type == 'percent') {
                $data['type'] = true;
                break;
            }else{
                $data['type'] = false;
            }
        }
        // return response()->json($data['type']);

        return view('pages.invoice.detail',$data);

    }

    public function invoicePDF($id){

        $data['setting'] = Setting::where('id',1)->first();
        $data['type'] = false;
        $data['invoice'] = Invoice::where('id',$id)->first();
        foreach ($data['invoice']->invoice_details as $key => $invoice_detail) {
            $type = $invoice_detail->discount_price_type;
            if ($type == 'percent') {
                $data['type'] = true;
                break;
            }else{
                $data['type'] = false;
            }
        }
        $pdf = PDF::loadView('pages.invoice.invoice_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');

    }
}
