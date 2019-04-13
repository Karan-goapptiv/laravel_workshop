<?php

// user routes
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function() {
    Route::post('', 'Auth\AuthApiController@register');
    Route::post('login', 'Auth\AuthApiController@login');
});

Route::prefix('posts')->group(function () {
    Route::get('', 'Post\PostApiController@index');
    Route::get('byUser', 'Post\PostApiController@byUser');
    Route::post('', 'Post\PostApiController@create');
});

Route::prefix('comments')->group(function () {
    Route::get('', 'Comment\CommentApiController@index');
    Route::post('', 'Comment\CommentApiController@create');
    Route::get('forPost/{post_id}', 'Comment\CommentApiController@forPost');
});