<?php
$query = session('consultantSession');
?>
@extends('layouts.appKonsultan')

@section('sidebar')
@include('parts.sidebarKonsultan')
@endsection

@section('navbar')
@include('parts.navbarKonsultan')
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
                                    <strong class="fs-5 fw-bold">SESI CHAT</strong>
                                </div>
                            </div>
                        </div>
                        <hr>
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