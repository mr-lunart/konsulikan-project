<?php

use App\Http\Controllers\Akun;
use App\Http\Controllers\Chat;
use App\Http\Controllers\Front;
use App\Http\Controllers\IoChat;
use App\Http\Controllers\Login;
use App\Http\Controllers\HalamanKonsultan;
use App\Http\Controllers\Homepage;
use App\Http\Controllers\Profil;
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

Route::get('/login', [Front::class,'client']);
Route::get('/', function(){
    return redirect('/login');
});
Route::get('/login/{status}', [Front::class,'status']) -> name('login.statue');
Route::post('/login', [Login::class,'login']) -> name('login.auth');
// Route::match(['get', 'post'],'konsultan',[Front::class, 'konsultan']);
Route::get('/homepage', [Homepage::class, 'home']) -> name('home');

Route::get('homepage/profil', [Homepage::class, 'profil']) -> name('home.profil');
Route::get('homepage/profil/update', [Profil::class, 'update']) -> name('profil.update');
Route::post('homepage/profil/update', [Profil::class, 'profilUpdate']) -> name('profil.save');

Route::get('dashboard/konsultan', [HalamanKonsultan::class, 'listKonsul']);

Route::get('homepage/logout', [Login::class, 'logout']) -> name('home.logout');

Route::get('daftar', [Profil::class, 'daftar']);
Route::post('daftar', [Profil::class, 'signup']);

Route::post('push', [IoChat::class, 'push']);

Route::get('poll', [IoChat::class, 'poll']);

