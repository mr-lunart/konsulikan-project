<?php
$query = session('userSession');
?>
@extends('layouts.app')

@section('navbar')
@include('parts.navbar')
@endsection

@section('content')
<div class="container">
    <div class="mt-5">
        <div class="card  flex-row justify-content-between">
            <div class="m-3">
                <b>EDIT EVALUASI PANEN </b>
            </div>
        </div>
        <br>
        <div class="card ">
            <div class="dflex mx-5 my-4">
                <form method="post" action="<?= route('home.panen.update') ?>">
                    @csrf
                    <div class="row">
                        <div class="col-5 mx-1">
                            <input type="hidden" name="id_hasilPanen" value="<?=$_GET["id_hasilPanen"]?>">
                            <div class="form-grup">
                                <strong>Nama Kolam</strong>
                                <input class="form-control" type="text" name="namaKolam" value="<?= $data->nama_kegiatan ?>" required>
                            </div>
                            <p></p>
                            <div class="form-grup">
                                <strong>Tanggal Tebar</strong>
                                <input class="form-control" type="date" name="tglTebar" value="<?= $data->tanggal_tebar ?>" required>
                            </div>
                            <p></p>
                            <div class="form-grup">
                                <strong>Total Berat Pakan / Kg</strong>
                                <input class="form-control" type="text" name="brtPakan" value="<?= $data->bobot_total_pakan ?>" required>
                            </div>
                            <p></p>
                            <div class="form-grup">
                                <strong>Berat Ikan Panen / Kg</strong>
                                <input class="form-control" type="text" name="brtPanen" value="<?= $data->bobot_ikan_panen ?>" required>
                            </div>
                        </div>
                        <div class="col-5 mx-1">
                            <div class="form-grup">
                                <strong>Jenis Ikan</strong>
                                <select class="form-select" aria-label="Default select example" name="ikan" id="">
                                    <option value="1" <?php if($data->jenis_ikan_id==1){print("selected");}?>>Lele</option>
                                    <option value="2" <?php if($data->jenis_ikan_id==2){print("selected");}?>>Nila</option>
                                </select>
                            </div>
                            <p></p>
                            <div class="form-grup">
                                <strong>Tanggal Panen</strong>
                                <input class="form-control" type="date" name="tglPanen" value="<?= $data->tanggal_panen ?>" required>
                            </div>
                            <p></p>
                            <div class="form-grup">
                                <strong>Berat Awal Ikan / Kg</strong>
                                <input class="form-control" type="text" name="brtAwal" value="<?= $data->bobot_ikan_awal?>" required>
                            </div>
                            <p></p>
                            <div class="form-grup">
                                <strong>Berat Ikan Mati / Kg</strong>
                                <input class="form-control" type="text" name="brtMati" value="<?= $data->bobot_ikan_mati ?>" required>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div>
                        <button type="submit" class="btn btn-primary">Submit Data</button>
                        <a class="btn btn-secondary" href="<?= route('home.panen') ?>">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">

        </div>
    </div>
</div>
<br>
<br>
<br>
@endsection

@section('footer')

@endsection