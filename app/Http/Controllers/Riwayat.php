<?php
namespace App\Http\Controllers;

use App\Models\Konsultasi;
use App\Models\Chat;
use App\Models\RiwayatKlien;

class Riwayat extends Controller
{
    public function setRiwayat(){
        $akun = session('userSession')[0]->id_klien;
        $konsultasi = new Konsultasi;
        $data = $konsultasi -> getRiwayat($akun);
        return view('riwayat',['riwayat'=>$data]);
    }
}