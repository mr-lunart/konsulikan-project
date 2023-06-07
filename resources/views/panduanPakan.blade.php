<?php
$query = session('userSession');

function dataIkan($param, $dataIkan)
{
    if (isset($dataIkan) && count($dataIkan) > 0) {
        switch ($param) {
            case 'jenis_ikan_id':
                $result = $dataIkan[0]->jenis_ikan_id;
                break;
            case 'umur_ikan':
                $result = $dataIkan[0]->umur_ikan + $dataIkan[0]->jarak_hari;
                break;
        }
    } else {
        $result = NULL;
    }
    return $result;
}

if (isset($panduan) && count($panduan) > 0) {
    $headPanduan = array_keys(get_object_vars($panduan[0]));
} else {
    $headPanduan = [];
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
        <div class="card">
            <div class="m-3">
                <b> PANDUAN PAKAN </b>
            </div>
        </div>
        <br>
        @if (isset($panduan)&&count($panduan) > 0)
        <div class="card p-3 blue-bg text-white">

            <div class="mx-3 mt-3">
                <h3 class="fw-bolder">Panduan Pemberian Pakan</h3>
            </div>
            <div class="m-3">
                <?= $deskripsi[0]->deskripsi_panduan ?>
            </div>

        </div>
        @endif
        <br>
        <div class="card ">
            <div class="dflex m-3">
                <form method="post" action="<?= route('home.pakan.panduan') ?>">
                    @csrf
                    <div class="row">
                        <div class="form-grup col-6">
                            <strong>Jenis Ikan</strong>
                            <select class="form-select" aria-label="Default select example" name="ikan" id="">
                                <option value="1" <?php if (dataIkan('jenis_ikan_id', $dataIkan) == '1') {
                                                        echo (" selected");
                                                    } ?>>Lele</option>
                                <option value="2" <?php if (dataIkan('jenis_ikan_id', $dataIkan) == '2') {
                                                        echo (" selected");
                                                    } ?>>Nila</option>
                            </select>
                        </div>
                        <div class="form-grup col-6">
                            <strong>Umur Ikan</strong>
                            <input class="form-control" type="text" name="umur" value="<?= dataIkan('umur_ikan', $dataIkan) ?>" required>
                        </div>
                    </div>
                    <br>
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <div class="m-3">
                <div class="card">
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    @foreach ($headPanduan as $header)
                                    <th class="text-break text-center" scope="col" style="font-size:10pt;"> <?= $header ?> </th>
                                    @endforeach
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($panduan as $row)
                                <tr>
                                    @foreach ($row as $cell)
                                    <td class="fs-6 text-break text-center" scope="col"> <?= $cell ?></td>
                                    @endforeach
                                </tr>
                                @endforeach

                                @if (isset($panduan)&&count($panduan)==0)
                                <tr>
                                    <td class="text-center" colspan="4"> Belum Memiliki Data Panduan Pakan </td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
        @if (isset($panduan)&&count($panduan) > 0)
        <div class="card">
            <div class="m-3">
                <b> PERHITUNGAN TAKARAN PAKAN </b>
            </div>
        </div>
        <br>
        <div class="card justify-content-center">
            <form class="m-3" action="">
                <div class="row">
                    <div class="form-grup col-6">
                        <strong>Rata Rata Bobot Ikan Perekor </strong>
                        <input class="form-control" type="text" name="rataBobot" required>
                    </div>
                    <div class="form-grup col-6">
                        <strong>Jumlah Ikan Perkolam</strong>
                        <input class="form-control" type="text" name="ikanKolam" required>
                    </div>
                    <div class="form-grup col-12 mt-3">
                        <strong>Dosis Pakan</strong>
                        <input class="form-control" type="text" name="dosisPakan" required>
                    </div>
                </div>
                <small>*dosis pakan dapat terlihat dari tabel diatas</small>
            </form>
            <div class="mx-3">
                <button id="hitung" class="btn btn-primary ">Hitung</button>
            </div>
            <br>
            <div class="mx-3 mb-3">
                <div class="form-grup">
                    <strong>Pakan yang Dibutuhkan / Kg per-Hari</strong>
                    <input class="form-control" type="text" name="hasilHitung" value="">
                </div>
            </div>

        </div>
        @endif
    </div>
</div>
<br>
<br>
@endsection

@section('footer')
<script>
    $(document).ready(function() {
        $('#hitung').click(function() {
            var rataBobot = parseFloat($('input[name="rataBobot"]').val());
            var ikanKolam = parseFloat($('input[name="ikanKolam"]').val());
            var dosisPakan = parseFloat($('input[name="dosisPakan"]').val());

            var hasilHitung = (dosisPakan / 100) * rataBobot * ikanKolam;

            $('input[name="hasilHitung"]').val(hasilHitung.toFixed(2));
        });
    });
</script>
@endsection