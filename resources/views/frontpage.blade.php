<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Konsulikan ~ Platform Layanan Konsultasi Hewan Aquatik </title>
    <link type="text/css" href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/front.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,500;0,600;1,200;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="bg-light">
    <div class="bg-white navbar">
        <div class="container">
            <div class=" d-flex flex-fill justify-content-between m-3">
                <img class="m-0" src="{{ asset('image/konsulikan-logo.webp') }}" alt="">
                <ul class="nav  ">
                    <li class=" nav-item">
                        <a href="<?= route('root') ?>" class="nav-link">
                            Homepage
                        </a>
                    </li>
                    <li class=" nav-item">
                        <a href="<?= route('home') ?>" class="btn btn-primary">
                            Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="curved-background">

        <div class="curved-background__curved d-flex flex-column justify-content-center ">
            <div class="text-white text-center">
                <h1 class="fw-bolder">Konsultasikan Pada Pakarnya</h1>
                <h5 class="fw-normal fs-6"><b>Konsulikan</b> platfform yang menyediakan layanan konsultasi dengan pakar ikan</h5>
            </div>

        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <h2 class="blue-tagline text-center fw-bolder fs-2">Fitur Kami</h2>

    </div>
    <br>
    <div class="container">

        <div class="d-flex flex-column border bg-white p-5 rounded">
            <div class="d-flex flex-row  align-items-center justify-content-between">
                <img class="m-3" src="{{ asset('image/ilustrasi-2.webp') }}" alt="">
                <div>
                    <h1 class="blue-tagline  fw-bolder">Konsultasi</h1>
                    <h5 class="paraf-blue fw-normal fs-5">Konsultasikan permasalah budidaya ikan anda dengan pakar terpercayara</h5>
                </div>
            </div>
            <br>
            <div class="d-flex flex-row  align-items-center justify-content-between">
                <div>
                    <h1 class="blue-tagline  fw-bolder">Panduan Pakan</h1>
                    <h5 class="paraf-blue fw-normal fs-5">Hitung keperluan pakan ikan budidaya Anda melalui fitur Panduan Pakan</h5>
                </div>
                <img class="m-3" src="{{ asset('image/ilustrasi-1.webp') }}" alt="">
            </div>
            <br>
            <div class="d-flex flex-row  align-items-center justify-content-between">
                <img class="m-3" src="{{ asset('image/ilustrasi-3.webp') }}" alt="">
                <div>
                    <h1 class="blue-tagline fw-bolder">Evaluasi Hasil Panen</h1>
                    <h5 class="paraf-blue fw-normal fs-5">Lakukan pencatatan dan evaluasi hasil panen ikan budidaya anda melalui fitur Evaluasi Panen</h5>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <footer class="footer-blue" style="height: 200px; width:100%;">
        <div class="">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between" style="height: 200px;">
                    <div class="">
                        <img class="m-0" src="{{ asset('image/konsulikan-logo-putih.png') }}" alt="" width="250px">
                    </div>
                    <div class="">
                        <h2 class="fw-bolder text-white">Fitur Kami</h2>
                        <ul class="navbar-nav">
                            <li class="nav-link link-light p-1"> > Konsulikan</li>
                            <li class="nav-link link-light p-1"> > Panduan Pakan</li>
                            <li class="nav-link link-light p-1"> > Evaluasi Panen</li>
                        </ul>

                    </div>
                    <div class="">
                        <h2 class="fw-bolder text-white">Kontak Kami</h2>
                        <ul class="navbar-nav">
                            <li class="nav-link link-light p-1"> > +62 812-6969-6969</li>
                            <li class="nav-link link-light p-1"> > konsulikan.mail@gmail.com</li>
                            <li class="nav-link link-light p-1"> > Jember, Indonesia</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://kit.fontawesome.com/fc1ab6b05a.js" crossorigin="anonymous"></script>
</body>

</html>