<?php

namespace App\Models;

use Illuminate\Database\QueryException;

class Konsultasi extends DB_HANDLER {
    
    public function getRiwayat($id_klien){

        $data = $this->DB_RIWAYAT_JOIN($id_klien);
        return($data);
    }
    public function detailRiwayat($id_konsultasi){

        $data = $this->DB_RIWAYAT_DETAIL($id_konsultasi);
        return($data);
    }
    
}