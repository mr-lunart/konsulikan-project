<?php

namespace App\Models;

class SessionDB extends DB_HANDLER
{

    protected $fill=[
        'tabel'=>'`session`',
        "kolom" => '`session_id`, `client_uid`, `consultant_uid`, `order_id`, `status`'
    ];

    public function getSession($id)
    {
        $tabel = $this -> fill['tabel'];
        $select = $this -> fill['kolom'];
        $where = 'consultant_uid = "' . $id . '"';
        $query = $this -> DB_READ_WHERE($tabel,$select,$where);
        return $query;
    }
    public function getSessionClient($uid)
    {
        $tabel = $this -> fill['tabel'];
        $select = $this -> fill['kolom'];
        $where = 'client_uid = "'.$uid.'"';
        $query = $this -> DB_READ_WHERE($tabel,$select,$where);
        return $query;
    }
    
    public function setSession($client,$consultant,$order)
    {
        $tabel = 'session';
        $select = '`session_id`, `client_uid`, `consultant_uid`, `order_id`';
        $data = "0,'".$client."','".$consultant."','".$order."'";
        $query = $this -> DB_CREATE($tabel,$data,$select,);
    }
    
    public function updateSession($order)
    {
        $tabel = 'session';
        $select = "`status`= 'settlement'";
        $where = 'order_id ="' . $order . '"';
        $query = $this -> DB_UPDATE($tabel,$select,$where);
    }

}

?>