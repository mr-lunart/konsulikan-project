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
        $noHP = $_POST['noHP'];
        $email = $_POST['email'];
        $kolom = "`no`, `nama`, `user`, `pass`, `email`, `noHP`";
        $data = $no .",'" .$nama. "','" .$user. "','" .$pass. "','" .$email. "','" .$noHP. "'";
        $akun = new AkunHandler();
        try{
            $query = $akun->setAkun($data, $kolom);
            $hasil = true;

        } catch(QueryException $e) {
            $query = $e -> getMessage();
            $hasil = false;
        }

        if($hasil==true)
        {
            $akun->updateUID($user);
        }

        return view('page.daftar', ['query' => $query, 'hasil' => $hasil]);

    }
    public function update(){
        return view('profil-update');
    }
    public function profilUpdate(){
        $akun = new AkunHandler();
        $data = $_POST;
        $user = session('query')[0]->user;
        $kolom = "`nama`= " . "'".$data['nama']."'";
        $where = "user ='".$user."'";
        try{

            $query = $akun->DB_UPDATE('client',$kolom,$where);
            $hasil = true;

        } catch(QueryException $e) {
            $query = $e -> getMessage();
            $hasil = false;
        }
        return view('profil-update', ['data' => $data, 'hasil' => $hasil]);
    }

    public function dashboardProfil(){
        return view('profilKonsultanUpdate');
    }

    public function dashboardProfilUpdate(){
        $akun = new AkunHandler();
        $data = $_POST;
        $user = session('query')[0]->user;
        $kolom = "`nama`= " . "'".$data['nama']."'";
        $where = "user ='".$user."'";
        try{

            $query = $akun->DB_UPDATE('consultant',$kolom,$where);
            $hasil = true;

        } catch(QueryException $e) {
            $query = $e -> getMessage();
            $hasil = false;
        }
        return view('profil-update', ['data' => $data, 'hasil' => $hasil]);
    }
}
?>