<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function advertising_manage(){
        return view('picture.advertising');
    }
    public function pictureCategory_manage(){
        return view('picture.picture_category_manage');
    }
    
}
