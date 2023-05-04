<?php

namespace App\Http\Controllers;
use App\Models\Konsultan;
use App\Models\SessionDB;
use Illuminate\Http\Request;

require_once app_path('Midtrans/Midtrans.php');

class Konsultasi extends Controller
{

    public function listKonsul() {
        $konsultan = new Konsultan();
        $data = $konsultan->getKonsultan();
        return view('konsultasi', ['data' => $data]);
    }

    public function detailKonsultan() {
        $uid = $_POST['uid'];
        $konsultan = new Konsultan();
        $data = $konsultan->getKonsultanFromUid($uid);

        $session = new SessionDB();
        $uidClient = session('query')[0] -> uid;
        $sesi = $session -> checkSessionClient($uidClient, $uid);

        return view('detailKonsultan',['query'=>$data, 'sesi'=>$sesi]);
    }
    
    public function setkonsultan() {
        $uid = $_POST['uid'];
        $konsultan = new Konsultan();
        $data = $konsultan->getKonsultanFromUid($uid);
        return view('pembayaran',['query'=>$data]);
    }

    public function cari() {

        $konsultan = new Konsultan();
        if($_POST['ikan']==0 && $_POST['nama']=="") {
            
            $data = $konsultan->getKonsultan();
            return view('konsultasi', ['data' => $data]);
        }
        elseif($_POST['ikan'] != 0 && $_POST['nama'] != "") {
            $data = $konsultan->getKonsultanBoth($_POST['ikan'],$_POST['nama']);
            return view('konsultasi', ['data' => $data]);
        }
        elseif($_POST['ikan'] != 0 && $_POST['nama'] == "")
        {
            $data = $konsultan->getKonsultanIkan($_POST['ikan']);
            return view('konsultasi', ['data' => $data]);
        }
        elseif($_POST['ikan'] == 0 && $_POST['nama'] != "")
        {
            $data = $konsultan->getKonsultanName($_POST['nama']);
            return view('konsultasi', ['data' => $data]);
        }
        
    }

    public function getToken() {
        $harga = $_POST['harga'];
        $uid_cos = $_POST['uid_cos'];
        $uid_con = $_POST['uid_con'];
        $order_id = rand();
        $query = $this -> createSession($uid_cos,$uid_con,$order_id);
        $token = Konsultasi::Midtrans($uid_cos,$harga,$order_id);
        return response($token);
    }
    public static function createSession($cos,$con,$order) {
        $session = new SessionDB();
        $data = $session->setSession($cos,$con,$order);
        return $data;
    } 

    public function midtransPay()
    {

        $order = $_GET['order_id'];
        $status = $_GET['transaction_status'];
        
        if ($status=="settlement"){
            $session = new SessionDB();
            $query = $session -> updateSession($order);
            echo("Transaksi Berhasi!! : ");
            print("Silahkan Menutup Window Ini dan Kembali ke Website Utama");
        }

        elseif ($status=="deny")
        {
            echo("Maaf Transaksi Gagal : ");
            echo("Hubungi Admin Website atau Lakukan Pemesanan Ulang");
        }

        else{
            echo("Silahkan Menutup Window Ini dan Kembali ke Website Utama");
        }
    }

    public static function Midtrans ($nama,$harga,$order_id) {

        \Midtrans\Config::$serverKey = 'SB-Mid-server-8P7RuPlBiPDvVKgvyVEmt0yA';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order_id,
                'gross_amount' => $harga,
            ),
            'customer_details' => array(
                'first_name' => $nama,
            ),
        );

        $snapUrl = \Midtrans\Snap::getSnapUrl($params);
        return($snapUrl);
    }
}


?>