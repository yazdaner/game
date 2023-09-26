<?php

use Yazdan\Blog\App\Http\Controllers\BlogController;

Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {

    Route::resource('blogs', BlogController::class)->except([
        'create', 'show'
    ]);
});


// todo
Route::get('/blogs/{blog}', [LoginController::class, 'showLoginForm'])->name('blogs.show');
