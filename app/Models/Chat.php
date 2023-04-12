<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class Chat
{
    protected $fill = [

    ];
    
    public static function DB_SEND($data)
    {
        $pesan = DB::insert(" INSERT INTO `chat` VALUES ( " .$data. ") ");
        return $pesan;
    }

    public static function DB_POLL()
    {
        $data = DB::select(" SELECT * FROM `chat` ");
        return $data;
    }
}
?>