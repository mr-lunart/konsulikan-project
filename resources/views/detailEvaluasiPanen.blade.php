<?php
$query = session('userSession');
function RumusEP($row)
{
    $tambah = $row->bobot_ikan_panen + $row->bobot_ikan_mati;
    $atas = $tambah - $row->bobot_ikan_awal;
    $bawah = $atas / $row->bobot_total_pakan;
    return round($bawah * 100);
}
?>
@extends('layouts.app')

@section('sidebar')
@include('parts.sidebarKlien')
@endsection

@section('navbar')
@include('parts.navbar')
@endsection

@section('content')
<div class="container">
    <div class="mt-5">
        <div class="card  flex-row justify-content-between">
            <div class="m-3">
                <b>DETAIL EVALUASI PANEN </b>
            </div>
        </div>
        <br>
        <div class="card ">
            <div class="dflex mx-5 my-4">
                <form method="post" action="<?= route('home.panen.update') ?>">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <input type="hidden" name="id_hasilPanen" value="<?= $_GET["id_hasilPanen"] ?>">
                            <div class="form-grup">
                                <strong>Nama Kolam</strong>
                                <div class="form-control d-flex justify-content-between">
                                    <input class="border-0 bg-white" type="text" name="namaKolam" value="<?= $data->nama_kegiatan ?>" disabled>
                                </div>
                            </div>
                            <p> </p>
                            <div class="form-grup">
                                <strong>Tanggal Tebar</strong>
                                <div class="form-control d-flex justify-content-between">
                                    <input class="border-0 bg-white" type="date" name="tglTebar" value="<?= $data->tanggal_tebar ?>" disabled>
                                </div>
                            </div>
                            <p> </p>
                            <div class="form-grup">
                                <strong>Total Berat Pakan</strong>
                                <div class="form-control d-flex justify-content-between">
                                    <input class="border-0 bg-white" type="text" name="brtPakan" value="<?= $data->bobot_total_pakan ?>" disabled>
                                    <small><b>Kg</b></small>
                                </div>
                            </div>
                            <p> </p>
                            <div class="form-grup">
                                <strong>Berat Ikan Panen</strong>
                                <div class="form-control d-flex justify-content-between">
                                    <input class="border-0 bg-white" type="text" name="brtPanen" value="<?= $data->bobot_ikan_panen ?>" disabled>
                                    <small><b>Kg</b></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 ">
                            <div class="form-grup">
                                <strong>Jenis Ikan</strong> 
                                <select class="form-select" aria-label="Default select example" name="ikan" id="" disabled>
                                    <option value="1" <?php if ($data->jenis_ikan_id == 1) {
                                                            print("selected");
                                                        } ?>>Lele</option>
                                    <option value="2" <?php if ($data->jenis_ikan_id == 2) {
                                                            print("selected");
                                                        } ?>>Nila</option>
                                </select>
                            </div>
                            <p> </p>
                            <div class="form-grup">
                                <strong>Tanggal Panen</strong>
                                <div class="form-control d-flex justify-content-between">
                                    <input class="border-0 bg-white" type="date" name="tglPanen" value="<?= $data->tanggal_panen ?>" disabled>
                                </div>
                            </div>
                            <p> </p>
                            <div class="form-grup">
                                <strong>Berat Awal Ikan</strong>
                                <div class="form-control d-flex justify-content-between">
                                    <input class="border-0 bg-white" type="text" name="brtAwal" value="<?= $data->bobot_ikan_awal ?>" disabled>
                                    <small><b>Kg</b></small>
                                </div>
                            </div>
                            <p> </p>
                            <div class="form-grup">
                                <strong>Berat Ikan Mati</strong>
                                <div class="form-control d-flex justify-content-between">
                                    <input class="border-0 bg-white" type="text" name="brtMati" value="<?= $data->bobot_ikan_mati ?>" disabled>
                                    <small><b>Kg</b></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-grup">
                        <strong>Efisiensi Pakan</strong>
                        <div class="form-control d-flex justify-content-between">
                            <input class="border-0 bg-white" type="text" name="brtMati" value="<?= RumusEP($data) ?>" disabled>
                            <small><b>%</b></small>
                        </div>
                    </div>
                    <br>
                    <div>
                        <a class="btn btn-primary" href="<?= route('home.panen') ?>">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<br>
@endsection

@section('footer')

@endsection