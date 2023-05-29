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
<div class="container bg-white">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="mt-3">
                <div class="">
                    <div class="m-3">

                        <div class="row justify-content-between">

                            <div class="col align-self-center">
                                <div class="">
                                    <strong class="fs-5 fw-bold">LIST KONSULTAN</strong>
                                </div>
                            </div>

                            <div class="col-7">
                                <form class="d-flex" role="search" action="" method="post">
                                    @csrf

                                    <div class="form-grup m-2 flex-fill">
                                        <select name="ikan" class="form-select" aria-label="Default select example">
                                            <option value="0" selected>Pilih Jenis Ikan</option>
                                            <option value="lele">Lele</option>
                                        </select>
                                    </div>
                                    <div class="form-grup m-2 flex-fill">
                                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="nama" required>
                                    </div>
                                    <div class="m-2 flex-fill">
                                        <button class="btn btn-success" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if(isset($sesi))
                        <hr>
                            @foreach ($sesi as $baris)
                            <div class="card">
                                <div class="m-3">
                                    <div class="d-flex flex-row">
                                        <div class="flex-fill m-auto">
                                            <b>SESI CHAT</b>
                                        </div>
                                        <div class="flex-fill m-auto text-center">
                                            <small>Konsultan</small>
                                            <p>{{$baris->nama_konsultan}}</p>
                                        </div>
                                        <div class="flex-fill m-auto text-center">
                                            <small>Klien</small>
                                            <p>{{$baris->nama_klien}}</p>
                                        </div>
                                        <div class="flex-fill m-auto text-center">
                                            <form action="<?=route('homepage.chat')?>" method="post">
                                            @csrf
                                                <button class="btn btn-primary px-4 fs-5">Chat</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                        
                        <hr>
                        <div class=" m-3">
                            @foreach ($data as $konsultan)
                            <div onclick="window.location.href = '<?= route('home.konsultan.detail') . '?no=' . $konsultan->id_konsultan ?>' ">
                                <div class="konsultan-item row border rounded my-3 p-2">
                                    <div class="col-2 border rounded align-self-center" style="width: 150px; height:150px;"></div>
                                    <div class="col-8 align-self-center ">
                                        <p class="fs-5 "> {{ $konsultan->nama }} </p>
                                        <div class="d-flex flex-column ">
                                            <div class="d-flex flex-row">
                                                <table>
                                                    <tr>
                                                        <td><b class="flex-fill">Jenis Ikan</b></td>
                                                        <td>: <?= ucfirst($konsultan->jenis_ikan) ?></td>
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
                                        <a href="<?= route('home.konsultan.detail') . '?no=' . $konsultan->id_konsultan ?>">
                                            <button class="btn btn-primary">Detail</button>
                                        </a>
                                    </div>

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