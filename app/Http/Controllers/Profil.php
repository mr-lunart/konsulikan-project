<?php
namespace App\Http\Controllers;

use App\Models\AkunHandler;
use Illuminate\Database\QueryException;

class Profil extends Controller
{
    public function daftar(){
        return view('page.daftar');
    }
    public function signup(){
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
    public function update(){
        return view('profil-update');
    }
    public function profilUpdate(){
        $akun = new AkunHandler();
        $data = $_POST;
        $kolom = "`nama`= " . "'".$data['nama']."'";
        $where = "user = 'Hamid'";
        try{

            $query = $akun->DB_UPDATE('client',$kolom,$where);
            $hasil = true;

        } catch(QueryException $e) {
            $query = $e -> getMessage();
            $hasil = false;
        }
        return view('profil-update', ['data' => $data, 'hasil' => $hasil]);
    }
}
?>