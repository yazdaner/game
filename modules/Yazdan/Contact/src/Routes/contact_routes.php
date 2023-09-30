<?php

use Illuminate\Support\Facades\Route;
use Yazdan\Contact\App\Http\Controllers\ContactController;

Route::prefix('admin-panel')->name('admin.')->middleware([
    'auth',
    'verified'
])->group(function () {
    providerGetRoute('/contacts',ContactController::class,'index','contacts.index');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});


Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store')->middleware('throttle:5,1');


