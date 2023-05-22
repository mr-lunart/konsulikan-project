<?php
namespace App\Http\Controllers;

use App\Models\Chat;

class ChatIO extends Controller
{
    public function push() {
        $data = $_POST['pesan'];
        $idSesi = $_POST['id'];
        $pengirim = $_POST['pengirim'];
        $data_string = "0,'".$idSesi."','','".$pengirim."','".$data."',NOW()";
        $data=Chat::DB_SEND($data_string);
        return response($data);
   
    }

    public function poll() {
        $id = $_GET['idSesi'];
        $no = $_GET['sessionNol'];
        $where = "`session_id` = ".$id." AND `no` > ".$no;
        $data = Chat::DB_POLL($where);
        return response($data);
    }
}
?>