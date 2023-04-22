<?php
namespace App\Http\Controllers;

use App\Models\Autentikasi;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

class Login extends Controller
{

    public function logout() {
        Session::flush();
        return redirect('/homepage');
    }
    public function login() {
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
            }
            else {
                $status = 1;
                return redirect()->route('login.statue', ['status' => $status]);
            }
        }

        elseif( $hasil == 0 )
        {
            $status = 1;
            return redirect()->route('login.statue', ['status' => $status]);
        }        
    }
    public function dashboardLogin() {

        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $autentikasi = new Autentikasi();
        try{
            $query = $autentikasi->getAkunKonsultan( $user );

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
                return redirect() -> route('dashboard.home');
            }
            else {
                $status = 1;
                return redirect()->route('dashboard.statue', ['status' => $status]);
            }
            
        }

        elseif( $hasil == 0 )
        {
            $status = 1;
            return redirect()->route('dashboard.statue', ['status' => $status]);
        }       
    }
    public function dashboardLogout() {
        Session::flush();
        return redirect('/konsultan');
    }

}
?>