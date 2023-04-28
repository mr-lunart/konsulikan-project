<?php

namespace App\Models;

class AkunHandler extends DB_HANDLER
{

    public function setAkun($data, $kolom)
    {
        $query = AkunHandler::DB_CREATE('client', $data, $kolom);
        return $query;
    }
    public function updateUID($user)
    {
        $kolom = "`uid`= CONCAT('COS', no)";
        $where = "`user`='".$user."'";
        $query = AkunHandler::DB_UPDATE('client',$kolom, $where);
        return($query);
    }

}

?>