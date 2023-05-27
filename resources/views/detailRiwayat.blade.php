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
        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <div class="mx-3 mt-3 text-center">
                        <div class="text-center">
                            <strong class="fs-5 fw-bold">RIWAYAT KONSULTASI</strong>
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
                    <div class="mt-3 text-center">
                        <div class="text-center">
                            <strong class="fs-5 fw-bold">KONSULTAN</strong>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex flex-row justify-content-center">
                        <div class="card mx-3" style="width:150px; height:150px;">
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
                <div class="card" style="height: 100%;">
                    <div class="mt-3 text-center">
                        <div class="text-center">
                            <strong class="fs-5 fw-bold">RIWAYAT CHAT</strong>
                        </div>
                    </div>
                    <hr>
                    <div style="overflow-y: scroll;">
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
@endsection

@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
@endsection