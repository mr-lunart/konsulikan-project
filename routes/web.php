<?php

use App\Http\Controllers\Akun;
use App\Http\Controllers\Chat;
use App\Http\Controllers\IoChat;
use App\Http\Controllers\Login;
use Illuminate\Support\Facades\Route;


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

Route::get('/', [Login::class, 'client']);
Route::get('/home', function () {
    return redirect('/');
});
Route::get('konsultan',[Login::class, 'konsultan']);

Route::post('dashboard', [Login::class, 'login']);
Route::get('dashboard', [Login::class, 'sessionLogin']);

Route::get('dashboard/profil', [Akun::class, 'profil']);
Route::get('dashboard/profil/update', [Akun::class, 'update']);
Route::post('dashboard/profil/update', [Akun::class, 'profilUpdate']);
Route::get('dashboard/logout', [Login::class, 'logout']);
Route::get('daftar', [Akun::class, 'daftar']);
Route::post('daftar', [Akun::class, 'signup']);
Route::post('push', [IoChat::class, 'push']);
Route::get('poll', [IoChat::class, 'poll']);

