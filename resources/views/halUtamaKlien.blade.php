<?php
function hitungEP($row){
    $tambah = $row->{'Bobot Ikan Panen'} + $row->{'Bobot Ikan Mati'};
    $atas = $tambah - $row ->{'Bobot Ikan Awal'};
    $bawah = $atas / $row->{'Bobot Pakan'};
    return round($bawah * 100);
}

$query = session('userSession');
$formatHead = "";
$formatData = "";
if (isset($data) && count($data) > 0 ){
    foreach($data as $row) {
        $percent = hitungEP($row);
        $name = "'".$row->{'Nama Kegiatan'}."'";

        // Formating data agar menjadi struktur array dalam format string
        $formatHead = $formatHead.$name.",";
        $formatData = $formatData.$percent.",";
    }
    // menambahkan value seratus sebagai default value
    $formatData = $formatData."100";

    $formatHead = trim($formatHead,',');
    $headBar = "[".$formatHead."]";
    $dataBar = "[".$formatData."]";
}
else {
    $headBar = "";
    $dataBar = "";
}
?>

@extends('layouts.app')



@section('navbar')
    @include('parts.navbar')
@endsection

@section('content')
    <div class="container">
        <div class="m-3">
            <div class="card">
                <div class="row m-3">
                    <div class="col">
                       <b> PANDUAN PAKAN </b>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="chart-bar">
                    <canvas class="m-3" id="myChart"></canvas>
                </div>
            </div>
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
            labels: <?=$headBar?>,
            datasets: [{
                label: 'Efisiensi Pakan dalam Persen ',
                data: <?=$dataBar?>,
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
    <!-- <script type="text/javascript" src="{{ asset('js/chart-bar-demo.js') }}"></script> -->
@endsection