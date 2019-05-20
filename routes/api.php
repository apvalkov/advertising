<?php

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

Route::group(['as' => 'v1.', 'namespace' => 'Api\v1', 'prefix' => 'v1', 'middleware' => 'auth:api'],
    function () {
        Route::resource('advertising-campaign', 'AdvertisingCampaignController')->except(['edit', 'create']);
    });
