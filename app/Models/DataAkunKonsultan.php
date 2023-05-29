<?php

namespace App\Models;

use Illuminate\Database\QueryException;

class DataAkunKonsultan extends DB_HANDLER {
    
    protected $database = [
        "tabelConsultant" => "`akun_konsultan`",
        "dataConsultant" => "`id_konsultan`, `nama`, `user`, `pass`,`email`,`telephone`,`ikan`,jenis_ikan.`jenis_ikan` as 'jenis_ikan',`tarif`,`deskripsi`",
        "dataConsultant2" => "`id_konsultan`, `nama`,`email`,`telephone`,`ikan`,jenis_ikan.`jenis_ikan`,`tarif`,`deskripsi`",
        "deksConsultant" => "`id_konsultan`,`nama`,`ikan`, jenis_ikan.`jenis_ikan` as 'jenis_ikan',`tarif`,`deskripsi`",
    ];

    public function getDataAkunKonsultan($user){
        $config = $this -> database;
        $where = "`user`='".$user."'";
        $join = "JOIN jenis_ikan ON akun_konsultan.ikan = jenis_ikan.id_jenis_ikan ";
        $data = $this -> DB_JOIN($config['tabelConsultant'],$config['dataConsultant'],$join,$where);
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
        $where = "`status_konsultan` = 'tersedia' AND `status_akun` = 'online'";
        $join = "JOIN jenis_ikan ON akun_konsultan.ikan = jenis_ikan.id_jenis_ikan ";
        $data = $this -> DB_JOIN($config['tabelConsultant'],$config['deksConsultant'],$join,$where);
        return $data;
    }

    public function getDeksripsiKonsultan($id){
        $config = $this -> database;
        $where = "`id_konsultan`='".$id."'";
        $join = "JOIN jenis_ikan ON akun_konsultan.ikan = jenis_ikan.id_jenis_ikan ";
        $data = $this -> DB_JOIN($config['tabelConsultant'],$config['deksConsultant'],$join,$where);
        return $data;
    }

    public function getKonsultanData($id){
        $config = $this -> database;
        $where = "`id_konsultan`='".$id."'";
        $join = "JOIN jenis_ikan ON akun_konsultan.ikan = jenis_ikan.id_jenis_ikan ";
        $data = $this -> DB_JOIN($config['tabelConsultant'],$config['dataConsultant2'],$join,$where);
        return $data;
    }

    public function updateStatusKonsultan($id) {
        $config = $this -> database;
        $kolom = "`status_konsultan`='tidak_tersedia'";
        $where = "`id_konsultan`='".$id."'";
        $data = $this -> DB_UPDATE($config['tabelConsultant'],$kolom,$where);
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