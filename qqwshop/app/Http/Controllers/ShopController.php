<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop_list(){
        return view("shops.shop_list");
    }
    public function shop_audit(){
        return view("shops.audit");
    }
}
