<?php

namespace App\Models;

use Illuminate\Database\QueryException;

class Klien extends DB_HANDLER {

    protected $database = [
        "tabel" => "`klien`",
        "allKolom" => "`id_daftarKlien`, `konsultasi_id`",
        "data4" => "`id_konsultasi`,`klien_id`, `konsultan_id`, akun_klien.`nama` as 'nama_klien', akun_konsultan.`nama` as 'nama_konsultan',`status_transaksi` , tanggal_transaksi",
        "pendapatan" => "`id_daftarKlien`, `konsultasi`.`tanggal_transaksi`, `konsultasi`.tarif_konsultasi",
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

    public function getPendapatan($id){
        $config = $this -> database;
        $join = "JOIN konsultasi ON klien.konsultasi_id = konsultasi.id_konsultasi ";
        $where = "MONTH(`konsultasi`.tanggal_transaksi) =  MONTH(NOW()) AND konsultasi.konsultan_id = ".$id."";
        $data = $this -> DB_JOIN($config['tabel'],$config['pendapatan'],$join,$where);
        return $data;
    }

    public function insertNewData($id){
        $config = $this -> database;
        $data ="'0','".$id."'";
        $query = $this -> DB_CREATE($config['tabel'],$data,$config['allKolom']);
    }

}