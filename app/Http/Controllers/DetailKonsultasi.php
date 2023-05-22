<?php
namespace App\Http\Controllers;

use App\Models\DataAkunKonsultan;

class DetailKonsultasi extends Controller

{
    public function detailKonsultan() {
        $konsultan = new DataAkunKonsultan();
        $data = $konsultan -> getDeksripsiKonsultan($_GET['no']);
        return $this -> setdetailKonsultan($data);
    }

    public function setdetailKonsultan($data) {
        return view('detailKonsultan',['konsultan'=>$data]);
    }
}
?>