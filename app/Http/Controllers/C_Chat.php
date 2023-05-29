<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Chat;
use App\Models\Konsultasi;

class C_Chat extends Controller
{
    public function chat()
    {
        $id = $_GET['session_id'];
        return view('chat',['id_sesi'=>$id]);
    }
    public function klienChat()
    {
        $id_klien = session('userSession')[0]->id_klien;
        $konsultasi = new Konsultasi();
        $sesi = $konsultasi -> getKonsultasi($id_klien);
        Session::put('sesiChat', $sesi);
        Session::save();
        return view('chatKlien');
    }
    public function endSession()
    {
        // $remove = new SessionDB();
        // $id = $_POST['idSession'];
        // $remove -> removeSession($id);
        // return redirect()->route('dashboard.home');
    }

    public function push() {
        $data = $_POST['pesan'];
        $idSesi = $_POST['id'];
        $pengirim = $_POST['pengirim'];
        $data_string = "0,'".$idSesi."','','".$pengirim."','".$data."',NOW()";
        $data=Chat::DB_SEND($data_string);
        return response($data);
   
    }

    public function poll() {
        $sesi = session('sesiChat');
        $no = $_POST['sessionNol'];
        $where = "`konsultasi_id` = ".$sesi[0]->id_konsultasi." AND `no` > ".$no;
        $data = Chat::DB_POLL($where);
        return response($data);
    }
}
?>