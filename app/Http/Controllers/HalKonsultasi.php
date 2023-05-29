<?php
namespace App\Http\Controllers;

use App\Models\DataAkunKonsultan;
use App\Models\Konsultasi;

class HalKonsultasi extends Controller
{
    public function setHalKonsultasi() {
        $id_klien = session('userSession')[0]->id_klien;
        $konsultan = new DataAkunKonsultan();
        $konsultasi = new Konsultasi();
        $data = $konsultan -> getListKonsultan();
        $sesi = $konsultasi -> getKonsultasi($id_klien);
        return view('halKonsultasi', ['data' => $data,'sesi' => $sesi]);
    }
}
?>