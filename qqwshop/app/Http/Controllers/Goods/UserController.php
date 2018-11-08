<?php

namespace App\Http\Controllers\Goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function register(){
        return view("business.business.register");
    }
    public function login(){
        return view("business.business.login");
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
