<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Chat;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Front;
use App\Http\Controllers\ChatIO;
use App\Http\Controllers\Login;
use App\Http\Controllers\Homepage;
use App\Http\Controllers\Konsultasi;
use App\Http\Controllers\Profil;



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

Route::get('/login', [Front::class,'client']) -> name('login');
Route::get('/', function(){ return redirect('/login'); });
Route::post('/login', [Login::class,'login']) -> name('login.auth');
Route::get('/login/{status}', [Front::class,'status']) -> name('login.statue');

Route::post('/konsultan',[Login::class, 'dashboardLogin']) -> name('login.dashboard');
Route::get('/konsultan/{status}',[Front::class, 'statuskonsultan']) -> name('dashboard.statue');
Route::get('/konsultan',[Front::class, 'konsultan']) -> name('dashboard');

Route::get('/homepage', [Homepage::class, 'home']) -> name('home');
Route::get('homepage/logout', [Login::class, 'logout']) -> name('home.logout');

Route::get('dashboard/home',[Dashboard::class, 'home']) -> name('dashboard.home');
Route::get('dashboard/client',[Dashboard::class, 'clientList']) -> name('dashboard.client');
Route::get('dashboard/client/chat',[Chat::class, 'chat']) -> name('dashboard.chat');
Route::get('dashboard/logout',[Login::class, 'dashboardLogout']) -> name('dashboard.logout');

Route::get('homepage/profil', [Homepage::class, 'profil']) -> name('home.profil');
Route::get('homepage/profil/update', [Profil::class, 'update']) -> name('profil.update');
Route::post('homepage/profil/update', [Profil::class, 'profilUpdate']) -> name('profil.save');


Route::get('homepage/konsultan', [Konsultasi::class, 'listKonsul']) -> name('home.konsultan');
Route::post('homepage/konsultan/pemesanan', [Konsultasi::class, 'setkonsultan']) -> name('home.pesanan');
Route::post('homepage/konsultan/token', [Konsultasi::class, 'getToken']) -> name('home.token');
Route::any('homepage/konsultan/payment/full', [Konsultasi::class, 'midtransPay']) -> name('home.payment');



Route::get('daftar', [Profil::class, 'daftar']);
Route::post('daftar', [Profil::class, 'signup']);

Route::post('dashboard/client/push', [ChatIO::class, 'push']);
Route::get('dashboard/client/poll', [ChatIO::class, 'poll']);

