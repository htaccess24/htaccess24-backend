<?php

namespace app;

use Response;
use App\PostsToCategory;
use App\News;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Category extends Authenticatable {
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array categories
     */
    protected $hidden = [];

    public $categories = [];
    public $categoryNews = [];

    private function setCategories ($categories) {
        $this->$categories[] = $categories;
    }

    private function getCategories () {
        return $this->categories;
    }

    public function getAllCategories () {
        $getCategories = Category::orderBy('created_at', 'desc')->get();

        return Response::json($getCategories, 200);
    }

    public function getFrontpageCategories () {
        $getCategories = Category::where('on_homepage', '=', '1')->get();

        foreach($getCategories as $i => $category) {
            $category->news = $this->getCategoryNews($category->id);
        }

        return Response::json($getCategories, 200);
    }

    public function getCategoryNews ($categoryId) {
        $currentDate = Carbon::now();
        $currentDate->subMonths(3);

        $setNewsIds = PostsToCategory::where('category_id', '=', $categoryId)
            ->where('created_at', '>=', $currentDate)
            ->inRandomOrder()
            ->limit(2)
            ->get();

        $categoryNews = [];

        foreach ($setNewsIds as $news) {
            $categoryNews[] = News::where('id', '=', $news->news_id)->get();
        }

        return $categoryNews;
    }
}
