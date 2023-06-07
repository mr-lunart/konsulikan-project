<?php
$query = session('userSession');
?>

@extends('layouts.app')



@section('navbar')
@include('parts.navbar')
@endsection

@section('content')
<div class="curved-background">

    <div class="curved-background__curved d-flex flex-column justify-content-center ">
        <div class="text-white text-center">
            <h1 class="fw-bolder">Konsultasikan Pada Pakarnya</h1>
            <h5 class="fw-normal fs-6"><b>Konsulikan</b> platfform yang menyediakan layanan konsultasi dengan pakar ikan</h5>
        </div>

    </div>
</div>
<br>
<br>
<div class="container">
    <h2 class="blue-tagline text-center fw-bolder fs-2">Fitur Kami</h2>

</div>
<br>
<div class="container">

    <div class="d-flex flex-column border bg-white p-5 rounded">
        <div class="d-flex flex-row  align-items-center justify-content-between">
            <img class="m-3" src="{{ asset('image/ilustrasi-2.webp') }}" alt="">
            <div>
                <h1 class="blue-tagline  fw-bolder">Konsultasi</h1>
                <h5 class="paraf-blue fw-normal fs-5">Konsultasikan permasalah budidaya ikan anda dengan pakar terpercayara</h5>
            </div>
        </div>
        <br>
        <div class="d-flex flex-row  align-items-center justify-content-between">
            <div>
                <h1 class="blue-tagline  fw-bolder">Panduan Pakan</h1>
                <h5 class="paraf-blue fw-normal fs-5">Hitung keperluan pakan ikan budidaya Anda melalui fitur Panduan Pakan</h5>
            </div>
            <img class="m-3" src="{{ asset('image/ilustrasi-1.webp') }}" alt="">
        </div>
        <br>
        <div class="d-flex flex-row  align-items-center justify-content-between">
            <img class="m-3" src="{{ asset('image/ilustrasi-3.webp') }}" alt="">
            <div>
                <h1 class="blue-tagline fw-bolder">Evaluasi Hasil Panen</h1>
                <h5 class="paraf-blue fw-normal fs-5">Lakukan pencatatan dan evaluasi hasil panen ikan budidaya anda melalui fitur Evaluasi Panen</h5>
            </div>
        </div>
    </div>
</div>
<br>
<br>
@endsection

@section('footer')
@endsection