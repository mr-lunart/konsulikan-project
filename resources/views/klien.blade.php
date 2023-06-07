<?php
$query = session('consultantSession');
$total = 0;
foreach ($pendapatan as $pms) {
    $total = $total + $pms->tarif_konsultasi;
}
$jmlTotal=0;
foreach ($riwayat as $jmlUang) {
    $jmlTotal = $jmlTotal + $jmlUang->tarif_konsultasi;
}
?>
@extends('layouts.appKonsultan')

@section('navbar')
@include('parts.navbarKonsultan')
@endsection

@section('content')
<div class="container">
    <div class="m-3">
        <br>
        <div class="card">
            <b class="fw-bolder m-3">PENDAPATAN</b>
        </div>
        <br>
        <div class="row justify-content-between">
            @if (isset($pendapatan) && count($pendapatan) > 0)
            <div class="col-4 card blue-bg text-white">
                <b class="fw-bolder mx-3 mt-3 fs-4">Pendapatan Bulan Ini</b>
                <span class="mx-3 mb-3 fs-5">IDR.{{$total}}</span>
            </div>
            <div class="col-4 card blue-bg text-white">
                <b class="fw-bolder mx-3 mt-3 fs-4">Total Pendapatan</b>
                <span class="mx-3 mb-3 fs-5">IDR.{{$jmlTotal}}</span>
            </div>
            @endif
        </div>
        <br>
        <div class="card">
            <div class="m-3">

                <div class=" m-3">
                    @foreach ($riwayat as $list)
                    <div class="border rounded mb-3 row">
                        <div class="col m-3">
                            <strong> </strong>
                            <p><strong>Konsultan</strong> : {{$list->nama}}</p>
                            <p><strong>Tarif</strong> : {{$list->tarif_konsultasi}}</p>
                            <p><strong>Tanggal Transaksi</strong> : {{$list->tanggal_transaksi}}</p>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script>
    function logoutConfirm() {
        if (confirm("Apakah Anda ingin Logout?")) {
            window.location.replace('<?= route('home.logout') ?>')
        } else {}
    }
</script>

@endsection