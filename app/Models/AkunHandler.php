<?php

namespace App\Models;

class AkunHandler extends DB_HANDLER
{

    public function setAkun($data, $kolom)
    {
        AkunHandler::DB_CREATE('client', $data, $kolom);
    }

}

?>