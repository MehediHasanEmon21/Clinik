<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    public function test(){
    	return $this->belongsTo(Service::class,'test_id','id');
    }

    public function doctor(){
    	return $this->belongsTo(User::class,'doctor_id','id');
    }

    protected $with = ['test','doctor'];
}
