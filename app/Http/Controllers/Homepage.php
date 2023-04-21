<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class Homepage extends Controller
{
    public function home()
    {   
        $query = session('query');
        
        if( isset($query) ){
            return view('homepage');
        }

        elseif( isset($query) == false )
        {
            Session::flush();
            return redirect('/login');
        }
        
    }
    public function profil()
    {
        $query = session('query');
       
        if( isset($query) ){
            return view('profil');
        }

        elseif( isset($query) == false )
        {
            return redirect('/login');
        }
        
    }
}
