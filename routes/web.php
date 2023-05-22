<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterKlien;
use App\Http\Controllers\HalUtamaKlien;
use App\Http\Controllers\HalUtamaKonsultan;
use App\Http\Controllers\LoginKlien;
use App\Http\Controllers\LoginKonsultan;
use App\Http\Controllers\ProfilKlien;
use App\Http\Controllers\ProfilKonsultan;
use App\Http\Controllers\Klien;
use App\Http\Controllers\PanduanPakan;
use App\Http\Controllers\EvaluasiPanen;
use App\Http\Controllers\HalKonsultasi;
use App\Http\Controllers\DetailKonsultasi;
use App\Http\Controllers\Riwayat;

// use App\Http\Controllers\Chat;
// use App\Http\Controllers\Dashboard;
// use App\Http\Controllers\Front;
// use App\Http\Controllers\ChatIO;
// use App\Http\Controllers\Login;
// use App\Http\Controllers\Homepage;
// use App\Http\Controllers\Konsultasi;
// use App\Http\Controllers\Profil;
// use App\Http\Controllers\Sesi;

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
//Fixed
Route::get('/', function(){ return redirect('/client'); }) -> name('root');
Route::get('/client', [LoginKlien::class,'clientForm']) -> name('login');
Route::post('/login', [LoginKlien::class,'login']) -> name('login.auth');
//Fixed
Route::get('/homepage', [HalUtamaKlien::class, 'home']) -> name('home');
//Fixed
Route::get('daftar', [RegisterKlien::class, 'setRegistrasiKlien']) -> name('setRegister');
Route::post('daftar', [RegisterKlien::class, 'daftar']) -> name('daftar');
//Fixed
Route::get('homepage/profil', [ProfilKlien::class, 'profilKlien']) -> name('home.profil');
Route::get('homepage/profil/update', [ProfilKlien::class, 'setPerubahanFormAkun']) -> name('profil.form');
Route::post('homepage/profil/update', [ProfilKlien::class, 'simpan']) -> name('profil.save');
Route::get('homepage/logout', [ProfilKlien::class, 'logout']) -> name('home.logout');
//fixed
Route::get('homepage/konsultasi',[HalKonsultasi::class,'setHalKonsultasi']) -> name('home.konsultasi');
Route::get('homepage/konsultasi/detail',[DetailKonsultasi::class,'detailKonsultan']) -> name('home.konsultan.detail');
//fixed
Route::get('homepage/pakan',[PanduanPakan::class,'panduanPakan']) -> name('home.pakan');
//fixed
Route::get('homepage/panen',[EvaluasiPanen::class,'evaluasiPanen']) -> name('home.panen');
Route::post('homepage/panen',[EvaluasiPanen::class,'hitungEP']) -> name('home.ep');
//fixed
Route::get('homepage/riwayat',[Riwayat::class,'setRiwayat']) -> name('home.riwayat');

//Fixed
Route::get('/consultant',[LoginKonsultan::class, 'setFormLoginKonsultan']) -> name('con.login');
Route::post('/consultant',[LoginKonsultan::class, 'login']) -> name('con.auth');
//Fixed
Route::get('/dashboard',[HalUtamaKonsultan::class, 'setHalamanUtamaKonsultan']) -> name('dashboard');
//Fixed
Route::get('dashboard/profil',[ProfilKonsultan::class, 'profilKonsultan']) -> name('dashboard.profil');
Route::get('dashboard/logout',[ProfilKonsultan::class, 'logout']) -> name('dashboard.logout');
Route::get('dashboard/profil/update',[ProfilKonsultan::class, 'setPerubahanFormAkun']) -> name('dashboard.profil.form');
Route::post('dashboard/profil/update',[ProfilKonsultan::class, 'sendDataAkun']) -> name('dashboard.profil.update');
//fixed
Route::get('dashboard/klien',[Klien::class,'klien']) -> name('dashboard.klien');

// Route::post('homepage/profil/update/password', [Profil::class, 'profilUpdatePassword']) -> name('profil.pass');

// Route::get('/konsultan/{status}',[Front::class, 'statuskonsultan']) -> name('dashboard.statue');
// Route::get('/konsultan',[Front::class, 'konsultan']) -> name('dashboard');

// Route::post('dashboard/profil/update/password',[Profil::class, 'dashboardProfilUpdatePassword']) -> name('dashboard.profil.pass');
// Route::get('dashboard/client',[Dashboard::class, 'clientList']) -> name('dashboard.client');
// Route::get('dashboard/client/chat',[Chat::class, 'chat']) -> name('dashboard.chat');

// Route::get('homepage/konsultan', [Konsultasi::class, 'listKonsul']) -> name('home.konsultan');
// Route::post('homepage/konsultan/cari', [Konsultasi::class, 'cari']) -> name('home.cari');
// Route::post('homepage/konsultan/detail', [Konsultasi::class, 'detailKonsultan']) -> name('home.konsultan.detail');
// Route::post('homepage/konsultan/pemesanan', [Konsultasi::class, 'setkonsultan']) -> name('home.pesanan');
// Route::post('homepage/konsultan/token', [Konsultasi::class, 'getToken']) -> name('home.token');
// Route::any('homepage/konsultan/payment/full', [Konsultasi::class, 'midtransPay']) -> name('home.payment');
// Route::get('homepage/konsultan/sesi', [Sesi::class, 'setSesi']) -> name('home.sesi');
// Route::get('homepage/client/chat',[Chat::class, 'clientchat']) -> name('homepage.chat');

// Route::post('dashboard/client/push', [ChatIO::class, 'push']);
// Route::get('dashboard/client/poll', [ChatIO::class, 'poll']);
// Route::post('homepage/client/push', [ChatIO::class, 'push']);
// Route::get('homepage/client/poll', [ChatIO::class, 'poll']);

// Route::post('dashboard/chat/end',[Chat::class,'endSession']) -> name('chat.end');
