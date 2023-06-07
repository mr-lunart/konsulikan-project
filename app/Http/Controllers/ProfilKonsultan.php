<?php
namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use App\Models\DataAkunKonsultan;

class ProfilKonsultan extends Controller {

    public function profilKonsultan(){
        $session = session('consultantSession');
        if(isset($session)) {
            return view('profilKonsultan');
        } 
        
    }
    public function setPerubahanFormAkun() {
        return view('editProfilKonsultan');
    }

    public function logout() {
        Session::flush();
        Session::save();
        header("Location:".route('front'));
        exit();
    }

    public function sendDataAkun() {
        $akun = new DataAkunKonsultan;
        $data = $_POST;
        $id = session('consultantSession')[0] -> id_konsultan;
        $data = $_POST;
        $hasil = $akun->updateDataAkunKonsultan($data,$id);
        $data = $akun->getKonsultanData($id);
        print($hasil);
        return redirect()->route('dashboard.profil.form') 
            -> with(['data' => $data]) 
            -> with(['hasil' => $hasil]);
    }
    public function setUbahFormPassword() {
        return view('editPasswordKonsultan');
    }
    public function ubahPassword() {
        $post = $_POST;
        $pass = $post['passBaru'];
        $akun = new DataAkunKonsultan();
        $id = session('consultantSession')[0] -> id_konsultan;
        try {
            $query = $akun->getPassword( $id );
            if( count( $query ) > 0 ) {

                if ($post["passLama"] == $query[0]->pass) {
                    $update = $akun -> updatePassword( $id, $pass );
                    var_dump($update);
                    $status = true;
                    return redirect() -> route('dashboard.password') -> with( ['status' => $status] );  
                }
                else {

                }
            }
        }

        catch( QueryException $e ){
            $query = $e;
        }

        $status = false;
        return redirect() -> route('dashboard.password') -> with( ['status' => $status] );  
         
    }
}

?>