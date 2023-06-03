<?php
$query = session('consultantSession');
?>
@extends('layouts.appKonsultan')

@section('sidebar')
    @include('parts.sidebarKonsultan')
@endsection

@section('navbar')
    @include('parts.navbarKonsultan')
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
                            <div class="col m-3">
                                <strong> </strong>
                                <p><strong>Konsultan</strong> : {{$list->nama}}</p>
                                <p><strong>Tarif</strong> : {{$list->tarif_konsultasi}}</p>
                                <p><strong>Tanggal Transaksi</strong> : {{$list->tanggal_transaksi}}</p>
                                <a href="<?= route('dashboard.klien.detail').'?no='.$list->konsultasi_id?>"><button class="btn btn-primary">Detail Konsultasi</button></a>
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
        function logoutConfirm(){
            if(confirm("Apakah Anda ingin Logout?")){
                window.location.replace('<?= route('home.logout') ?>')
            }
            else{}
        }
    </script>
   
@endsection