<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;

class Io
{
    protected $fill = [

    ];
    
    public static function DB_SEND_PESAN($text)
    {
        $pesan = DB::insert("insert into 'chat'( 'pesan', 'tanggal') VALUES ('" + $text + "', curdate())");
        return $pesan;
    }

}
?>