<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemController extends Controller
{
    //系统设置
    public function system_setup(){
        return view("system.system_setup");
    }
    public function system_section(){
        return view("system.system_section");
    }
    public function system_logs(){
        return view("system.system_logs");
    }

}
