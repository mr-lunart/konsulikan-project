<?php

namespace App\Http\Controllers;
use App\Models\Konsultan;
require_once app_path('Midtrans/Midtrans.php');

class Konsultasi extends Controller
{

    public function listKonsul () {
        $konsultan = new Konsultan();
        $data= $konsultan->getKonsultan();
        return view('konsultasi', ['data' => $data]);
    }
    public static function midtrans () {

    }
}

?>