<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index(){
        return view("business.index");
    }
    public function home(){
        return view("business.home");
    }
    public function edit_pwd(){
        return view("business.edit_pwd");
    }
    public function edit_info(){
        return view("business.edit_info");
    }
    public function register(){
        return view("business.register");
    }
    public function login(){
        return view("business.login");
    }
    public function sampling(){
        return view("business.sampling");
    }
    public function cooperation(){
        return view("business.cooperation");
    }
}
