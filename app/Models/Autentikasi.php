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

    public function autentikasiClient($where){
        $data = $this -> database;
        $customer = Autentikasi::DB_READ($data['tabelUser'],$data['dataUser'],$where);
        return $customer;
    }

}

?>