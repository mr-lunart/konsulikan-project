<?php
$query = session('consultantSession');
?>
@extends('layouts.app')

@section('sidebar')
    @include('parts.sidebarKonsultan')
@endsection

@section('navbar')
    @include('parts.navbarKonsultan')
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
                            <p><strong>Nama Klien</strong> : {{$riwayat[0]->nama_klien}}</p>
                            <p><strong>Nama Konsultan</strong> : {{$riwayat[0]->nama_konsultan}}</p>
                            <p><strong>Tanggal Transaksi</strong> : {{$riwayat[0]->tanggal_transaksi}}</p>
                            <p><strong>Status Konsultasi</strong> : {{$riwayat[0]->status_transaksi}}</p>
                            
                        </div>
                    </div>
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
                    <div style="overflow-y: scroll ; height:400px;">
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
@endsection