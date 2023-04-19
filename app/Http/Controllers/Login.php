<?php
namespace App\Http\Controllers;

use App\Models\Autentikasi;

class Login extends Controller
{

    public function client()
    {
        return view('page.login');
    }

    public function konsultan()
    {
        return view('page.login-konsultan');
    }

    public static function logout()
    {
        session_start();
        session_abort();
        session_destroy();
        return redirect('/home');
    }

    public static function login()
    {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $autentikasi = new Autentikasi();
        $data = $autentikasi->autentikasiClient($user);

        if ($user == $data[0]->user && $pass == $data[0]->pass)
        {   session_start();
            $_SESSION['data'] = $data[0];
            return view('page.homepage',['data' => $data]);
        }
        else
        {
            return view('page.login');
        }        
    }
    public static function sessionLogin()
    {

        if(isset($_SESSION['data']))
        {
            return redirect('/home');
        }

    }
}
?>