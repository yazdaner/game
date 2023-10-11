<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Faq\App\Http\Controllers\FaqController;

Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {

    Route::resource('faqs', FaqController::class)->except([
        'create', 'show'
    ]);
});

Route::get('/faq', [FaqController::class, 'show'])->name('faq');
