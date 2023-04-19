<?php
namespace App\Http\Controllers;

use App\Models\Chat;

class IoChat extends Controller
{
    public function push()
    {
        $data = $_POST;
        $data_string = "'1','1','1', ' ".$data['pesan'] ." ', CURRENT_TIMESTAMP";
        $send = Chat::DB_SEND($data_string);
        // return response()->json(['success'=>$data]);
        return response($send);   
    }

    public function poll()
    {
        $data = Chat::DB_POLL();
        return response($data);
    }
}
?>