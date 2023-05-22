<!-- Fixed -->
@extends('layouts.front')

@section('main')
    <div class="container-fluid">
            <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="m-3">
                         <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                        <div class="mt-5 ms-3 me-3 text-center"> </div>
                                    <div class="text-center p-4">
                                        <h3><b> Apa itu Konsulikan?</b></h3>
                                        <p><small> Konsulikan merupakan platform yang menghubungkan para perintis pembudidaya ikan air tawar dengan para pakar perikanan agar dapat berkonsultasi mengenai permasalahan yang dialami para pembudidaya </small> </p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Form Pendafataran Akun Baru</h1>
                                        </div>
                                        <form class="user" method="post" action="daftar">
                                        @csrf    
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" placeholder="Masukan Nama Lengkap" name="nama" required>
                                        </div>
                                        <p> </p>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" placeholder="Masukan Email" name="email" required>
                                        </div>
                                        <p> </p>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" placeholder="No Handphone" name="noHP" required>
                                        </div>
                                        <p> </p>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" placeholder="Buat Username" name="user" required>
                                        </div>
                                        <p> </p>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" placeholder="Password" name="pass" required>
                                        </div>
                                        <p> </p>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Daftar Akun
                                        </button>
                                        </form>
                                        <hr>
                                        <div class="">
                                            <a class="" href="<?= route('login')?>"> 
                                                <p> Sudah Memiliki Akun? <strong> Login Disini</strong> </p> 
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <script src="{{ asset('/js/jquery.js') }}" ></script>

    <?php
        $hasil = session() -> get('hasil');
        if(isset($hasil)) {
            if($hasil==true) {
                echo("<script> alert('Berhasil Mendaftarkan Akun') </script>");
            }
            elseif($hasil==false) {
                echo("<script> alert('Gagal Mendaftar, Gunakan Username Berbeda dan Pastikan Format Data Benar') </script>");
            }
        }
        else {}
    ?>
@endsection