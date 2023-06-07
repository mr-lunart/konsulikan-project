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

    public function setCari() {

        $konsultan = new DataAkunKonsultan();

        if($_POST['ikan']==0 && $_POST['nama']=="") {
            
            $data = $konsultan->getListKonsultan();
            return view('halKonsultasi', ['data' => $data]);
        }
        elseif($_POST['ikan'] != 0 && $_POST['nama'] != "") {
            $data = $konsultan->getKonsultanBoth($_POST['ikan'],$_POST['nama']);
            return view('halKonsultasi', ['data' => $data]);
        }
        elseif($_POST['ikan'] != 0 && $_POST['nama'] == "")
        {
            $data = $konsultan->getKonsultanIkan($_POST['ikan']);
            return view('halKonsultasi', ['data' => $data]);
        }
        elseif($_POST['ikan'] == 0 && $_POST['nama'] != "")
        {
            $data = $konsultan->getKonsultanName($_POST['nama']);
            return view('halKonsultasi', ['data' => $data]);
        }
        
    }
}
?>