<?php
$query = session('consultantSession');
$status = session()->get('status');
if (isset($status)) {
    if ($status) {
        echo ("<script> alert(' Password Berhasil Di Ubah ') </script>");
    }
    elseif($status==false)
    {
        echo ("<script> alert(' Password Lama Salah ') </script>");
    }
}
?>

@extends('layouts.appKonsultan')

@section('navbar')
@include('parts.navbarKonsultan')
@endsection

@section('content')
<div class="container">
    <div class="m-5">
        <div class="card">
            <div class="m-3">
                <b> UBAH PASSWORD </b>
            </div>
        </div>
        <br>

        <div class="card" style="width: 700px;">
            <form id="pass" action="<?= route('dashboard.password.update') ?>" method="POST">
                @csrf
                <div class="m-4">
                    <div class="form-grup">
                        <strong>Password Lama</strong> <input class="form-control" type="password" name="passLama">
                    </div>
                    <p> </p>
                    <div class="form-grup">
                        <strong>Password Baru</strong> <input id="password" class="form-control" type="password" name="passBaru">
                    </div>
                    <p> </p>
                    <div class="form-grup">
                        <strong>Ulangi Password Baru</strong> <input class="form-control" type="password" name="rePassBaru">
                    </div>
                    <p> </p>
                    <hr>
                    <div>
                        <button id="passSubmit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script>
    var dialogContent = $("<div>").attr("title", "Edit Profil").text("Apakah Anda Yakin dengan Perubahan yang Sudah Dibuat?");

    $(document).ready(function() {
        $("#passSubmit").on("click", function(e) {
            // e.preventDefault();
            validateForm();
        });
    })

    function submitConfirm(form) {
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

                        form.submit();
                        $(this).dialog("close");
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

    function validateForm() {
        $("#pass").validate({
            rules: {
                passLama: {
                    required: true
                },
                passBaru: {
                    required: true,

                },
                rePassBaru: {
                    equalTo: "#password"
                }
            },
            messages: {
                passLama: {
                    required: "Input harus diisi"
                },
                passBaru: {
                    required: "Input harus diisi",

                },
                rePassBaru: {
                    equalTo: "Password tidak sama",
                }
            },
            submitHandler: function(form) {
                // Tindakan yang akan dijalankan setelah validasi berhasil
                form.submit();
            }
        });
    }
</script>
@endsection