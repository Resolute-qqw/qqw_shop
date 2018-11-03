<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // 文章管理
    public function article_list(){
        return view("admin.article.article_list");
    }
    public function article_sort(){
        return view("admin.article.article_sort");
    }
}
