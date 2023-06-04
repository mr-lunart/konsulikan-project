<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KONSULIKAN</title>
    <link href="<?=asset('css/bootstrap.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=asset('css/front.css')?>" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
</head>

<body class="bg-light">
<div class="container">
    <div class="bg-white">
        <div class="d-flex flex-row justify-content-center m-3">
            <img class="me-auto" src="{{ asset('image/konsulikan-logo.svg') }}" alt="">
            
            <div class="">
                <span class="d-flex align-items-center">
                    <i class="fa-solid fa-circle-user fs-3 mx-3" style="color: #2963c7;"></i>
                    <a href="<?=route('login')?>">Login</a>
                </span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <img class="me-auto" src="{{ asset('image/ilustrasi-2.svg') }}" alt="">
        </div>
        <div class="col">
            <img class="me-auto" src="{{ asset('image/ilustrasi-1.svg') }}" alt="">
        </div>
        <div class="">
            <img class="me-auto" src="{{ asset('image/ilustrasi-3.svg') }}" alt="">
        </div>
    </div>
</div>
    
</body>

</html>