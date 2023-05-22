<?php
$query = session('consultantSession');
?>
@extends('layouts.app')

@section('sidebar')
    <div class="sidebar bg-dark text-white ">
        <br>
        <div class="fs-4 text-center"> <i><b> Konsulikan </b></i> </div>
        <hr>
        <nav class="navbar p-3">
            <ul class="nav nav-pills flex-column mb-auto" style="width: 250px;">
                <li class="nav-item ">
                    <a href="<?=route('dashboard')?>" class="nav-link active" aria-current="page">
                    Dashboard
                    </a>
                </li>
                <li>
                    <a href="<?=route('dashboard.profil')?>" class="nav-link link-dark text-white">
                    Profil
                    </a>
                </li>
                <li>
                <a href="#" class="nav-link link-dark text-white">
                    Chat
                    </a>
                </li>
                <li>
                    <a href="<?=route('dashboard.klien')?>" class="nav-link link-dark text-white">
                    Klien
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endsection

@section('navbar')
    <div class="bg-dark text-white">
        <ul class="nav justify-content-end ">
            <li class="nav-item">
                <h6 class="sf-4 m-3">Selamat Datang,<b><?= $query[0] -> nama ?></b></h6>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="card p-3 m-5">
                <h4><strong> Edit Profil </strong></h4>
                <form onSubmit=" return confirm('Apakah Anda Yakin Ingin Menyimpan Data?')" action="<?=route('dashboard.profil.update')?>" method="post">
                    @csrf
                    <div class="">
                        <div class="form-grup">
                            <strong> Nama</strong> <input class="form-control" type="text" name="nama" value="<?= $query[0]->nama?>" required>
                        </div>
                        <p> </p>
                        <div class="form-grup">
                            <strong> Email</strong> <input class="form-control" type="email" name="email" value="<?= $query[0]->email?>" required>
                        </div>
                        <p> </p>
                        <div class="form-grup">
                            <strong> No Handphone</strong> <input class="form-control" type="text" name="noHP" value="<?= $query[0]->telephone?>" required>
                        </div>
                        <p> </p>
                        <div class="form-grup">
                            <strong>Jenis Ikan</strong>
                            <select class="form-select" aria-label="Default select example" name="ikan" id="" required>
                                <option value="lele"  <?php if($query[0]->ikan=='lele'){ echo(" selected");}?>>
                                    Lele
                                </option>
                                <option value="gurame" <?php if($query[0]->ikan=='gurame'){ echo(" selected");}?>>
                                    Gurame
                                </option>
                            </select>
                        </div>
                        <p> </p>
                        <div class="form-grup">
                            <strong> Tarif </strong> <input class="form-control" type="text" name="tarif" value="<?= $query[0]->tarif?>" required>
                        </div>
                        <p> </p>
                        <div class="form-grup">
                            <strong> Deksripsi </strong> <input class="form-control" type="text" name="deskripsi" value="<?= $query[0]->deskripsi?>" required>
                        </div>
                        <p> </p>
                        <div>
                            <button type="submit" class="btn btn-primary">Simpan Profil</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
@endsection

@section('footer')
    <?php
        // if(isset($pass))
        // {
        //     if($pass==0)
        //     {
        //         echo("<script> 
        //             alert('Password Salah');
        //         </script>");
        //     }
        //     elseif($pass==1)
        //     {
        //         echo("<script> 
        //             alert('Password Baru tidak Serupa');
        //         </script>");
        //     }
        //     $pass=NULL;
        // }
        $hasil = session() -> get('hasil');
        $data = session() -> get('data');
        if(isset($hasil))
        {
            print($hasil);
            if($hasil == true)
            {
                session('consultantSession')[0]->email = $data['email'];
                session('consultantSession')[0]->nama = $data['nama'];
                session('consultantSession')[0]->email = $data['email'];
                session('consultantSession')[0]->telephone = $data['noHP'];
                session('consultantSession')[0]->ikan = $data['ikan'];
                session('consultantSession')[0]->tarif = $data['tarif'];
                session('consultantSession')[0]->deskripsi = $data['deskripsi'];
                $hasil = NULL;
                echo("<script> 
                    alert('Update Berhasil');
                </script>");
                
            }
            elseif($hasil == false)
            {
                echo("<script>alert('Update Gagal')</script>");
            }
        }
    ?>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
@endsection