<?php

namespace App\Models;

class SessionDB extends DB_HANDLER
{

    protected $fill=[
        'tabel'=>'`session`',
        "kolom" => '`session_id`, `client_uid`, `consultant_uid` '
    ];

    public function getSession($id)
    {
        $tabel = $this -> fill['tabel'];
        $select = $this -> fill['kolom'];
        $where = 'consultant_uid = "' . $id . '"';
        $query = $this -> DB_READ_test($tabel,$select,$where);
        return $query;
    }

}

?>