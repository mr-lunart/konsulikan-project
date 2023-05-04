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
    
    public function getKonsultanName($nama){
        $tabel = $this->config['tabel'];
        $select = $this->config['kolom2'];
        $where = "`nama` LIKE '%".$nama."%'";
        $data = $this->DB_READ_WHERE($tabel,$select,$where);
        return $data;
    }

    public function getKonsultanIkan($ikan){
        $tabel = $this->config['tabel'];
        $select = $this->config['kolom2'];
        $where = "`ikan` ='".$ikan."'";
        $data = $this->DB_READ_WHERE($tabel,$select,$where);
        return $data;
    }

    public function getKonsultanBoth($ikan,$nama){
        $tabel = $this->config['tabel'];
        $select = $this->config['kolom2'];
        $where = "ikan='".$ikan."' AND `nama` LIKE '%".$nama."%'";
        $data = $this->DB_READ_WHERE($tabel,$select,$where);
        return $data;
    }

    public function getKonsultanFromUid($uid){   
        $tabel = $this->config['tabel'];
        $select = $this->config['kolom2'];
        $uid = 'uid = "'.$uid.'"';
        $query = $this->DB_READ_WHERE($tabel,$select,$uid);
        return $query;
    }

}

?>