<?php
namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Klien;

class KlienDetail extends Controller 
{

    public function detailKlien() {
        $konsultasi = new Klien();
        $data = $konsultasi ->getKlienKonsultasi($_GET['no']);
        $chat = new Chat;
        $dataChat = $chat -> listChat($_GET['no']);
        return $this -> setdetailKlien($data,$dataChat);
    }

    public function setdetailKlien($data,$dataChat) {
        return view('detailKlien',['riwayat'=>$data,'dataChat'=>$dataChat]);
    }
}
?>