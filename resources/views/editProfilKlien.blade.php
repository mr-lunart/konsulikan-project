<?php
$query = session('userSession');
$hasil = session() -> get('hasil');
$data = session() -> get('data');
if(isset($hasil))
{
    print($hasil);
    if($hasil == true)
    {
        session('userSession')[0]->nama = $data['nama'];
        session('userSession')[0]->email = $data['email'];
        session('userSession')[0]->noHP = $data['noHP'];
        $hasil = NULL;
        echo("<script> 
            alert('Update Profil Berhasil');
            window.location.href = '". route('home.profil') ."';
        </script>");
        
    }
    elseif($hasil == false)
    {
        echo("<script>alert('Update Profil Gagal')</script>");
    }
}
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
                    <b> EDIT PROFIL </b>
                </div>
            </div>
            <br>

            <div class="card" style="width: 700px;">
                <form id="profil" action="<?=route('profil.save')?>" method="POST">
                    @csrf
                    <div class="m-4">
                        <div class="form-grup">
                            <strong> Nama</strong> <input class="form-control" type="text" name="nama" value="<?= $query[0]->nama ?>" required>
                        </div>
                        <p> </p>
                        <div class="form-grup">
                            <strong> Email</strong> <input class="form-control" type="email" name="email" value="<?= $query[0]->email ?>" required>
                        </div>
                        <p> </p>
                        <div class="form-grup">
                            <strong> No Handphone</strong> <input class="form-control" type="text" name="noHP" value="<?= $query[0]->noHP ?>" required>
                        </div>
                        <p> </p>
                        <hr>
                        <div>
                            <button id="profilSubmit" class="btn btn-primary">Simpan Profil</button>
                            <a onclick="window.location.replace('<?=route('home.profil')?>')" class="btn btn-danger"> Cancel </a>
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
        $("#profilSubmit").on("click", function(e) {
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
        $("#profil").validate({
            rules: {
                nama: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                noHP: {
                    required: true,
                    number: true
                }
            },
            messages: {
            nama: {
                required: "Nama harus diisi"
            },
            email: {
                required: "Email harus diisi",
                email: "Masukkan alamat email yang valid"
            },
            noHP: {
                required: "Input numerik harus diisi",
                number: "Masukkan angka yang valid"
            }
            },
            submitHandler: function(form) {
            // Tindakan yang akan dijalankan setelah validasi berhasil
                submitConfirm(form);
            }
        });
    }
</script>
@endsection