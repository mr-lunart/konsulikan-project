<?php

namespace App\Models;

use Illuminate\Database\QueryException;

class DataAkunKonsultan extends DB_HANDLER {
    
    protected $database = [
        "tabelConsultant" => "`akun_konsultan`",
        "dataConsultant" => "`id_konsultan`, `nama`, `user`, `pass`,`email`,`telephone`,`ikan`,`tarif`,`deskripsi`",
        "deksConsultant" => "`nama`, `ikan`,`tarif`,`deskripsi`",
    ];

    public function getDataAkunKonsultan($user){
        $config = $this -> database;
        $where = "`user`='".$user."'";
        $data = $this -> DB_READ( $config['tabelConsultant'],$config['dataConsultant'],$where);
        return $data;
    }

    public function updateDataAkunKonsultan($post,$id){
        $database = $this -> database;
        $kolom = "`nama`='".$post['nama']."',`email`='".$post['email']."',`telephone`='".$post['noHP']."',`ikan`='".$post['ikan']."',`tarif`='".$post['tarif']."',`deskripsi`='".$post['deskripsi']."'";
        $where = "id_konsultan ='".$id."'";
        try{

            $query = DataAkunKlien::DB_UPDATE($database['tabelConsultant'],$kolom,$where);
            $hasil = true;

        } catch(QueryException $e) {
            $query = $e -> getMessage();
            $hasil = false;
        }
        return $hasil;
    }
    
    public function getListKonsultan(){
        $config = $this -> database;
        $data = $this -> DB_READ_ALL($config['tabelConsultant']);
        return $data;
    }

    public function getDeksripsiKonsultan($id){
        $config = $this -> database;
        $where = "`id_konsultan`='".$id."'";
        $data = $this -> DB_READ( $config['tabelConsultant'],$config['deksConsultant'],$where);
        return $data;
    }
    // public function getKonsultanName($nama){
    //     $tabel = $this->config['tabel'];
    //     $select = $this->config['kolom2'];
    //     $where = "`nama` LIKE '%".$nama."%'";
    //     $data = $this->DB_READ_WHERE($tabel,$select,$where);
    //     return $data;
    // }

    // public function getKonsultanIkan($ikan){
    //     $tabel = $this->config['tabel'];
    //     $select = $this->config['kolom2'];
    //     $where = "`ikan` ='".$ikan."'";
    //     $data = $this->DB_READ_WHERE($tabel,$select,$where);
    //     return $data;
    // }

    // public function getKonsultanBoth($ikan,$nama){
    //     $tabel = $this->config['tabel'];
    //     $select = $this->config['kolom2'];
    //     $where = "ikan='".$ikan."' AND `nama` LIKE '%".$nama."%'";
    //     $data = $this->DB_READ_WHERE($tabel,$select,$where);
    //     return $data;
    // }

    // public function getKonsultanFromUid($uid){   
    //     $tabel = $this->config['tabel'];
    //     $select = $this->config['kolom2'];
    //     $uid = 'uid = "'.$uid.'"';
    //     $query = $this->DB_READ_WHERE($tabel,$select,$uid);
    //     return $query;
    // }

}

?>