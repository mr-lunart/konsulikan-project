<?php
namespace App\Http\Controllers;

use App\Models\DataAkunKlien;

use Illuminate\Support\Facades\Session;

class ProfilKlien extends Controller
{ 
    
    public function profilKlien(){
        $session = session('userSession');
        if(isset($session)) {
            return view('profilKlien');
        } 
        
    }
    public function setPerubahanFormAkun() {
        return view('editProfilKlien');
    }
    public function simpan() {
        $akun = new DataAkunKlien();
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $noHP = $_POST['noHP'];
        $id = session('userSession')[0] -> id_klien;
        $data = $_POST;
        $hasil = $akun->updateDataAkunKlien($data,$id);
        return redirect()->route('profil.form') 
            -> with(['data' => $data]) 
            -> with(['hasil' => $hasil]);
    }

    public function logout() {
        Session::flush();
        Session::save();
        header("Location:".route('login'));
        exit();
    }
    // public function daftar(){
    //     return view('page.daftar');
    // }
    // public function signup(){
    //     $no = 0;
    //     $nama = $_POST['nama'];
    //     $user = $_POST['user'];
    //     $pass = $_POST['pass'];
    //     $noHP = $_POST['noHP'];
    //     $email = $_POST['email'];
    //     $kolom = "`no`, `nama`, `user`, `pass`, `email`, `noHP`";
    //     $data = $no .",'" .$nama. "','" .$user. "','" .$pass. "','" .$email. "','" .$noHP. "'";
    //     $akun = new AkunHandler();
    //     try{
    //         $query = $akun->setAkun($data, $kolom);
    //         $hasil = true;

    //     } catch(QueryException $e) {
    //         $query = $e -> getMessage();
    //         $hasil = false;
    //     }

    //     if($hasil==true)
    //     {
    //         $akun->updateUID($user);
    //     }

    //     return view('page.daftar', ['query' => $query, 'hasil' => $hasil]);

    // }
    // public function update(){
    //     return view('profil-update');
    // }
    // public function profilUpdate(){

    //     $akun = new AkunHandler();
    //     $nama = $_POST['nama'];
    //     $email = $_POST['email'];
    //     $noHP = $_POST['noHP'];
    //     $data = $_POST;
    //     $user = session('query')[0]->user;
    //     $kolom = "`nama`='".$nama."',`email`='".$email."',`noHP`='".$noHP."'";
    //     $where = "user ='".$user."'";
    //     try{

    //         $query = $akun->DB_UPDATE('client',$kolom,$where);
    //         $hasil = true;

    //     } catch(QueryException $e) {
    //         $query = $e -> getMessage();
    //         $hasil = false;
    //     }
    //     return view('profil-update', ['data' => $data, 'hasil' => $hasil]);
    // }
    // public function profilUpdatePassword(){
    //     $passChange = 0;
    //     $akun = new AkunHandler();
    //     $user = session('query')[0]->user;
    //     $oldPass = $_POST['oldPass'];
    //     $newPass = $_POST['newPass'];
    //     $ReNewPass = $_POST['ReNewPass'];
    //     $kolom = "`pass`='".$newPass."'";
    //     $where = "user ='".$user."'";
    //     if($oldPass == session('query')[0]->pass){
    //         $passChange += 1;   
    //     }
    //     elseif($oldPass != session('query')[0]->pass)
    //     {
    //         return view('profil-update', ['pass' => $passChange]);
    //     }

    //     if($newPass == $ReNewPass){
    //         $passChange += 1;
    //     }
    //     elseif($newPass != $ReNewPass)
    //     {
    //         return view('profil-update', ['pass' => $passChange]);
    //     }

    //     if($passChange==2){

    //         try{

    //             $query = $akun->DB_UPDATE('client',$kolom,$where);
    //             $hasil = true;
    
    //         } catch(QueryException $e) {
    //             $query = $e -> getMessage();
    //             $hasil = false;
    //         }
    //         return view('profil-update', ['pass' => $query]);

    //     }
        
    //     echo($passChange);

        
    // }

    // public function dashboardProfil(){
    //     return view('profilKonsultanUpdate');
    // }

    // public function dashboardProfilUpdate(){
    //     $akun = new AkunHandler();
    //     $nama = $_POST['nama'];
    //     $email = $_POST['email'];
    //     $noHP = $_POST['noHP'];
    //     $ikan = $_POST['ikan'];
    //     $tarif = $_POST['tarif'];
    //     $desk = $_POST['deskripsi'];
    //     $data = $_POST;
    //     $user = session('query')[0]->user;
    //     $kolom = "`nama`='".$nama."',`email`='".$email."',`telephone`='".$noHP."',`ikan`='".$ikan."',`tarif`='".$tarif."',`deskripsi`='".$desk."'";
    //     $where = "user ='".$user."'";
    //     try{

    //         $query = $akun->DB_UPDATE('consultant',$kolom,$where);
    //         $hasil = true;

    //     } catch(QueryException $e) {
    //         $query = $e -> getMessage();
    //         $hasil = false;
    //     }
    //     return view('profilKonsultanUpdate', ['data' => $data, 'hasil' => $hasil]);
    // }

    // public function dashboardProfilUpdatePassword(){
    //     $passChange = 0;
    //     $akun = new AkunHandler();
    //     $user = session('query')[0]->user;
    //     $oldPass = $_POST['oldPass'];
    //     $newPass = $_POST['newPass'];
    //     $ReNewPass = $_POST['ReNewPass'];
    //     $kolom = "`pass`='".$newPass."'";
    //     $where = "user ='".$user."'";
    //     if($oldPass == session('query')[0]->pass){
    //         $passChange += 1;   
    //     }
    //     elseif($oldPass != session('query')[0]->pass)
    //     {
    //         return view('profilKonsultanUpdate', ['pass' => $oldPass]);
    //     }

    //     if($newPass == $ReNewPass){
    //         $passChange += 1;
    //     }
    //     elseif($newPass != $ReNewPass)
    //     {
    //         return view('profilKonsultanUpdate', ['pass' => $passChange]);
    //     }

    //     if($passChange==2){

    //         try{

    //             $query = $akun->DB_UPDATE('client',$kolom,$where);
    //             $hasil = true;
    
    //         } catch(QueryException $e) {
    //             $query = $e -> getMessage();
    //             $hasil = false;
    //         }
    //         return view('profilKonsultanUpdate', ['pass' => $query]);

    //     }

    // }
}
?>