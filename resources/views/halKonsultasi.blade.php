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
            <a href=""><button class="btn btn-primary">Sesi Konsultasi</button></a>
        </div>
        <div class="m-3">
            <div class="card">
                <div class="m-3">
                    <div class="m-3">
                        <h4><strong> Konsultan</strong> </h4>
                    </div>
                    <hr>
                    <div class="">

                        <form class="d-flex" role="search" action="" method="post">
                        @csrf
                        <div class="form-grup m-2">
                            <select name="ikan" class="form-select" aria-label="Default select example" >
                                <option value="0" selected>Pilih Jenis Ikan</option>
                                <option value="lele">Lele</option>
                                <option value="gurame">Gurame</option>
                            </select>
                        </div>
                        
                        <div class="form-grup m-2">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="nama">
                        </div>
                        
                        <div class="m-2">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </div>
                        </form>
    
                    </div>

                    <div class=" m-3">
                    @foreach ($data as $konsultan)
                        <div class="border rounded mb-3 row">
                            <div class="col-1 border rounded" style="width: 150px; height: 150px;"></div>
                            <div class="col m-3">
                                <strong> {{ $konsultan->nama }} </strong>
                                <p><strong>Tarif</strong> : Rp.{{ $konsultan->tarif }}</p>
                                <p><strong>Jenis Ikan</strong> : <?= ucfirst($konsultan->ikan) ?></p>
                                <p><strong>Deskripsi</strong> : {{ $konsultan->deskripsi }}</p>
                                <a href="<?= route('home.konsultan.detail').'?no='.$konsultan->id_konsultan?>"><button class="btn btn-primary">Detai Konsultan</button></a>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
@endsection