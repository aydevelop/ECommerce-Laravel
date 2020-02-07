<?php

use Illuminate\Http\Request;

Route::apiResource('currency', 'ApiСurrencyController');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
