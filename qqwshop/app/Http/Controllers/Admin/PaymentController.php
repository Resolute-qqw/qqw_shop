<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function account_manage(){
        return view("admin.payment.account_manage");
    }
    public function payment_method(){
        return view("admin.payment.payment_method");
    }
    public function payment_configure(){
        return view("admin.payment.payment_configure");
    }
    public function account_information(){
        return view("admin.payment.account_information");
    }
    
}
