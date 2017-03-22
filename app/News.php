<?php
/**
 * Created by PhpStorm.
 * User: jabladt
 * Date: 02.01.2017
 * Time: 11:04
 */

namespace app;

use Response;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class News extends Authenticatable {
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    protected $table = 'news';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array categories
     */
    protected $hidden = [];

    public $topNewsOnFront = [];
    public $topNewsWithImages = [];
    public $topNewsWithoutImages = [];

    private function setTopNewsFront ($topNews) {
        $this->topNewsOnFront[] = $topNews;
    }

    private function getTopNewsFront () {
        return $this->topNewsOnFront;
    }
    private function setTopNewsWithImages ($topNews) {
        $this->topNewsWithImages[] = $topNews;
    }

    private function getTopNewsWithImages () {
        return $this->topNewsWithImages;
    }

    private function setTopNewsWithoutImages ($topNews) {
        $this->topNewsWithoutImages[] = $topNews;
    }

    private function getTopNewsWithoutImages () {
        return $this->topNewsWithoutImages;
    }

    public function getLastFiveNews ($type) {
        $getNews = News::orderBy('created_at', 'desc')->take(6)->get();

        foreach($getNews as $i => $news) {
            $getNews->map(function($getNews, $i) {
                ($i <= 2) ? $getNews['withImage'] = 1 : $getNews['withImage'] = 0;

                $getNews['position'] = $i + 1;
                return $getNews;
            });

            if ($news->withImage == 1 && $news->position == '1') {
                $this->setTopNewsFront($news);
            } elseif ($news->withImage == 1 && $news->position > '1') {
                $this->setTopNewsWithImages($news);
            } else {
                $this->setTopNewsWithoutImages($news);
            }
        }

        if ($type == 'front') {
            return Response::json($this->getTopNewsFront(), 200);
        } elseif ($type == 'images') {
            return Response::json($this->getTopNewsWithImages(), 200);
        } elseif ($type == 'imageless') {
            return Response::json($this->getTopNewsWithoutImages(), 200);
        }

        return false;
    }

    public function getArticleInformation($slug) {
        $getArticleInformation = News::where('slug', '=', $slug)->limit(1)->get();

        return Response::json($getArticleInformation, 200);
    }
}