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
    <div class="container">
        <div class="m-3">
            <div class="card">
                <div class="m-3 text-center">
                    <h3>Under Development</h3>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')

@endsection