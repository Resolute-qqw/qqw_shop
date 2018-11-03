<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function advertising_manage(){
        return view('admin.picture.advertising');
    }
    public function pictureCategory_manage(){
        return view('admin.picture.picture_category_manage');
    }
    
}
