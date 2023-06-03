<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Chat;
use App\Models\Konsultasi;

class SesiChatKonsultan extends Controller
{
    public function chat()
    {
        $id = $_GET['session_id'];
        return view('chat',['id_sesi'=>$id]);
    }
    
    public function konsultanChat() {
        $id_klien = session('consultantSession')[0]->id_konsultan;
        $konsultasi = new Konsultasi();
        $sesi = $konsultasi -> getKonsultasiKonsultan($id_klien);
        Session::put('sesiChat', $sesi);
        Session::save();
        return view('sesiChatKonsultan');
    }

    public function endSession()
    {
        // $remove = new SessionDB();
        // $id = $_POST['idSession'];
        // $remove -> removeSession($id);
        // return redirect()->route('dashboard.home');
    }

    public function push($id_konsultasi,$pesan,$pengirim,$penerima) {
        $sesi = session('sesiChat');
        $data_string = "0,'".$id_konsultasi."','".$penerima."','".$pengirim."','".$pesan."',NOW()";
        $where = "`id_konsultasi` = ".$id_konsultasi.";";
        $status = Chat::DB_STATUS($where);

        if($status[0]->status_transaksi =='settlement') {
            $data = Chat::DB_SEND($data_string);
        }
        else {
            $data = 0;
        }        

        return $data;
   
    }

    public function pushKonsultan() {
        $sesi = session('sesiChat');
        $id_konsultasi = $sesi[0]->id_konsultasi;
        $konsultan = $sesi[0]->nama_konsultan;
        $klien = $sesi[0]->nama_klien;
        $pesan = $_POST['pesan'];
        $chat = $this -> push($id_konsultasi,$pesan,$konsultan,$klien);
        return response($chat);
    }

    public function poll() {
        $sesi = session('sesiChat');
        $no = $_POST['iteratorPesan'];
        $id_konsultasi = $sesi[0]->id_konsultasi;
        $where = "`konsultasi_id` = ".$id_konsultasi." AND `no` > ".$no;
        $data = Chat::DB_POLL($where);
        return response($data);
    }
}
?>