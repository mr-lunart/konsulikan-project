<?php
$query = session('userSession');
?>
@extends('layouts.app')

@section('navbar')
@include('parts.navbar')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="mt-4">
                <div class="">

                    <div class="card">
                        <div class="m-3">
                            <div class="row justify-content-center">
                                <div class="col-3">
                                    <b> LIST KONSULTAN </b>
                                </div>
                                <div class="col">
                                    <form class="d-flex" role="search" action="" method="post">
                                        @csrf
                                        <div class="form-grup m-2 flex-fill">
                                            <select name="ikan" class="form-select" aria-label="Default select example">
                                                <option value="0" selected>Pilih Jenis Ikan</option>
                                                <option value="lele">Lele</option>
                                            </select>
                                        </div>
                                        <div class="form-grup m-2 flex-fill">
                                            <input class="form-control me-2" type="search" placeholder="Cari" name="cari" required>
                                        </div>
                                        <div class="m-2 flex-fill">
                                            <button class="btn btn-success" type="submit">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    @if(isset($sesi) && count($sesi))
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
                                    <form action="<?= route('homepage.chat') ?>" method="post">
                                        @csrf
                                        <button class="btn btn-primary px-4 fs-5">Chat</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <hr>
                    @endif

                    <div class=" m-3">
                        @foreach ($data as $konsultan)
                        <div onclick="window.location.href = '<?= route('home.konsultan.detail') . '?no=' . $konsultan->id_konsultan ?>' ">
                            <div class="konsultan-item row border rounded my-3 p-2 bg-white">
                                <div class="col-2 border rounded align-self-center " style="width: 150px; height:150px;"></div>
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
</div>
@endsection

@section('footer')
@endsection