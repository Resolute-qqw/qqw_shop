<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function guestbook(){
        return view("admin.news.guestbook");
    }
    public function feedback(){
        return view("admin.news.feedback");
    }
}
