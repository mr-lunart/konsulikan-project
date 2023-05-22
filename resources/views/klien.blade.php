<?php
$query = session('consultantSession');
?>
@extends('layouts.app')

@section('sidebar')
    <div class="sidebar bg-dark text-white ">
        <br>
        <div class="fs-4 text-center"> <i><b> Konsulikan </b></i> </div>
        <hr>
        <nav class="navbar p-3">
            <ul class="nav nav-pills flex-column mb-auto" style="width: 250px;">
                <li class="nav-item ">
                    <a href="<?=route('dashboard')?>" class="nav-link active" aria-current="page">
                    Dashboard
                    </a>
                </li>
                <li>
                    <a href="<?=route('dashboard.profil')?>" class="nav-link link-dark text-white">
                    Profil
                    </a>
                </li>
                <li>
                <a href="#" class="nav-link link-dark text-white">
                    Chat
                    </a>
                </li>
                <li>
                    <a href="<?=route('dashboard.klien')?>" class="nav-link link-dark text-white">
                    Klien
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endsection

@section('navbar')
    <div class="bg-dark text-white">
        <ul class="nav justify-content-end ">
            <li class="nav-item">
                <h6 class="sf-4 m-3">Selamat Datang, <b><?= $query[0] -> nama ?></b></h6>
            </li>
        </ul>
    </div>
@endsection

@section('content')
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
@endsection