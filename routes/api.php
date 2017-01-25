<?php

use Illuminate\Http\Request;

use App\News;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1', 'middleware' => ['auth:api', 'cors']], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/news/top', function (News $news) {
        return $news->getLastFiveNews('front');
    });

    Route::get('/news/images', function (News $news) {
        return $news->getLastFiveNews('images');
    });

    Route::get('/news', function (News $news) {
        return $news->getLastFiveNews('imageless');
    });
});