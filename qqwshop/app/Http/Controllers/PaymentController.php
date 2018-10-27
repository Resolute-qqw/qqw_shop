<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function account_manage(){
        return view("payment.account_manage");
    }
    public function payment_method(){
        return view("payment.payment_method");
    }
    public function payment_configure(){
        return view("payment.payment_configure");
    }
    public function account_information(){
        return view("payment.account_information");
    }
    
}
