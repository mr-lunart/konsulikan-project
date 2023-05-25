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
    <div class="m-3">
            <div class="card ">
                <div class="dflex m-3">
                    <h4>Detail Konsultan</h4>
                    <hr>
                    <div class="d-flex flex-row">
                        <div class="d-flex flex-column">
                            <p><strong>Nama</strong></p>
                            <p><strong>Jenis Ikan</strong></p>
                            <p><strong>Tarif Konsultasi</strong></p>
                            <p><strong>Deskripsi</strong></p>
                        </div>
                        <div class=" px-2">
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                        </div>
                        <div class="d-flex flex-column">
                            <p><?=($konsultan[0] -> nama)?></p>
                            <p><?=( ucfirst($konsultan[0] -> ikan) )?></p>
                            <p><?= 'IDR '.number_format(floatval($konsultan[0] -> tarif),0,'.','.')?></p>
                            <p><?=($konsultan[0] -> deskripsi)?></p>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <a href="<?=route('dashboard.profil.form')?>"><button class="btn btn-primary">Buat Sesi</button></a>
                        <button onclick="CancelConfirm()" class="btn btn-danger"> Cancel </button>
                    </div>
                </div>
            </div>
            </div>
    </div>
@endsection

@section('footer')
    <script>
        function CancelConfirm(){
            window.location.replace('<?= route('home.konsultasi') ?>')
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
@endsection