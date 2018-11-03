<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //后台首页
    public function index(){
        return view("admin.index.index");
    }
    public function home(){
        return view("admin.index.home");
    }
}
