<?php
namespace App\Http\Controllers;

use App\Models\Chat;

class ChatIO extends Controller
{
    public function push() {
        $data = $_POST['pesan'];
        $idSesi = $_POST['id'];
        $data_string = "0,'".$idSesi."','','','".$data."',NOW()";
        $data=Chat::DB_SEND($data_string);
        return response($data);
   
    }

    public function poll() {
        $id = $_GET['idSesi'];
        $data = Chat::DB_POLL($id);
        return response($data);
    }
}
?>