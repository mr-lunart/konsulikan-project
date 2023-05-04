<?php
$query = session('query');
?>
@extends('layouts.homepage')

@section('sidebar')
    <div class="sidebar bg-dark text-white ">
        <br>
        <div class="fs-4 text-center"> <i><b> Konsulikan </b></i> </div>
        <hr>
        <nav class="navbar p-3">
            
            <ul class="nav nav-pills flex-column mb-auto" style="width: 250px;">
            <li class="nav-item ">
                <a href="homepage" class="nav-link active" aria-current="page">
                Dashboard
                </a>
            </li>
            <li>
                <a href="homepage/konsultan" class="nav-link link-dark text-white">
                Konsultasi
                </a>
            </li>
            <li>
                <a href="homepage/profil" class="nav-link link-dark text-white">
                Profil
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark text-white">
                Kalkulator Pakan
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark text-white">
                Riwayat
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
                <h6 class="sf-4 m-3">Selamat Datang | <b><?= $query[0] -> nama ?></b></h6>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="m-3">
            <div class="card">
                <div class="m-3 text-center">
                    <h3>Under Development</h3>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
@endsection