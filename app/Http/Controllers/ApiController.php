<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index($id, Category $category) {
        return $category->getCategoryNews($id);
    }

    public function getArticleInformation($slug, News $article) {
        return $article->getArticleInformation($slug);
    }
}
