<?php
namespace App\Http\Controllers;

use App\Models\DataAkunKonsultan;

class HalKonsultasi extends Controller
{
    public function setHalKonsultasi() {
        $konsultan = new DataAkunKonsultan();
        $data = $konsultan->getListKonsultan();
        return view('halKonsultasi', ['data' => $data]);
    }
}
?>