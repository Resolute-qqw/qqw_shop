<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function member_list(){
        return view("admin.member.member_list");
    }
    public function grade_manage(){
        return view("admin.member.grade_manage");
    }
    public function record_manage(){
        return view("admin.member.record_manage");
    }

}
