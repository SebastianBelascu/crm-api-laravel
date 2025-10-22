<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum', \App\Http\Middleware\HasPermissionMiddleware::class);

Route::restifyAuth();
