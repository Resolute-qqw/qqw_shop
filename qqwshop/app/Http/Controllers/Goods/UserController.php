<?php

namespace App\Http\Controllers\Goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\Goods\User;

class UserController extends Controller
{
    //
    public function register(){
        return view("goods.user.register");
    }
    public function login(){
        return view("goods.user.login");
    }
    public function dologin(LoginRequest $req){
        
        $status = User::login($req->all());
        if($status){
            return redirect()->route('goods.index')->with('tips','登录成功哒!');
        }else{
            return redirect()->route('user.login')->with('tips','用户名或密码错误!');
        }
    }
    public function doregister(UserRegisterRequest $req){
        User::add($req->all());
        return redirect()->route('user.login')->with('tips','注册成功哒!');
    }
    public function logout(Request $req){
        $req->session('user')->flush();
        return redirect()->route('user.login')->with('tips','注销成功!');
    }
}
