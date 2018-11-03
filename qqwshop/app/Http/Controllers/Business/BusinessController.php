<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BusinessRequest;
use App\Http\Requests\LoginRequest;

use App\Models\Business\Business;

class BusinessController extends Controller
{
    public function index(){
        return view("business.business.index");
    }
    public function home(){
        return view("business.business.home");
    }
    public function edit_pwd(){
        return view("business.business.edit_pwd");
    }
    public function edit_info(){
        return view("business.business.edit_info");
    }
    public function register(){
        return view("business.business.register");
    }
    public function login(){
        return view("business.business.login");
    }
    public function sampling(){
        return view("business.business.sampling");
    }
    public function cooperation(){
        return view("business.business.cooperation");
    }
    public function dologin(LoginRequest $req){
        $status = Business::login($req->all());
        if($status){
            return redirect()->route('business.index')->with('tips','登录成功哒!');
        }else{
            return redirect()->route('business.login')->with('tips','用户名或密码错误!');
        }
    }
    public function doregister(BusinessRequest $req){
        Business::add($req->all());
        return redirect()->route('business.login')->with('tips','注册成功哒!');
    }
    public function logout(Request $req){
        $req->session()->flush();
        return redirect()->route('business.login')->with('tips','注销成功!');
    }
}
