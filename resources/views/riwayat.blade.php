<?php
$query = session('userSession');
?>
@extends('layouts.app')

@section('navbar')
@include('parts.navbar')
@endsection

@section('content')
<div class="container">
    <div class="mt-5">
        <div class="card">
            <div class="m-3">
                <b> RIWAYAT KONSULTASI </b>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="m-3">
                <div class=".table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th class="text-break text-center" scope="col" style="font-size:10pt;"> Konsultan </th>
                                <th class="text-break text-center" scope="col" style="font-size:10pt;"> Tarif </th>
                                <th class="text-break text-center" scope="col" style="font-size:10pt;"> Tanggal Transaksi</th>
                                <th class="text-break text-center" scope="col" style="font-size:10pt;"> Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayat as $list)
                            <tr>
                                <td class="fs-6 text-break text-center" scope="col"> {{$list->nama}} </td>
                                <td class="fs-6 text-break text-center" scope="col"> {{$list->tarif_konsultasi}} </td>
                                <td class="fs-6 text-break text-center" scope="col"> {{$list->tanggal_transaksi}} </td>
                                <td class="fs-6 text-break text-center" scope="col">
                                    <a href="<?= route('home.riwayat.detail') . '?no=' . $list->konsultasi_id ?>">
                                        <button class="btn btn-primary">Detail</button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @if (isset($riwayat)&&count($riwayat)==0)
                            <tr>
                                <td class="text-center" colspan="4"> Belum Memiliki Riwayat Konsultasi </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
@endsection

@section('footer')
@endsection