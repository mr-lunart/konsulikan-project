<?php

namespace App\Http\Controllers;

use App\Models\HasilPanen;

class EvaluasiPanen extends Controller
{

    public function evaluasiPanen()
    {
        $id = session('userSession')[0]->id_klien;
        $hasilPanen = new HasilPanen();
        $data = $hasilPanen->getDataHasilPanen($id);
        $kolom = $hasilPanen->getKolom($id);
        $ep = [];
        foreach ($data as $row) {
            $percent = $this->RumusEP($row);
            array_push($ep, $percent);
        }
        return view('evaluasiPanen', ['ep' => $ep, 'display' => $kolom]);
    }

    public function RumusEP($row)
    {
        $tambah = $row->{'Bobot Ikan Panen'} + $row->{'Bobot Ikan Mati'};
        $atas = $tambah - $row->{'Bobot Ikan Awal'};
        $bawah = $atas / $row->{'Bobot Pakan'};
        return round($bawah * 100);
    }

    public function detailEvaluasiPanen()
    {
        $id = $_GET['id_hasilPanen'];
        $hasilPanen = new HasilPanen();
        $data = $hasilPanen->getHasilPanen($id);
        return view('detailEvaluasiPanen', ['data' => $data[0]]);
    }

    public function tambahEvaluasiPanen()
    {
        return view('tambahEvaluasiPanen');
    }

    public function editEvaluasiPanen()
    {
        $id = $_GET['id_hasilPanen'];
        $hasilPanen = new HasilPanen();
        $data = $hasilPanen->getHasilPanen($id);
        return view('editEvaluasiPanen', ['data' => $data[0]]);
    }

    public function updateEvaluasiPanen()
    {
        $post = $_POST;
        $hasilPanen = new HasilPanen();
        $data = $hasilPanen->updateDataHasilPanen($post);
        return redirect()->route('home.panen')->with(['status' => true]);
    }

    public function hitungEP()
    {
        $post = $_POST;
        $id = session('userSession')[0]->id_klien;
        $hasilPanen = new HasilPanen();
        $data = $hasilPanen->sendDataHasilPanen($post, $id);

        return redirect()->route('home.panen');
    }
}
