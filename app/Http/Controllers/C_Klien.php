<?php
namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Klien;

class C_Klien extends Controller 
{
    public function klien() {
        $akun = session('consultantSession')[0]->id_konsultan;
        $konsultasi = new Klien;
        $data = $konsultasi -> getKlien($akun);
        return view('klien',['riwayat'=>$data]);
    }
}
?>