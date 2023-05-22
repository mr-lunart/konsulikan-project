<?php
namespace App\Http\Controllers;

use App\Models\HasilPanen;

class EvaluasiPanen extends Controller
{
    
   
    public function evaluasiPanen() {
        $id = session('userSession')[0]->id_klien;
        $hasilPanen = new HasilPanen();
        $data = $hasilPanen->getDataHasilPanen($id);
        return view('evaluasiPanen',['data' => $data]);
    }

    public function hitungEP() {
        $post = $_POST;
        $id = session('userSession')[0]->id_klien;
        $hasilPanen = new HasilPanen();
        $data = $hasilPanen->sendDataHasilPanen($post,$id);

        return redirect() -> route('home.panen');
    }
}
?>