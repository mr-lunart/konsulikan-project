<?php
namespace App\Http\Controllers;

use App\Models\AkunHandler;
use Illuminate\Database\QueryException;

class Akun extends Controller
{
    public function daftar()
    {
        return view('page.daftar');
    }
    public function signup()
    {
        $no = 0;
        $nama = $_POST['nama'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $kolom = "`no`, `nama`, `user`, `pass`";
        $data = $no .",'" .$nama. "','" .$user. "','" .$pass. "'";
        $akun = new AkunHandler();
        try{
            $query = $akun->setAkun($data, $kolom);
            $hasil = true;

        } catch(QueryException $e) {
            $query = $e -> getMessage();
            $hasil = false;
        }

        return view('page.daftar', ['query' => $query, 'hasil' => $hasil]);
    }

    public function profil()
    {
        
    }
}
?>