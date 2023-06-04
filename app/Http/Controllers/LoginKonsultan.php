<?php
// Fixed
namespace App\Http\Controllers;

use App\Models\DataAkunKonsultan;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;


class LoginKonsultan extends Controller
{
    public function setFormloginKonsultan() {
        return view('loginKonsultan');
    }
    public function login() {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $autentikasi = new DataAkunKonsultan();
        
        try {
            $query = $autentikasi -> getDataAkunKonsultan( $user );
            if( count( $query ) > 0 ) {

                if ($user == $query[0]->user && $pass == $query[0]->pass) {
                    
                    unset($query[0]->pass,$query[0]->user);
                    Session::put('consultantSession', $query);
                    Session::save();
                    return redirect() -> route('dashboard');
                }
                else {

                }
            }
        }

        catch( QueryException $e ){
            $query = $e;
        }

        $status = true;
        return redirect() -> route('con.login') -> with( ['status' => $status] );  
         
    }
}