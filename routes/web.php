<?php

use Carbon\Carbon;
use Yazdan\User\App\Models\User;
use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Yazdan\Cart\App\Http\Controllers\CartController;
use Yazdan\RolePermissions\Repositories\RoleRepository;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/ee', function () {
    $filename = 'file:///D:/programming/backend-project/game/public/storage/64f060dc6b0be.jpg';
    $percent = 0.9;
    header('Content-Type: image/jpeg');

    // Get new sizes
    list($width, $height) = getimagesize($filename);
    $newwidth = $width * $percent;
    $newheight = $height * $percent;


    $thumb = imagecreatetruecolor($newwidth, $newheight);
    $source = imagecreatefromjpeg($filename);

    imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    dd(imagejpeg($thumb));
});

Route::get('/aa', function () {


    $filename = 'file:///C:/Users/yazdan/Desktop/GTA-6_SUpplied_1800x1000.jpg';
    // $filename = 'file:///C:/Users/Public/Pictures/Sample%20Pictures/logo.png';
    $myWidth = 900;
    header('Content-Type: image/jpeg');

    // Get new sizes
    list($width, $height) = getimagesize($filename);
    $newwidth = $myWidth;
    $newheight = ($height * $myWidth) / $width;


    $thumb = imagecreatetruecolor($newwidth, $newheight);
    $source = imagecreatefromjpeg($filename);

    imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    dd(imagejpeg($thumb));
});


Route::get('/xx', function () {

    $timestamp = 1695579995000 / 1000;
    dd(date("Y-m-d h:m:s", $timestamp));

});
Route::get('/u', function () {
    $user = User::factory()->create();
    auth()->loginUsingId($user->id);
    return back();
});
Route::get('/logout', function () {
    auth()->logout();
    return back();
});
Route::get('/ad', function () {
    $user = User::factory()->create();
    $user->assignRole(RoleRepository::ROLE_SUPER_ADMIN);
    auth()->loginUsingId($user->id);
    return back();
});

Route::get('/buy', function () {
    resolve(CartController::class)->buy();
});

