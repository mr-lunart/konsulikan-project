<?php
// Fixed
namespace App\Http\Controllers;

use App\Models\DataAkunKlien;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;


class LoginKlien extends Controller
{
    public function clientForm() {
        return view('loginKlien');
    }
    public function login() {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $autentikasi = new DataAkunKlien();
        
        try {
            $query = $autentikasi->getDataAkunKlien( $user );
            if( count( $query ) > 0 ) {

                if ($user == $query[0]->user && $pass == $query[0]->pass) {
                    
                    unset($query[0]->pass,$query[0]->user);
                    Session::put('userSession', $query);
                    Session::save();
                    
                    return redirect() -> route('home');
                }
                else {

                }
            }
        }

        catch( QueryException $e ){
            $query = $e;
        }

        $status = true;
        return redirect() -> route('login') -> with( ['status' => $status] );  
         
    }
}