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
        <div class="row justify-content-center">
            <div class="col-11">
                <div class="mt-3">
                    <div class="">
                        <div class="m-3">
                            
                            <div class="row">
                                <div class="col-4 align-self-center">
                                    <strong class="display-6 fs-3 fw-bold">Daftar Konsultan</strong>
                                </div>
                                <div class="col-8 align-self-center">
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
                                        <button class="btn btn-success" type="submit">Search</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <hr>

                            <div class=" m-3">
                            @foreach ($data as $konsultan)
                                <div class="row border rounded my-3 p-2">
                                    <div class="col-2 border rounded align-self-center" style="width: 150px; height:150px;"></div>
                                    <div class="col-8 align-self-center ">
                                        <p class="fs-5 "> {{ $konsultan->nama }} </p>
                                        <div class="d-flex flex-column ">
                                            <div class="d-flex flex-row">
                                                <table>
                                                    <tr>
                                                        <td><b class="flex-fill">Jenis Ikan</b></td>
                                                        <td>: <?= ucfirst($konsultan->ikan) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b class="flex-fill">Tarif</b></td>
                                                        <td>: Rp.{{ $konsultan->tarif }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b class="flex-fill">Deskripsi</b></td>
                                                        <td>: {{ $konsultan->deskripsi }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col m-3 align-self-end ">
                                        <a href="<?= route('home.konsultan.detail').'?no='.$konsultan->id_konsultan?>">
                                            <button class="btn btn-primary">Detail</button>
                                        </a>
                                    </div>
                                    
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="">
            </div>

        </div>
    </div>
@endsection

@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
@endsection