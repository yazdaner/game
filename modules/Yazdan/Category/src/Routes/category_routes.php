<?php

use Yazdan\Category\App\Http\Controllers\CategoryController;

Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {

    Route::resource('categories', CategoryController::class)->except([
        'create', 'show'
    ]);
});
