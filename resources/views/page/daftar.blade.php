<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    <title>Daftar Akun Baru</title>
</head>
<body>
<div class="container-fluid">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
            <?php
    if(isset($hasil))
    {
        if($hasil==true)
        {
            echo("<script>alert('Sukses Mendaftar')</script>");
        }
        elseif($hasil==false)
        {
            echo("<script>alert('Gagal Mendaftar, Coba Gunakan Username yang Lain')</script>");
        }
    }
?>

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="m-3">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <div class="mt-5 ms-3 me-3 text-center" >
                                   
                                </div>
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
                                        <a class="" href="login"> 
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
<script src="{{ asset('/js/jquery.js') }}" ></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>    
</body>
</html>
