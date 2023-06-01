<?php

namespace App\Models;

use Illuminate\Database\QueryException;

class Klien extends DB_HANDLER {

    protected $database = [
        "tabel" => "`klien`",
        "data4" => "`id_konsultasi`,`klien_id`, `konsultan_id`, akun_klien.`nama` as 'nama_klien', akun_konsultan.`nama` as 'nama_konsultan',`status_transaksi` , tanggal_transaksi",
    ];

    public function getKlien($id_klien){
        $data = $this->DB_KLIEN_JOIN($id_klien);
        return($data);
    }
    public function getKlienKonsultasi($id){
        $config = $this -> database;
        $join = "JOIN konsultasi ON konsultasi.id_konsultasi = klien.konsultasi_id JOIN akun_konsultan ON konsultasi.konsultan_id = akun_konsultan.id_konsultan JOIN akun_klien ON konsultasi.klien_id = akun_klien.id_klien";
        $where = "klien.konsultasi_id = ".$id;
        $data = $this -> DB_JOIN($config['tabel'],$config['data4'],$join,$where);
        return $data;
    }

}