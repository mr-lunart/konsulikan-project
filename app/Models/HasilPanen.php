<?php

namespace App\Models;

use Illuminate\Database\QueryException;

class HasilPanen extends DB_HANDLER {

    protected $database = [
        "tabel" => "`hasil_panen`",
        "data" => "`id_hasilPanen`, `nama_kegiatan`, `jenis_ikan_id`, `tanggal_tebar`,`tanggal_panen`,`bobot_total_pakan`,`bobot_ikan_awal`,`bobot_ikan_panen`,`bobot_ikan_mati`,`klien_id`",
        "data2" => "`nama_kegiatan` as 'Nama Kegiatan', `jenis_ikan_id` as 'Jenis Ikan', `tanggal_tebar` as 'Tanggal Tebar',`tanggal_panen` as 'Tanggal Panen',`bobot_total_pakan` as 'Bobot Pakan',`bobot_ikan_awal` as 'Bobot Ikan Awal',`bobot_ikan_panen` as 'Bobot Ikan Panen',`bobot_ikan_mati` as 'Bobot Ikan Mati'",
    ];

    public function getDataHasilPanen($id){
        $config = $this -> database;
        $where = "`klien_id`='".$id."'";
        $data = $this -> DB_READ( $config['tabel'],$config['data2'],$where);
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