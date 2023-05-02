<?php
$query = session('query');
?>
@extends('layouts.homepage')

@section('navbar')
    <nav class="navbar">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
            <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">Sidebar</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link active" aria-current="page">
                    Home
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                    Dashboard
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                    Orders
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                    Products
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                    Customers
                    </a>
                </li>
            </ul>
        </div>
    </nav>
@endsection

@section('content')
    <div class="m-3">
        <h3>Selamat Datang <?php echo( $query[0] -> nama ) ?> </h3>
        <a href="homepage/profil"><button class="btn btn-primary"> Profil </button></a>
        <a href="homepage/konsultan"><button class="btn btn-warning"> Konsultasi </button></a>
        <button onclick="logoutConfirm()" class="btn btn-danger"> Logout </button>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
@endsection