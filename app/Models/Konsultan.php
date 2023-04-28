<?php

namespace App\Models;

class Konsultan extends DB_HANDLER {
    
    protected $config = [
        "tabel" => 'consultant',
        "kolom" => '`no`, `uid`, `nama`,`tarif`',
        "kolom2" => '`uid`, `nama`, `email`, `telephone`, `ikan`, `tarif`, `deskripsi`'
    ];

    public function getKonsultan(){
        $data = $this->DB_READ_ALL($this->config['tabel']);
        return $data;
    }
    
    public function getKonsultanFromUid($uid){   
        $tabel = $this->config['tabel'];
        $select = $this->config['kolom2'];
        $uid = 'uid = "'.$uid.'"';
        $query = $this->DB_READ_test($tabel,$select,$uid);
        return $query;
    }

}

?>