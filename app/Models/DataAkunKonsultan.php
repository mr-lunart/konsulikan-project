<?php

namespace App\Models;

use Illuminate\Database\QueryException;

class DataAkunKonsultan extends DB_HANDLER {
    
    protected $database = [
        "tabelConsultant" => "`akun_konsultan`",
        "dataConsultant" => "`id_konsultan`, `nama`, `user`, `pass`,`email`,`telephone`,`ikan`,jenis_ikan.`jenis_ikan` as 'jenis_ikan',`tarif`,`foto_profil`,`deskripsi`",
        "dataConsultant2" => "`id_konsultan`, `nama`,`email`,`telephone`,`ikan`,jenis_ikan.`jenis_ikan`,`tarif`,`foto_profil`,`deskripsi`",
        "deksConsultant" => "`id_konsultan`,`nama`,`ikan`, jenis_ikan.`jenis_ikan` as 'jenis_ikan',`tarif`,`foto_profil`,`deskripsi`",
        "pass"  => '`id_konsultan`, `pass`'
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
    
    public function activateStatusKonsultan($id) {
        $config = $this -> database;
        $kolom = "`status_konsultan`='tersedia'";
        $where = "`id_konsultan`='".$id."'";
        $data = $this -> DB_UPDATE($config['tabelConsultant'],$kolom,$where);
    }

    public function getKonsultanName($nama){
        $config = $this -> database;
        $where = "`nama` LIKE '%".$nama."%' AND `status_konsultan` = 'tersedia' AND `status_akun` = 'online'";
        $join = "JOIN jenis_ikan ON akun_konsultan.ikan = jenis_ikan.id_jenis_ikan ";
        $data = $this -> DB_JOIN($config['tabelConsultant'],$config['deksConsultant'],$join,$where);
        return $data;
    }

    public function getKonsultanIkan($ikan){
        $config = $this -> database;
        $where = "`ikan` ='".$ikan."' AND `status_konsultan` = 'tersedia' AND `status_akun` = 'online'";
        $join = "JOIN jenis_ikan ON akun_konsultan.ikan = jenis_ikan.id_jenis_ikan ";
        $data = $this -> DB_JOIN($config['tabelConsultant'],$config['deksConsultant'],$join,$where);
        return $data;
    }

    public function getKonsultanBoth($ikan,$nama){
        $config = $this -> database;
        $where = "ikan='".$ikan."' AND `nama` LIKE '%".$nama."%' AND `status_konsultan` = 'tersedia' AND `status_akun` = 'online'";
        $join = "JOIN jenis_ikan ON akun_konsultan.ikan = jenis_ikan.id_jenis_ikan ";
        $data = $this -> DB_JOIN($config['tabelConsultant'],$config['deksConsultant'],$join,$where);
        return $data;
    }

    public function getPassword($id){
        
        $database = $this -> database;
        $where = "id_konsultan ='".$id."'";
        $query = $this->DB_READ($database['tabelConsultant'],$database['pass'],$where);
        return $query;
    }

    public function updatePassword($id,$pass){
        
        $database = $this -> database;
        $kolom = "`pass`='".$pass."'";
        $where = "id_konsultan ='".$id."'";
        try{

            $query = DataAkunKlien::DB_UPDATE($database['tabelConsultant'],$kolom,$where);
            $hasil = true;

        } catch(QueryException $e) {
            $query = $e -> getMessage();
            $hasil = false;
        }
        return $query;
    }

    // public function getKonsultanFromUid($uid){   
    //     $config = $this -> database;
    //     $tabel = $this->database['tabelConsultant'];
    //     $select = $this->database['deksConsultant'];
    //     $uid = 'uid = "'.$uid.'"';
    //     $query = $this->DB_READ_WHERE($tabel,$select,$uid);
    //     return $query;
    // }

}

?>