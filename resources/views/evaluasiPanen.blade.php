<?php

$query = session('userSession');

$index = 0;

if (isset($display) && count($display) > 0) {
    $head = clone $display[0];
    unset($head->id_hasilPanen);
    $headTabel = array_keys(get_object_vars($head));
} else {
    $headTabel = [];
}

$formatHead = "";
$formatData = "";
$i = 0;
if (isset($display) && count($display) > 0) {
    foreach ($display as $row) {
        $percent = $ep[$i];
        $i = $i + 1;
        $name = "'" . $row->{'Nama Kegiatan'} . "'";

        // Formating data agar menjadi struktur array dalam format string
        $formatHead = $formatHead . $name . ",";
        $formatData = $formatData . $percent . ",";
    }
    // menambahkan value seratus sebagai default value
    $formatData = $formatData . "100";

    $formatHead = trim($formatHead, ',');
    $headBar = "[" . $formatHead . "]";
    $dataBar = "[" . $formatData . "]";
} else {
    $headBar = "";
    $dataBar = "";
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
                <b> EVALUASI PANEN </b>
            </div>
            <a href="<?= route('home.panen.tambah') ?>"> <button class="btn btn-primary m-3">Tambah Data</button></a>
        </div>
        <br>
        <div class="card">
            <div class="">
                <table class="table">
                    <thead>
                        <tr>
                            @if (isset($display)&&count($display)>0)
                            @foreach ($headTabel as $header)
                            <th class="text-break text-center" scope="col" style="font-size:10pt;"> <?= $header ?> </th>
                            @endforeach
                            <th class="text-break text-center" scope="col" style="font-size:10pt;"> Efisiensi Pakan </th>
                            <th class="text-break text-center" scope="col" style="font-size:10pt;"> Edit </th>
                            <th class="text-break text-center" scope="col" style="font-size:10pt;"> Detail </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($display as $row)
                        @php
                        $id_hasil = $row->id_hasilPanen;
                        unset($row->id_hasilPanen);
                        @endphp
                        <tr class="">
                            @foreach ($row as $cell)
                            <td class="text-break text-center" scope="col"> <?= $cell ?></td>
                            @endforeach
                            <td class="text-break text-center" scope="col">
                                <?php
                                print($ep[$index]);
                                $index = $index + 1;
                                ?>
                                %
                            </td>
                            <td class="text-break text-center" scope="col">
                                <a href="<?= route('home.panen.edit') . "/?id_hasilPanen=" . $id_hasil ?>">
                                    <i class="fa-solid fa-pen-to-square" style="color: #05338D;"></i>
                                </a>
                            </td>
                            <td class="text-break text-center" scope="col">
                                <a href="<?= route('home.panen.detail') . "/?id_hasilPanen=" . $id_hasil ?>">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                        @if (isset($data)&&count($data)==0)
                        <tr>
                            <td class="text-center" colspan="4"> Belum Memiliki Data Evaluasi Panen </td>
                        </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="card p-3 blue-bg text-white">

            <div class="mx-3 mt-3">
                <h3 class="fw-bolder">Apa Itu Efisiensi Pakan?</h3>
            </div>
            <div class="m-3">
                Efisiensi pakan adalah perbandingan antara pertambahan bobot ikan dengan jumlah pakan yang habis selama masa pemeliharaan tertentu yang dinyatakan dalam persen. Efisiensi pakan menunjukan presentasi pakan yang diubah menjadi pertambahan bobot. Pakan dapat dikatakan baik bila nilai efisiensi pemberian pakan lebih dari 50% atau bahkan mendekati 100% (Craig dan helfrich, 2002).
               <b>Anda dapat berkonsultasi pada pakar yang tersedia dalam penyelesaian permasalah efisiensi pakan ikan budidaya Anda</b>
            </div>

        </div>
        <br>
        <div class="card">
            <div class="chart-bar">
                <canvas class="m-3" id="myChart"></canvas>
            </div>
        </div>
        <br>
        <br>
    </div>
</div>
@endsection

@section('footer')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= $headBar ?>,
            datasets: [{
                label: 'Efisiensi Pakan dalam Persen ',
                data: <?= $dataBar ?>,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection