<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function invoice_details(){
    	return $this->hasMany(InvoiceDetail::class);
    }

    public function payment(){
    	return $this->hasOne(Payment::class);
    }

    public function payment_detail(){
    	return $this->hasMany(PaymentDetail::class);
    }

    protected $with = ['invoice_details','payment','payment_detail'];
}
