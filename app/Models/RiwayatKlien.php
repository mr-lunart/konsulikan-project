<?php

namespace App\Models;

use Illuminate\Database\QueryException;

class RiwayatKlien extends DB_HANDLER {

    protected $database = [
        "tabel" => "`riwayat`",
        "allKolom" => "`id_riwayat`, `konsultasi_id`, `status_konsultasi`",
    ];

    public function getRiwayat($id_klien){

        $data = $this->DB_RIWAYAT_JOIN($id_klien);
        return($data);
    }
    public function detailRiwayat($id_konsultasi){

        $data = $this->DB_RIWAYAT_DETAIL($id_konsultasi);
        return($data);
    }
    public function insertNewData($id){
        $config = $this -> database;
        $data ="'0','".$id."','selesai'";
        $query = $this -> DB_CREATE($config['tabel'],$data,$config['allKolom']);
    }
    
}