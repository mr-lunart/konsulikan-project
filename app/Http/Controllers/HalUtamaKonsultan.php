<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class HalUtamaKonsultan extends Controller
{
    public function setHalamanUtamaKonsultan() {   
        $session = session('consultantSession');

        if( isset($session) ) {
            return view('halUtamaKonsultan');
        }
        elseif( isset($session)  == false ) {
            Session::flush();
            Session::save();
            return redirect() -> route('con.login');
        }
    }

}
