<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function guestbook(){
        return view("news.guestbook");
    }
    public function feedback(){
        return view("news.feedback");
    }
}
