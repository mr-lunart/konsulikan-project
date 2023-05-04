<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class DB_HANDLER
{

    public static function DB_READ($tabel, $select, $where)
    {
        $query = DB::select('select '. $select .' from '. $tabel .' where user="'. $where .'"');
        return($query);
    }
    
    public static function DB_READ_WHERE($tabel, $select, $where)
    {
        $query = DB::select('select '. $select .' from '. $tabel .' where '. $where );
        return($query);
    }
    
    public static function DB_READ_ALL($tabel)
    {
        $query = DB::select('select * from `'. $tabel .'`' );
        return($query);
    }

    public static function DB_CREATE($tabel, $data, $kolom)
    {
        $query = DB::insert("insert into `". $tabel ."`(".$kolom.") VALUES (". $data .")");
        return($query);
    }
    
    public static function DB_UPDATE($tabel, $kolom, $where)
    { 
        $query = DB::update("update ". $tabel ." SET ". $kolom ." WHERE ". $where);
        return($query);
    }
    
    public static function DB_DELETE($sesi)
    {
        $query = DB::delete("DELETE FROM `session` WHERE `session_id` = ".$sesi);
    }
}

?>