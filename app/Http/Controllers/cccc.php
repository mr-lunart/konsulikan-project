<?php
namespace App\Http\Controllers;

use App\Models\SessionDB;
use Illuminate\Support\Facades\Session;

class Dashboard extends Controller
{
    public function home() {   
        
        $query = session('query');
        
        if( isset($query) ){
            return view('dashboard');
        }

        elseif( isset($query) == false )
        {
            Session::flush();
            return redirect('/konsultan');
        }
        
    }

    public function clientList() {
        $db = new SessionDB();
        $session = session('query')[0];
        $query = $db -> getSession($session -> uid);
        return view('clientlist',['query'=>$query]);
    }

    public function dashboardProfil(){
        return view('profilKonsultan');
    }
}