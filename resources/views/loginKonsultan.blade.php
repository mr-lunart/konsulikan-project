<!-- Fixed -->
@extends('layouts.front')

@section('main')
<div class="container-fluid">
    <!-- Outer Row -->
    <div class="row justify-content-center">


        <div class="col-xl-11 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="m-3">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <div class="p-4">
                                    <h3><b> Tertarik untuk bergabung menjadi konsultan?</b></h3>
                                    <p><small> Ayo bergabung sebagai mitra konsultan di KonsulIkan </small> </p>
                                    <h4><b>Keuntungan</b></h4>
                                    <ul>
                                        <li>Membantu para perintis usaha budidaya ikan air tawar dalam mencapai tujuannya</li>
                                        <li>Waktu dan lokasi kerja yang fleksibel</li>
                                        <li>Menambah penghasilan</li>
                                    </ul>
                                    <h4><b>Keuntungan</b></h4>
                                    <ul>
                                        <li>Kirim Curiculum Vitae atau CV anda melalui email <a href="Konsultan@konsulikan.co.id">Konsultan@konsulikan.co.id</a></li>
                                        <li>Anda akan dihubungi oleh tim KonsulIlkan untuk proses selanjutnya</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block ">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang, Konsultan!</h1>
                                    </div>
                                    <form method="post" action=" <?php print(route('con.auth')) ?> ">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username" name="user" required>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="pass" required>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="">
                                        <p><small>
                                                <strong>Bukan Konsultan?</strong>
                                                <a class="" href="<?= route('login') ?>">
                                                    Login ke Halaman Klien
                                                </a>
                                            </small>
                                        </p>

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

@section('auth')
<?php
$status = session()->get('status');
if (isset($status)) {
    if ($status) {
        echo ("<script> alert(' Username atau Password Anda Salah! ') </script>");
    }
}
?>
@endsection

@section('footer')
<script src="{{ asset('/js/jquery.js') }}"></script>
@endsection