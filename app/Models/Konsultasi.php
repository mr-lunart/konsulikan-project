<?php

namespace App\Models;

use Illuminate\Database\QueryException;

class Konsultasi extends DB_HANDLER {

    protected $database = [
        "tabel" => "`konsultasi`",
        "kolom" => "`id_konsultasi`, `klien_id`, `jenis_ikan_id`, `konsultan_id`, `tarif_konsultasi`, `tanggal_transaksi`, `id_pemesanan`,`status_transaksi`",
        "data2" => "`id_konsultasi`, `klien_id`, `jenis_ikan_id`, `id_pemesanan`, `status_transaksi`",
        "data3" => "`id_konsultasi`, `klien_id`, `jenis_ikan_id`,",
        "data4" => "`id_konsultasi`,`klien_id`, `konsultan_id`, akun_klien.`nama` as 'nama_klien', akun_konsultan.`nama` as 'nama_konsultan', `id_pemesanan`,`status_transaksi`",
        "data5" => "`id_konsultasi`,`klien_id`, `konsultan_id`, akun_klien.`nama` as 'nama_klien', akun_konsultan.`nama` as 'nama_konsultan',`status_transaksi`",
    ];
    
    public function setKonsultasi($id_klien,$id_jenis_ikan,$id_konsultan,$tarif){
        $config = $this -> database;
        $data = "0,'".$id_klien."','".$id_jenis_ikan."','".$id_konsultan."','".$tarif."',NOW(),'"."P".$id_klien."O".$id_konsultan."','pending'";
        $data = $this->DB_CREATE($config['tabel'],$data,$config['kolom']);
        $id_pesanan = "P".$id_klien."O".$id_konsultan;
        $id_order = $this -> updateIdPemesanan($config,$id_pesanan);
        return $id_order;
    }

    public function updateIdPemesanan($config, $id_pesanan){

        $where = "id_pemesanan = '".$id_pesanan."'";
        $id_konsultasi = $this -> DB_READ($config['tabel'],"`id_konsultasi`",$where);
        $kolom = "`id_pemesanan` = '".$id_konsultasi[0]->id_konsultasi.$id_pesanan."'";
        $this -> DB_UPDATE($config['tabel'], $kolom,$where);
        return $id_konsultasi[0]->id_konsultasi.$id_pesanan;
    }

    public function updateStatusTransaksi($id_pesanan){

        $where = "id_pemesanan = '".$id_pesanan."'";
        $kolom = "`status_transaksi` = 'settlement'";
        $this -> DB_UPDATE('konsultasi', $kolom,$where);
        return;
    }

    public function updateStatusChat($id_pesanan){

        $where = "id_pemesanan = '".$id_pesanan."'";
        $kolom = "`status_transaksi` = 'finished'";
        $this -> DB_UPDATE('konsultasi', $kolom,$where);
        return;
    }

    public function getKonsultasi($id){
        $config = $this -> database;
        $join = "JOIN akun_klien ON konsultasi.klien_id = akun_klien.id_klien JOIN akun_konsultan ON konsultasi.konsultan_id = akun_konsultan.id_konsultan";
        $where = "klien_id = ".$id."  AND status_transaksi = 'settlement'";
        $data = $this -> DB_JOIN($config['tabel'],$config['data4'],$join,$where);
        return $data;
    }

    public function getKonsultasiKonsultan($id){
        $config = $this -> database;
        $join = "JOIN akun_klien ON konsultasi.klien_id = akun_klien.id_klien JOIN akun_konsultan ON konsultasi.konsultan_id = akun_konsultan.id_konsultan";
        $where = "konsultan_id = ".$id."  AND status_transaksi = 'settlement'";
        $data = $this -> DB_JOIN($config['tabel'],$config['data4'],$join,$where);
        return $data;
    }

    public function getKlienKonsultasi($id){
        $config = $this -> database;
        $join = "JOIN akun_klien ON konsultasi.klien_id = akun_klien.id_klien JOIN akun_konsultan ON konsultasi.konsultan_id = akun_konsultan.id_konsultan";
        $where = "klien_id = ".$id."  AND status_transaksi = 'settlement'";
        $data = $this -> DB_JOIN($config['tabel'],$config['data5'],$join,$where);
        return $data;
    }
    
}