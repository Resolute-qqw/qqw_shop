<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // 文章管理
    public function article_list(){
        return view("article.article_list");
    }
    public function article_sort(){
        return view("article.article_sort");
    }
}
