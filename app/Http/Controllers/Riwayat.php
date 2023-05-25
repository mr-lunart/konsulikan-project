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
    public function setRiwayatDetail(){
        $idKonsultasi = $_GET['no'];
        $konsultasi = new Konsultasi;
        $chat = new Chat;
        $data = $konsultasi -> detailRiwayat($idKonsultasi);
        $dataChat = $chat -> listChat($idKonsultasi);
        return view('detailRiwayat',['riwayat'=>$data,'dataChat'=>$dataChat]);
    }
}