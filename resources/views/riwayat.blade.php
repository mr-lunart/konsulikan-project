<?php
$query = session('userSession');
?>
@extends('layouts.app')

@section('navbar')
    @include('parts.navbar')
@endsection

@section('content')
    <div class="container">
        <div class="m-3">
            <div class="card">
                <div class="m-3">
                    <div class="text-center">
                        <strong class="fs-5 fw-bold">RIWAYAT KONSULTASI</strong>
                    </div>
                    <div class=" m-3">
                    @foreach ($riwayat as $list)
                        <div class="border rounded mb-3 row">
                            <div class="m-3">
                                <strong> </strong>
                                <p><strong>Konsultan</strong> : {{$list->nama}}</p>
                                <p><strong>Tarif</strong> : {{$list->tarif_konsultasi}}</p>
                                <p><strong>Tanggal Transaksi</strong> : {{$list->tanggal_transaksi}}</p>
                                <a href="<?= route('home.riwayat.detail').'?no='.$list->konsultasi_id?>"><button class="btn btn-primary">Detail Konsultasi</button></a>
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
@endsection