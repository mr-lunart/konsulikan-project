<?php
namespace App\Http\Controllers;

use App\Models\Konsultasi;

class C_Chat extends Controller
{
    public function setDataChat() {
        $id_konsultan = session('consultantSession')[0]->id_konsultan;
        $konsultasi = new Konsultasi();
        $sesi = $konsultasi -> getKonsultasiKonsultan($id_konsultan);
        return view('chat', ['sesi' => $sesi]);
    }
}
?>