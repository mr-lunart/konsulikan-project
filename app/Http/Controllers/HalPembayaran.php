<?php
namespace App\Http\Controllers;

use App\Models\Konsultasi;
use App\Models\DataAkunKonsultan;
use Illuminate\Support\Facades\Session;

require_once app_path('Midtrans/Midtrans.php');

class HalPembayaran extends Controller
{

    public function setHalPembayaran(){
        $transaksi = $_GET;
        return view('halPembayaran', ['transaksi' => $transaksi]);
    }

    public function bayar() {
        $data = $_POST;
        $order = 0;
        $sesi = $this -> createSession($data);
        Session::put('payment', $data);
        Session::save();
        $token = $this->Midtrans(session('userSession')[0]->nama,$data["tarif"],$sesi);
        return redirect() -> route('home.pembayaran') -> with( ['urlToken' => $token]);
    }

    public static function createSession($post) {
        $konsultasi = new Konsultasi();
        $order = $konsultasi->setKonsultasi($post['id_klien'],$post['ikan'],$post['id_konsultan'],$post['tarif']);
        return $order;
    } 

    public static function updateStatusKonsultan($post) {
        $konsultan = new DataAkunKonsultan();
        $query = $konsultan -> updateStatusKonsultan($post['id_konsultan']);
        return $query;
    }

    public function midtransPay() {

        $order = $_GET['order_id'];
        $status = $_GET['transaction_status'];
        $payment = session('payment');
        
        if ($status=="settlement"){
            echo("Transaksi Berhasi!! : ");
            print("Silahkan Menutup Window Ini dan Kembali ke Website Utama");
            $updateKonsultan =  $this -> updateStatusKonsultan($payment['id_konsultan']);
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
            'enabled_payments' => array(
                'bri_epay'
            )
        );

        $snapUrl = \Midtrans\Snap::getSnapUrl($params);
        return($snapUrl);
    }
}
