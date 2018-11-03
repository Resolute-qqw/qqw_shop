<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transaction_info(){
        return view('admin.transaction.transaction_info');
    }
    public function order_chart(){
        return view('admin.transaction.order_chart');
    }
    public function order_manage(){
        return view('admin.transaction.order_manage');
    }
    public function transaction_amounts(){
        return view('admin.transaction.transaction_amounts');
    }
    public function order_handling(){
        return view('admin.transaction.order_handling');
    }
    public function refund_manage(){
        return view('admin.transaction.refund_manage');
    }

}
