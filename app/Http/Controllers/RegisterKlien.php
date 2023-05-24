<?php
// Fixed
namespace App\Http\Controllers;

use App\Models\DataAkunKlien;
use Illuminate\Database\QueryException;

class RegisterKlien extends Controller
{
    public function setRegistrasiKlien() {
        return view('registerKlien');
    }

    public function daftar() {
        $no = 0;
        $nama = $_POST['nama'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $noHP = $_POST['noHP'];
        $email = $_POST['email'];
        $kolom = "`id_klien`, `nama`, `user`, `pass`, `email`, `noHP`";
        $data = $no .",'" .$nama. "','" .$user. "','" .$pass. "','" .$email. "','" .$noHP. "'";
        $akun = new DataAkunKlien();
        try{
            $query = $akun->createDataAkun($data, $kolom);
            $hasil = true;

        } catch(QueryException $e) {
            $query = $e -> getMessage();
            $hasil = false;
        }

        // if( $hasil == true ) {
        //     $akun->updateAkunUID($user);
        // }
        return redirect() -> route( 'setRegister' ) -> with( ['hasil' => $hasil] );
    }
}