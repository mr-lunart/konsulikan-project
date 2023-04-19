<?php

namespace App\Models;

class Konsultan extends DB_HANDLER
{
    protected $config = [
        "tabel" => 'consultant',
        "kolom" => '`no`, `uid`, `nama`, `bidang`, `user`, `pass` '
    ];

    public function getKonsultan(){
        $data = $this->DB_READ_ALL($this->config['tabel']);
        return $data;
    }

}

?>