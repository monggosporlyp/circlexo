<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Wave\Facades\Wave;

Wave::api();

// Posts Example API Route
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/posts', '\App\Http\Controllers\Api\ApiController@posts');
});

