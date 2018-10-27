<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function products_list(){
        return view("products.products_list");
    }
    public function brand_manage(){
        return view("products.brand_manage");
    }
    public function category_manage(){
        return view("products.category_manage");
    }
    public function category_add(){
        return view("products.products_category_add");
    }
    public function add(){
        return view("products.products_add");
    }
}
