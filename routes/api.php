<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\ProfileController;

Route::apiResource('articles', ArticleController::class);

Route::get('/profile/contact', [ProfileController::class, 'contactDetails']);
Route::post('/profile/contact', [ProfileController::class, 'updateContact']);
