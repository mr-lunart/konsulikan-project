<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class DB_HANDLER
{

    public static function DB_READ($tabel, $select, $where)
    {
        $query = DB::select("select ". $select ." from ". $tabel ." where ".$where);
        return($query);
    }

    public static function DB_JOIN($tabelAwal,$select,$join,$where)
    {
        $query = DB::select(" SELECT ".$select." FROM ".$tabelAwal." ".$join." "." WHERE ".$where);
        return $query;
    }
    
    public static function DB_READ_WHERE($tabel, $select, $where)
    {
        $query = DB::select("select ". $select ." from ". $tabel ." where ". $where );
        return($query);
    }
    
    public static function DB_READ_ALL($tabel)
    {
        $query = DB::select("select * from ". $tabel);
        return($query);
    }

    public static function DB_CREATE($tabel, $data, $kolom)
    {
        $query = DB::insert("insert into ". $tabel ."(".$kolom.") VALUES (". $data .")");
        return($query);
    }
    
    public static function DB_UPDATE($tabel, $kolom, $where)
    { 
        $query = DB::update("update ". $tabel ." SET ". $kolom ." WHERE ". $where);
        return($query);
    }
    
    public static function DB_DELETE($sesi)
    {
        $query = DB::delete("DELETE FROM `session` WHERE `session_id` = ".$sesi);
    }
    public static function DB_RIWAYAT_JOIN($id)
    {
        $query = DB::select("
        SELECT riwayat.konsultasi_id, konsultasi.tanggal_transaksi,konsultasi.tarif_konsultasi, akun_konsultan.nama, jenis_ikan.jenis_ikan
        FROM riwayat
        LEFT JOIN konsultasi ON riwayat.konsultasi_id = konsultasi.id_konsultasi
        LEFT JOIN akun_konsultan ON konsultasi.konsultan_id = akun_konsultan.id_konsultan
        LEFT JOIN jenis_ikan ON konsultasi.jenis_ikan_id = jenis_ikan.id_jenis_ikan
        WHERE riwayat.status_konsultasi ='selesai' AND konsultasi.klien_id = ".$id.";
        ");
        return $query;
    }
    public static function DB_KLIEN_JOIN($id){
        $query = DB::select("
        SELECT klien.konsultasi_id, konsultasi.tanggal_transaksi,konsultasi.tarif_konsultasi, akun_klien.nama, jenis_ikan.jenis_ikan
        FROM klien
        LEFT JOIN konsultasi ON klien.konsultasi_id = konsultasi.id_konsultasi
        LEFT JOIN akun_klien ON konsultasi.klien_id = akun_klien.id_klien
        LEFT JOIN jenis_ikan ON konsultasi.jenis_ikan_id = jenis_ikan.id_jenis_ikan
        WHERE konsultasi.konsultan_id = ".$id.";
        ");
        return $query;
    }
    public static function DB_RIWAYAT_DETAIl($id)
    {
        $query = DB::select("
        SELECT riwayat.konsultasi_id, konsultasi.tanggal_transaksi,konsultasi.tarif_konsultasi, akun_konsultan.nama, jenis_ikan.jenis_ikan, riwayat.status_konsultasi, akun_konsultan.deskripsi, akun_konsultan.foto_profil
        FROM riwayat
        LEFT JOIN konsultasi ON riwayat.konsultasi_id = konsultasi.id_konsultasi
        LEFT JOIN akun_konsultan ON konsultasi.konsultan_id = akun_konsultan.id_konsultan
        LEFT JOIN jenis_ikan ON konsultasi.jenis_ikan_id = jenis_ikan.id_jenis_ikan
        WHERE konsultasi.id_konsultasi = ".$id.";
        ");
        return $query;
    }
    public static function DB_KLIEN_DETAIl($id)
    {
        $query = DB::select("
        SELECT klien.konsultasi_id, konsultasi.tanggal_transaksi,konsultasi.tarif_konsultasi, akun_klien.nama, jenis_ikan.jenis_ikan
        FROM klien
        LEFT JOIN konsultasi ON klien.konsultasi_id = konsultasi.id_konsultasi
        LEFT JOIN akun_klien ON konsultasi.klien_id = akun_klien.id_klien
        LEFT JOIN jenis_ikan ON konsultasi.jenis_ikan_id = jenis_ikan.id_jenis_ikan
        WHERE konsultasi.id_konsultasi = ".$id.";
        ");
        return $query;
    }
}

?>