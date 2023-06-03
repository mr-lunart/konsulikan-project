<?php
$query = session('userSession');
?>
@extends('layouts.app')

@section('navbar')
@include('parts.navbar')
@endsection

@section('content')
<div class="container">
    <div class="m-5">
        <div class="card">
            <div class="m-3">
                <b> PROFIL </b>
            </div>
        </div>
        <br>
        <div class="card" style="width: 500px;">
            <div class="d-flex justify-content-center mt-5 mb-3">
                <div class="flex-fill">
                    <div class="d-flex flex-column ms-5">
                        <strong>Nama</strong>
                        <p>{{$query[0] -> nama}}</p>
                        <strong>Email</strong>
                        <p>{{$query[0] -> email}}</p>
                        <strong>No Handphone</strong>
                        <p>{{$query[0] -> noHP}}</p>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-around">
                        <a class="btn btn-primary" href="<?= route('profil.form') ?>">
                            <i class="fa-solid fa-user-pen" style="color: #ffffff;"><span> Edit</span></i>
                        </a>
                        <button onclick="logoutConfirm()" class="btn btn-danger">
                            <i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"><span> Logout</span></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
<script>
    var dialogContent = $("<div>").attr("title", "Logout").text("Apakah Anda yakin ingin keluar?");

    function logoutConfirm() {
        dialogContent.dialog({
            resizable: false,
            height: "auto",
            width: 400,
            modal: true,
            dialogClass: "no-close",
            buttons: {
                "Ya": {
                    class: "btn btn-danger",
                    text: "Ya",
                    click: function() {
                        $(this).dialog("close");
                        window.location.replace('<?= route('home.logout') ?>');
                    }
                },
                "Tidak": {
                    class: "btn btn-primary",
                    text: "Tidak",
                    click: function() {
                        $(this).dialog("close");
                    }
                }
            }
        });
    }
</script>
@endsection