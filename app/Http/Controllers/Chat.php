<?php
namespace App\Http\Controllers;

class Chat extends Controller
{
    public function chat()
    {
        $id = $_GET['session_id'];
        return view('chat',['id_sesi'=>$id]);
    }
}
?>