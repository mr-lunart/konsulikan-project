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
            <div class="card ">
                <div class="dflex m-3">
                    <h4>Data Profil</h4>
                    <hr>
                    <div class="d-flex flex-row">
                        <div class="d-flex flex-column">
                            <p><strong>Nama</strong></p>
                            <p><strong>Email</strong></p>
                            <p><strong>No Handphone</strong></p>
                            <p><strong>Jenis Ikan</strong></p>
                            <p><strong>Tarif Konsultasi</strong></p>
                            <p><strong>Deskripsi</strong></p>
                        </div>
                        <div class=" px-2">
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                            <p>:</p>
                        </div>
                        <div class="d-flex flex-column">
                            <p><?=($query[0] -> nama)?></p>
                            <p><?=($query[0] -> email)?></p>
                            <p><?=($query[0] -> telephone)?></p>
                            <p><?=( ucfirst($query[0] -> jenis_ikan) )?></p>
                            <p><?= 'IDR '.number_format(floatval($query[0] -> tarif),0,'.','.')?></p>
                            <p><?=($query[0] -> deskripsi)?></p>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <a href="<?=route('dashboard.profil.form')?>"><button class="btn btn-primary">Edit</button></a>
                        <button onclick="logoutConfirm()" class="btn btn-danger"> Logout </button>
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
                window.location.replace('<?= route('dashboard.logout') ?>')
            }
            else{}
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
@endsection