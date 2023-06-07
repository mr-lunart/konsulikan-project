<?php
$query = session('userSession');
?>
@extends('layouts.app')

@section('navbar')
@include('parts.navbar')
@endsection

@section('content')
<br>
<div class="container">
    <div class="card ">
        <b class="m-3"> DETAIL RIWAYAT </b>
    </div>
    <br>
    <div class="row ">
        <div class="col">
            <div class="card">
                <div class="mx-3 mt-3 text-center">
                    <div class="d-flex flex-row">
                        <div class="mx-4 mb-0 mt-0">
                            <b> RIWAYAT KONSULTASI </b>
                        </div>
                    </div>
                </div>
                <hr>
                <div class=" mx-3">
                    <div class="col m-3">
                        <p><strong>Konsultan</strong> : {{$riwayat[0]->nama}}</p>
                        <p><strong>Tarif</strong> : {{$riwayat[0]->tarif_konsultasi}}</p>
                        <p><strong>Tanggal Transaksi</strong> : {{$riwayat[0]->tanggal_transaksi}}</p>
                        <p><strong>Status Konsultasi</strong> : {{$riwayat[0]->status_konsultasi}}</p>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="d-flex flex-row">
                    <div class="mx-4 mb-0 mt-3">
                        <b> KONSULTAN </b>
                    </div>
                </div>

                <hr>
                <div class="d-flex flex-row justify-content-center">
                    <div class="card mx-3" style="width:150px; height:150px;">
                        <img src="data:image/png;base64,<?= $riwayat[0]->foto_profil ?>" alt="">
                    </div>
                    <div class="col mx-3">
                        <p><strong>Nama Konsultan</strong> : {{$riwayat[0]->nama}}</p>
                        <p><strong>Deskripsi</strong> : {{$riwayat[0]->deskripsi}}</p>
                    </div>
                </div>
                <br>
            </div>

        </div>
        <div class="col">
            <div class="card  justify-content-center" style="height: 100%;">
                <div class="d-flex flex-row">
                    <div class="mx-4 mb-2 mt-0">
                        <b> EVALUASI PANEN </b>
                    </div>
                </div>
                <hr>
                <div class="container">
                    <div class="d-flex flex-column " style="overflow-y: scroll; height:420px">
                        @foreach ($dataChat as $chat)
                        <div class="card my-1 mx-3 p-2">
                            <small><b>{{$chat->username_penerima}}</b></small>
                            <p class="m-0">{{$chat->pesan}}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
@endsection

@section('footer')
@endsection