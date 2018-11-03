<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    //系统设置
    public function system_setup(){
        return view("admin.system.system_setup");
    }
    public function system_section(){
        return view("admin.system.system_section");
    }
    public function system_logs(){
        return view("admin.system.system_logs");
    }

}
