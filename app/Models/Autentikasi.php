<?php

namespace App\Models;

class Autentikasi extends DB_HANDLER
{
    protected $database = [
        "tabelUser" => '`client`',
        "tabelConsultant" => 'consultant',
        "dataUser"  => ' `uid`, `nama`, `user`, `pass` ',
        "dataConsultant" => ' `uid`, `nama`, `user`, `pass` '
    ];

    public function getAkunKlien($where){
        
        $data = $this -> database;
        $query = $this->DB_READ($data['tabelUser'],$data['dataUser'],$where);
        return $query;
    }

}

?>