<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link type="text/css" href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/homepage.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,500;0,600;1,200;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>
</head>

<body class="bg-light">
    <div class="row justify-content-center">
        <div class="col-5 card my-4">
            <div class="dflex m-3">
                <div class="d-flex flex-column">
                    @if($status == 'sukses')
                    <div class="text-center">
                        <strong class="fs-5 fw-bold">STATUS TRANSAKSI</strong>
                    </div>
                    <hr>
                    <div class="d-flex flex-row justify-content-between">
                        <div class="d-flex flex-column mx-5 text-start">
                            <small><b>ORDER ID</b></small>
                            <small><?=$_GET['order_id']?></small>
                            <br>
                            <small><b>MERCHANT ID</b></small>
                            <small><?=$_GET['merchant_id']?></small>
                            <br>
                            <small><b>STATUS TRANSACTION</b></small>
                            <small>BERHASIL</small>
                            <br>
                        </div>
                    </div>
                    @endif
                    @if($status == 'gagal')
                    <div class="text-center">
                        <strong class="fs-5 fw-bold">STATUS TRANSAKSI</strong>
                    </div>
                    <hr>
                    <div class="d-flex flex-row justify-content-between">
                        <div class="d-flex flex-column mx-5 text-start">
                            <small><b>ORDER ID</b></small>
                            <small><?=$_GET['order_id']?></small>
                            <br>
                            <small><b>MERCHANT ID</b></small>
                            <small><?=$_GET['merchant_id']?></small>
                            <br>
                            <small><b>STATUS TRANSACTION</b></small>
                            <small>GAGAL</small>
                            <br>
                        </div>
                    </div>
                    @endif
                    <hr>
                    <a class="btn btn-success" href="<?=route('root')?>">Buka Website Konsulikan</a>
                    <hr>
                    <small> Anda Dapat Menutup Laman ini</small>
                </div>
            </div>
        </div>





        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>

</html>