<?php
// Fixed
namespace App\Models;

use Illuminate\Database\QueryException;

class DataAkunKlien extends DB_HANDLER
{
    protected $database = [
        "tabel" => '`akun_klien`',
        "login"  => '`id_klien` ,`nama` ,`user` ,`pass` ,`email` ,`noHP`',
    ];

    public function createDataAkun($data, $kolom) {
        $database = $this -> database;
        $query = dataAkunKlien::DB_CREATE($database['tabel'], $data, $kolom);
        return $query;
    }

    public function updateAkunUID($user) {
        $kolom = "`uid`= CONCAT('COS', no)";
        $where = "`user`='".$user."'";
        $database = $this -> database;
        $query = dataAkunKlien::DB_UPDATE($database['tabel'],$kolom, $where);
        return($query);
    }

    public function getDataAkunKlien($user){
        
        $database = $this -> database;
        $where = "user = '".$user."'";
        $query = $this->DB_READ($database['tabel'],$database['login'],$where);
        return $query;
    }

    public function updateDataAkunKlien($post,$id){
        $database = $this -> database;
        $kolom = "`nama`='".$post['nama']."',`email`='".$post['email']."',`noHP`='".$post['noHP']."'";
        $where = "id_klien ='".$id."'";
        try{

            $query = DataAkunKlien::DB_UPDATE($database['tabel'],$kolom,$where);
            $hasil = true;

        } catch(QueryException $e) {
            $query = $e -> getMessage();
            $hasil = false;
        }
        return $hasil;
    }

}

?>