<?php
$query = session('userSession');
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
                <b>TAMBAH EVALUASI PANEN </b>
            </div>
        </div>
        <br>
        <div class="card ">
            <div class="dflex mx-5 my-4">
                <form method="post" action="<?= route('home.ep') ?>">
                    @csrf
                    <div class="row">
                        <div class="col-5 mx-1">
                            <div class="form-grup">
                                <strong>Nama Kolam</strong>
                                <input class="form-control" type="text" name="namaKolam" value="" required>
                            </div>
                            <p></p>
                            <div class="form-grup">
                                <strong>Tanggal Tebar</strong>
                                <input class="form-control" type="date" name="tglTebar" value="" required>
                            </div>
                            <p></p>
                            <div class="form-grup">
                                <strong>Total Berat Pakan / Kg</strong>
                                <input class="form-control" type="text" name="brtPakan" value="" required>
                            </div>
                            <p></p>
                            <div class="form-grup">
                                <strong>Berat Ikan Panen / Kg</strong>
                                <input class="form-control" type="text" name="brtPanen" value="" required>
                            </div>
                        </div>
                        <div class="col-5 mx-1">
                            <div class="form-grup">
                                <strong>Jenis Ikan</strong>
                                <select class="form-select" aria-label="Default select example" name="ikan" id="">
                                    <option value="1">Lele</option>
                                    <option value="2">Nila</option>
                                </select>
                            </div>
                            <p></p>
                            <div class="form-grup">
                                <strong>Tanggal Panen</strong>
                                <input class="form-control" type="date" name="tglPanen" value="" required>
                            </div>
                            <p></p>
                            <div class="form-grup">
                                <strong>Berat Awal Ikan / Kg</strong>
                                <input class="form-control" type="text" name="brtAwal" value="" required>
                            </div>
                            <p></p>
                            <div class="form-grup">
                                <strong>Berat Ikan Mati / Kg</strong>
                                <input class="form-control" type="text" name="brtMati" value="" required>
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
    </div>
</div>
<br>
<br>
@endsection

@section('footer')

@endsection