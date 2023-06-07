<?php

namespace App\Models;

class Ikan extends DB_HANDLER {

    protected $database = [
        "tabel" => "`ikan`",
        "data" => "`id_ikan`,`jenis_ikan_id`,`umur_ikan`,`klien_id`,`tanggal`",
        "data3" => "`id_ikan`,`jenis_ikan_id`,`umur_ikan`,`tanggal`",
        "data2" => "`id_ikan`,`jenis_ikan_id`,`umur_ikan`,`tanggal`, DATEDIFF(NOW(), tanggal) AS jarak_hari",
    ];

    public function getDataIkan($id){
        $config = $this -> database;
        $where = "`klien_id` = '".$id."'";
        $data = $this -> DB_READ( $config['tabel'] , $config['data2'] , $where);
        return $data;
    }

    public function sendDataIkan($post,$id){
        $config = $this -> database;
        $input = "0,'".$post['ikan']."','".$post['umur']."','".$id."',NOW()";
        $data = $this -> DB_CREATE( $config['tabel'],$input,$config['data']);
        return $data;
    }

    public function updateDataIkan($post,$id){
        $config = $this -> database;
        $input = "`jenis_ikan_id`='".$post['ikan']."',`umur_ikan`='".$post['umur']."', `tanggal`=NOW()";
        $where = "`klien_id` = '".$id."'";
        $data = $this -> DB_UPDATE( $config['tabel'],$input,$where);
        return $data;
    }
}

?>