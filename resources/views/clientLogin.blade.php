<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/user.css') }}" rel="stylesheet" type="text/css">

</head>

<body class="bg-gradient-primary">

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
                                <div class="mt-5 ms-3 me-3 text-center" >
                                    <img class="img-fluid" src="{{asset('image/login.svg')}}" alt="">
                                </div>
                                <div class="text-center p-4">
                                    <h3><b> Apa itu Konsulikan?</b></h3>
                                    <p><small> Konsulikan merupakan platform yang menghubungkan para perintis pembudidaya ikan air tawar dengan para pakar perikanan agar dapat berkonsultasi mengenai permasalahan yang dialami para pembudidaya </small> </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                                    </div>
                                    <form class="user" method="post" action=" <?php print(route('login.auth')) ?> ">
                                    @csrf    
                                    <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Username" name="user">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="pass">
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="">
                                        <a class="" href="<?= route('dashboard')?>">  
                                            <p> Anda Konsultan? <strong> Masuk Sebagai Konsultan </strong></p> 
                                        </a>
                                    </div>
                                    <div class="">
                                        <a class="" href="daftar"> 
                                            <p> Belum Punya Akun? <strong> Daftar Disini</strong> </p> 
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

<?php
    if(isset($status))
    {
        if($status == 1) {

            $status = null;
            echo("
            <script>
            alert(' Username atau Password Anda Salah! ')
            window.location.replace('".url('/login')."')
            </script>");
        }
        
    } 
?>
<script src="{{ asset('/js/jquery.js') }}" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>    

</body>

</html>