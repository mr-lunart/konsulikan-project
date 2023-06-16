<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use App\Models\DataAkunKonsultan;
use Illuminate\Support\Facades\Session;

require_once app_path('Midtrans/Midtrans.php');

class HalPembayaran extends Controller
{

    public function setHalPembayaran()
    {
        $transaksi = $_GET;
        return view('halPembayaran', ['transaksi' => $transaksi]);
    }

    public function bayar()
    {
        $data = $_POST;
        $order = 0;
        $sesi = $this->createSession($data);
        Session::put('payment', $data);
        Session::save();
        $token = $this->Midtrans(session('userSession')[0]->nama, $data["tarif"], $sesi);
        return redirect()->route('home.pembayaran')->with(['urlToken' => $token]);
    }

    public static function createSession($post)
    {
        $konsultasi = new Konsultasi();
        $order = $konsultasi->setKonsultasi($post['id_klien'], $post['ikan'], $post['id_konsultan'], $post['tarif']);
        return $order;
    }

    public static function updateStatusKonsultan($post)
    {
        $konsultan = new DataAkunKonsultan();
        $query = $konsultan->updateStatusKonsultan($post);
        return $query;
    }

    public static function updateStatusPembayaran($id_pesanan)
    {
        $konsultasi = new Konsultasi;
        $query = $konsultasi->updateStatusTransaksi($id_pesanan);
        return $query;
    }

    public static function getPembayaran($id_pesanan)
    {
        $konsultasi = new Konsultasi;
        $query = $konsultasi->getKonsultasiKonsultanId($id_pesanan);
        return $query;
    }

    public function midtransPay()
    {

        $order = $_GET['order_id'];
        $status = $_GET['transaction_status'];
        $payment = session('payment');

        if ($status == "settlement") {
            $this->updateStatusPembayaran($order);
            // $updateKonsultan =  $this->updateStatusKonsultan($payment['id_konsultan']);
            $idKonsultan = $this->getPembayaran($order);
            $updateKonsultan =  $this->updateStatusKonsultan($idKonsultan[0]->konsultan_id);
            return view('apiPage',['status'=>'sukses']);
        } elseif ($status == "deny") {
            return view('apiPage',['status'=>'gagal']);
        } else {
            echo ("Silahkan Menutup Window Ini dan Kembali ke Website Utama");
        }
    }

    public static function Midtrans($nama, $harga, $order_id)
    {

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
                'gross_amount' => $harga + 2000,
            ),
            'customer_details' => array(
                'first_name' => $nama,
            ),
            'enabled_payments' => array(
                'bri_epay',
                "gopay",
                "Indomaret",
                "alfamart"
            )
        );

        $snapUrl = \Midtrans\Snap::getSnapUrl($params);
        return ($snapUrl);
    }
}
