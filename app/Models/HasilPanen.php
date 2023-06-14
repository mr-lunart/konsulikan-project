<?php

namespace App\Models;

use Illuminate\Database\QueryException;

class HasilPanen extends DB_HANDLER {

    protected $database = [
        "tabel" => "`hasil_panen`",
        "data" => "`id_hasilPanen`, `nama_kegiatan`, `jenis_ikan_id`, `tanggal_tebar`,`tanggal_panen`,`bobot_total_pakan`,`bobot_ikan_awal`,`bobot_ikan_panen`,`bobot_ikan_mati`,`klien_id`",
        "data2" => "id_hasilPanen,`nama_kegiatan` as 'Nama Kegiatan', `jenis_ikan`.`jenis_ikan` as 'Jenis Ikan', `tanggal_tebar` as 'Tanggal Tebar',`tanggal_panen` as 'Tanggal Panen',`bobot_total_pakan` as 'Bobot Pakan',`bobot_ikan_awal` as 'Bobot Ikan Awal',`bobot_ikan_panen` as 'Bobot Ikan Panen',`bobot_ikan_mati` as 'Bobot Ikan Mati'",
        "dataPanen" => "id_hasilPanen,`nama_kegiatan` as 'Nama Kegiatan', `jenis_ikan`.`jenis_ikan` as 'Jenis Ikan', `tanggal_tebar` as 'Tanggal Tebar',`tanggal_panen` as 'Tanggal Panen'",
    ];

    public function getDataHasilPanen($id){
        $config = $this -> database;
        $where = "`klien_id`='".$id."'";
        $join = "join `jenis_ikan` on `jenis_ikan`.`id_jenis_ikan`=`hasil_panen`.`jenis_ikan_id`";
        $data = $this -> DB_JOIN( $config['tabel'],$config['data2'],$join,$where);
        return $data;
    }
    public function getKolom($id){
        $config = $this -> database;
        $where = "`klien_id`='".$id."'";
        $join = "join `jenis_ikan` on `jenis_ikan`.`id_jenis_ikan`=`hasil_panen`.`jenis_ikan_id`";
        $data = $this -> DB_JOIN( $config['tabel'],$config['dataPanen'],$join,$where);
        return $data;
    }

    public function getHasilPanen($id){
        $config = $this -> database;
        $where = "`id_hasilPanen`='".$id."'";
        $data = $this -> DB_READ( $config['tabel'],$config['data'],$where);
        return $data;
    }

    public function updateDataHasilPanen($post){
        $config = $this -> database;
        $where = "`id_hasilPanen`='".$post["id_hasilPanen"]."'";
        $kolom = "`nama_kegiatan`='".$post["namaKolam"]."',`jenis_ikan_id`='".$post['ikan']."',`tanggal_tebar`='".$post['tglTebar']."',`tanggal_panen`='".$post['tglPanen']."',`bobot_total_pakan`='".$post['brtPakan']."',`bobot_ikan_awal`='".$post["brtAwal"]."',`bobot_ikan_panen`='".$post['brtPanen']."',`bobot_ikan_mati`='".$post['brtMati']."'";
        $data = $this -> DB_UPDATE( $config['tabel'],$kolom,$where);
        return $data;
    }

    public function sendDataHasilPanen($post,$id){
        $config = $this -> database;
        $input = "0,'".$post['namaKolam']."','".$post['ikan']."','".$post['tglTebar']."','".$post['tglPanen']."','".$post['brtPakan']."','".$post['brtAwal']."','".$post['brtPanen']."','".$post['brtMati']."','".$id."'";
        $data = $this -> DB_CREATE( $config['tabel'],$input,$config['data']);
        return $data;
    }
}

?>