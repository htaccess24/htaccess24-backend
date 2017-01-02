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
use Laravel\Passport\HasApiTokens;

class News extends Authenticatable {
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

    public function getLastFiveNews () {
        $getNews = News::orderBy('created_at', 'desc')->take(5)->get();

        //return
        return Response::json($getNews, 200);
    }


}