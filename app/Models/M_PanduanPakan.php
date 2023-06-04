<?php

namespace App\Models;

class M_PanduanPakan extends DB_HANDLER {

    protected $database = [
        "tabel" => "`panduan_pakan`",
        "data" => "`id_panduan`, `id_jenis_ikan`, `batas_umur`, `umur`, `berat_ikan`, `panjang`, `jenis_pakan`, `ukuran_pakan`, `frekuensi`, `dosis_pakan`",
        "data2" => "`id_jenis_ikan`, `batas_bawah`, `batas_atas`, `umur`, `berat_ikan`, `panjang`, `jenis_pakan`, `ukuran_pakan`, `frekuensi`, `dosis_pakan`",
        "data3" => "jenis_ikan.`jenis_ikan` as 'Jenis Ikan', `umur` as 'Umur', `berat_ikan` as 'Berat Ikan', `panjang` as 'Panjang', `jenis_pakan` as 'Jenis Pakan', `ukuran_pakan` as 'Ukuran Pakan', `frekuensi` as 'Frekuensi', `dosis_pakan` as 'Dosis Pakan' "
    ];

    public function getDataPanduan($umur,$ikan){
        $config = $this -> database;
        $where = "panduan_pakan.`id_jenis_ikan` = ".$ikan." AND (`batas_bawah` >= ".$umur." OR `batas_atas` >= ".$umur.")";
        $join = " LEFT JOIN `jenis_ikan` ON panduan_pakan.id_jenis_ikan = jenis_ikan.id_jenis_ikan ";
        $data = $this -> DB_JOIN( $config['tabel'] , $config['data3'],$join, $where);
        return $data;
    }
}

?>