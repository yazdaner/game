<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Comment\App\Http\Controllers\CommentController;

Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function(){
    Route::resource('comments', CommentController::class)->except([
        'index'
    ]);

    providerGetRoute('/comments',CommentController::class,'index','comments.index');

    Route::patch('comments/{comment}/accept',[CommentController::class,'accept'])->name('comments.accept');

    Route::patch('comments/{comment}/reject',[CommentController::class,'reject'])->name('comments.reject');
});


