<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transaction_info(){
        return view('transaction.transaction_info');
    }
    public function order_chart(){
        return view('transaction.order_chart');
    }
    public function order_manage(){
        return view('transaction.order_manage');
    }
    public function transaction_amounts(){
        return view('transaction.transaction_amounts');
    }
    public function order_handling(){
        return view('transaction.order_handling');
    }
    public function refund_manage(){
        return view('transaction.refund_manage');
    }

}
