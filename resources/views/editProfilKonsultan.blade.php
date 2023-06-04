<?php
$query = session('consultantSession');

$hasil = session()->get('hasil');
$data = session()->get('data');
if (isset($hasil)) {
    print($hasil);
    if ($hasil == true) {
        session('consultantSession')[0]->nama = $data[0]->nama;
        session('consultantSession')[0]->email = $data[0]->email;
        session('consultantSession')[0]->telephone = $data[0]->telephone;
        session('consultantSession')[0]->ikan = $data[0]->ikan;
        session('consultantSession')[0]->jenis_ikan = $data[0]->jenis_ikan;
        session('consultantSession')[0]->tarif = $data[0]->tarif;
        session('consultantSession')[0]->deskripsi = $data[0]->deskripsi;
        $hasil = NULL;
        echo ("<script> 
                    alert('Update Berhasil');
                    window.location.href = '" . route('dashboard.profil') . "';
                </script>");
    } elseif ($hasil == false) {
        echo ("<script>alert('Update Gagal')</script>");
    }
}
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
    <div class="card p-3 m-5">
        <h4><strong> Edit Profil </strong></h4>
        <form id="profil" action="<?= route('dashboard.profil.update') ?>" method="POST">
            @csrf
            <div class="">
                <div class="form-grup">
                    <strong> Nama</strong> <input class="form-control" type="text" name="nama" value="<?= $query[0]->nama ?>" required>
                </div>
                <p> </p>
                <div class="form-grup">
                    <strong> Email</strong> <input class="form-control" type="email" name="email" value="<?= $query[0]->email ?>" required>
                </div>
                <p> </p>
                <div class="form-grup">
                    <strong> No Handphone</strong> <input class="form-control" type="text" name="noHP" value="<?= $query[0]->telephone ?>" required>
                </div>
                <p> </p>
                <div class="form-grup">
                    <strong>Jenis Ikan</strong>
                    <select class="form-select" aria-label="Default select example" name="ikan" id="" required>
                        <option value="1" <?php if ($query[0]->ikan == '1') {
                                                echo (" selected");
                                            } ?>> Lele </option>
                        <option value="2" <?php if ($query[0]->ikan == '2') {
                                                echo (" selected");
                                            } ?>> Nila </option>
                    </select>
                </div>
                <p> </p>
                <div class="form-grup">
                    <strong> Tarif </strong> <input class="form-control" type="text" name="tarif" value="<?= $query[0]->tarif ?>" required>
                </div>
                <p> </p>
                <div class="form-grup">
                    <strong> Deksripsi </strong> <input class="form-control" type="text" name="deskripsi" value="<?= $query[0]->deskripsi ?>" required>
                </div>
                <p> </p>
                <div>
                    <button id="profilSubmit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('footer')
<script>
    $(document).ready(function() {
        $("#profilSubmit").on("click", function(e) {
        // e.preventDefault();
            validateForm();
        });
    })

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
                },
                ikan: {
                    required: true
                },
                tarif: {
                    required: true,
                    number: true
                },
                deskripsi: {
                    required: true
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
            },
            ikan: {
                required: "Pilih Jenis Ikan!",
                
            },
            tarif: {
                required: "Input numerik harus diisi",
                number: "Masukkan angka yang valid"
            },
            deskripsi: {
                required: "Deskripsi harus diisi",
            },
            },
            submitHandler: function(form) {
            // Tindakan yang akan dijalankan setelah validasi berhasil
                form.submit();
            }
        });
    }
</script>
@endsection