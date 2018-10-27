<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function member_list(){
        return view("member.member_list");
    }
    public function grade_manage(){
        return view("member.grade_manage");
    }
    public function record_manage(){
        return view("member.record_manage");
    }

}
