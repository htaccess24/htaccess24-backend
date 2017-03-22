<?php

namespace App\Http\Controllers;

use Response;
use App\Article;
use App\Category;
use App\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index($id, Category $category) {
        return $category->getCategoryNews($id);
    }

    public function getArticleInformation($slug, News $article) {
        return $article->getArticleInformation($slug);
    }

    public function addArticleRating($articleId, $ratingValue, $guId) {
        $request_body = file_get_contents('php://input');
        $data = json_decode($request_body, true);

        $validateRatingArticle = DB::table('news')
            ->select('slug')
            ->where('id', '=', $articleId)
            ->count();

        $validateRatingValue = (is_numeric($data['ratingValue']) && $data['ratingValue'] <= 5 && $data['ratingValue'] > 0) ? true : false;

        $checkArticleRatingExists = DB::table('news_rating')
            ->select('guid')
            ->where('news_id', '=', $articleId)
            ->where('guid', '=', $guId)
            ->count();

        if ($validateRatingArticle >= 1 && $validateRatingValue && !$checkArticleRatingExists) {
            DB::table('news_rating')->insert([
                'news_id' => $articleId,
                'rating_value' => $ratingValue,
                'guid' => $guId
            ]);
        } else if ($validateRatingArticle >= 1 && $validateRatingValue && $checkArticleRatingExists) {
            DB::table('news_rating')
                ->where('guid', '=', $guId)
                ->where('news_id', '=', $articleId)
                ->update(['rating_value' => $ratingValue]);
        }
    }
}
