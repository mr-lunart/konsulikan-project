<?php
namespace App\Http\Controllers;

use App\Models\Ikan;
use App\Models\M_PanduanPakan;

class PanduanPakan extends Controller 
{
    public function panduanPakan() {
        $ikan = new Ikan();
        $panduan = new M_PanduanPakan();
        $id = session('userSession')[0] -> id_klien;
        $data = $ikan -> getDataIkan($id);
        if( count($data) != 0 ) {
            
            $panduanPakan = $panduan -> getDataPanduan($data[0]->umur_ikan,$data[0]->jenis_ikan_id);
            return view('panduanPakan',['dataIkan' => $data,'panduan' => $panduanPakan]);
        }
        else {
            $panduanPakan = $panduan -> getDataPanduan(0,0);
            return view('panduanPakan',['dataIkan' => $data,'panduan' => $panduanPakan]);
        }
        
    } 

    public function sendDataIkan() {
        $post = $_POST;
        $ikan = new Ikan();
        $id = session('userSession')[0] -> id_klien;
        $data = $ikan -> getDataIkan($id);
        if( count($data) != 0 ) {
            $status = $ikan -> updateDataIkan($post,$id);
        }
        elseif( count($data) == 0 ) {
            $status = $ikan -> sendDataIkan($post,$id);
        }
        return redirect()->route('home.pakan');
    }
}
?>