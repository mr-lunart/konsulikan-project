<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class HalUtamaKlien extends Controller
{
    public function home() {   
        $session = session('userSession');

        if( isset($session) ) {
            return view('halUtamaKlien');
        }
        elseif( isset($session)  == false ) {
            Session::flush();
            Session::save();
            return redirect() -> route('login');
        }
    }
}
