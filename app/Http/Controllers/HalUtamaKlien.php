<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\HasilPanen;

class HalUtamaKlien extends Controller
{
    public function home() {   
        $session = session('userSession');

        if( isset($session) ) {
            $id = $session[0]->id_klien;
            $hasilPanen = new HasilPanen();
            $data = $hasilPanen->getDataHasilPanen($id);
            return view('halUtamaKlien',['data' => $data]);
        }
        elseif( isset($session)  == false ) {
            Session::flush();
            Session::save();
            return redirect() -> route('login');
        }
    }
}
