<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop_list(){
        return view("admin.shops.shop_list");
    }
    public function shop_audit(){
        return view("admin.shops.audit");
    }
}
