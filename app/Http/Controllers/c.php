<?php
namespace App\Http\Controllers;

use App\Models\SessionDB;

class Chat extends Controller
{
    public function chat()
    {
        $id = $_GET['session_id'];
        return view('chat',['id_sesi'=>$id]);
    }
    public function clientchat()
    {
        $id = $_GET['session_id'];
        return view('chatclient',['id_sesi'=>$id]);
    }
    public function endSession()
    {
        $remove = new SessionDB();
        $id = $_POST['idSession'];
        $remove -> removeSession($id);
        return redirect()->route('dashboard.home');
    }
}
?>