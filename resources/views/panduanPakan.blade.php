<?php
$query = session('userSession');
?>
@extends('layouts.app')

@section('sidebar')
    @include('parts.sidebarKlien')
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
    <div class="container">
            <div class="m-3">
            <div class="card ">
                <div class="dflex m-3">
                    <h4>Panduan Pakan</h4>
                    <hr>
                    <form action="">
                        <div class="row">
                            <div class="form-grup col-6">
                                <strong>Jenis Ikan</strong>
                                <select class="form-select" aria-label="Default select example" name="" id="">
                                    <option value="">Lele</option>
                                    <option value="">Gurame</option>
                                </select>
                            </div>
                            <div class="form-grup col-6">
                                <strong>Umur Ikan</strong> 
                                <input class="form-control" type="email" name="umur" value="" required>
                            </div>
                        </div>
                        <br>
                        <div>
                            <button type="submit" class="btn btn-primary">Simpan Profil</button>
                        </div>
                    </form>
                </div>
                <div class="m-3">
                        <div class="card">
                            <div>
                                <h2 class="text-center m-3">Data Not Available</h2>
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