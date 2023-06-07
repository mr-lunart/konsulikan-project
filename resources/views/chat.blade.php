<?php
$query = session('consultantSession');
?>
@extends('layouts.appKonsultan')

@section('navbar')
@include('parts.navbarKonsultan')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="mt-3">
                <div class="">
                    <div class="m-3">
                        <br>
                        <div class="card">
                            <b class=" fw-bolder m-3">DAFTAR CHAT</b>
                        </div>
                        <br>
                        @if(isset($sesi) && count($sesi))

                        @foreach ($sesi as $baris)
                        <div class="card">
                            <div class="m-3">
                                <div class="d-flex flex-row">
                                    <div class="flex-fill m-auto">
                                        <b>Sesi Chat</b>
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
                                        <form action="<?= route('dashboard.chat.sesi') ?>" method="post">
                                            @csrf
                                            <button class="btn btn-primary px-4 fs-5">Chat</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('footer')
@endsection