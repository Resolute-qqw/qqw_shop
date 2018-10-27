<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function index(){
        return view('goods.index');
    }
    public function create(){
        return view('goods.add_goods');
    }
}
