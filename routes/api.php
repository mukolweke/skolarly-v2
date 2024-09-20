<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\TestimonialController;
use App\Http\Controllers\Auth\LoginController;

Route::apiResource('articles', ArticleController::class);

Route::get('/profile/contact', [ProfileController::class, 'contactDetails']);
Route::post('/profile/contact', [ProfileController::class, 'updateContact']);

Route::apiResource('testimonials', TestimonialController::class);

Route::post('/login', [LoginController::class, 'login']);
Route::post('/user', [LoginController::class, 'user']);
