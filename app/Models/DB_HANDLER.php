<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class DB_HANDLER
{

    public static function DB_READ($tabel,$select,$where)
    {
        $query = DB::select('select '. '*' .' from ' . $tabel .' where user="'.$where.'"');
        return($query);
    }
    
    public static function DB_CREATE()
    {

    }
}

?>