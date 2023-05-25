<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;

class Chat extends DB_HANDLER
{
    protected $fill = [

    ];
    
    public static function DB_SEND($data) {
        $pesan = DB::insert(" INSERT INTO `chat` VALUES (".$data.") ");
        return $pesan;
    }

    public static function DB_POLL($id) {
        $data = DB::select(" SELECT * FROM `chat` WHERE ".$id);
        return $data;
    }

    public function listChat($id){
        $data = DB::select("SELECT * FROM `chat` WHERE konsultasi_id=".$id);
        return $data;
    }
    
}
?>