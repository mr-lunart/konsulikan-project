<?php
namespace App\Http\Controllers;

use App\Models\Autentikasi;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

class Login extends Controller
{

    public static function logout()
    {
        Session::flush();
        return redirect('/homepage');
    }

    public static function login()
    {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $autentikasi = new Autentikasi();
        try{
            $query = $autentikasi->getAkunKlien( $user );
            if( count( $query )==0 ) {
                $hasil = 0;
            }
            else {
                $hasil = 1;
            }

        } catch( QueryException $e ){
            $query = $e;
            $hasil = 0;
        }

        if ( $hasil==1 ) {    
            if ($user == $query[0]->user && $pass == $query[0]->pass)
            {   
                Session::put('query', $query);
                return redirect()->route('home');
                // return view('homepage', ['query'=>$query]);
            }
        }

        elseif( $hasil == 0 )
        {
            $status = 0;
            return redirect()->route('login.statue', ['status' => $status]);
        }        
    }

}
?>