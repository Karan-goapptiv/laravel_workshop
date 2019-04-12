<?php

// user routes
use Illuminate\Support\Facades\Route;

Route::prefix('post')->group(function () {
    Route::get('/index', 'Post\PostApiController@index');
    Route::post('/create', 'Post\PostApiController@createPost');
});

Route::prefix('comment')->group(function () {
    Route::get('/index', 'Comment\CommentApiController@index');
    Route::post('/create', 'Comment\CommentApiController@createComment');
});