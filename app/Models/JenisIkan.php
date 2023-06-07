<?php

namespace App\Models;

class JenisIkan extends DB_HANDLER {

    protected $database = [
        "tabel" => "`jenis_ikan`",
        "data" => "`id_jenis_ikan`,`jenis_ikan`,`deskripsi_panduan`",
        "deksripsi" => "`deskripsi_panduan`",
    ];

    public function getDataJenisIkan($id){
        $config = $this -> database;
        $where = "`id_jenis_ikan` = '".$id."'";
        $data = $this -> DB_READ( $config['tabel'] , $config['deksripsi'] , $where);
        return $data;
    }
}

?>