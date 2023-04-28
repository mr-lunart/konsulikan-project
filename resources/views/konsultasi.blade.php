<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    <title>Konsultan</title>
</head>
<body>
    <div class="container">
        <div class="border rounded m-3">
            <div class="m-3">
                <button class="btn btn-primary" >Sesi Konsultasi</button>
                <button class="btn btn-warning" >Riwayat Konsultasi</button>
                <button class="btn btn-success" >Pemesanan</button>
                <a href="<?=route('home')?>"><button class="btn btn-dark" >Homepage</button></a>
            </div>
        </div>
        <div class="m-3">
            <h4><strong> Konsultan</strong> </h4>
        </div>

        <div class=" m-3">
        @foreach ($data as $user)
            <div class="border rounded mb-3">
                <div class="m-3">
                    <strong> {{ $user->nama }} </strong>
                    <p><strong>Tarif : </strong>Rp.{{ $user->tarif }}</p>
                    <form method="post" action="<?= route('home.pesanan') ?>">
                        @csrf
                        <input type="hidden" value="<?= $user->uid ?>" name="uid">
                        <button class="btn btn-primary">Buat Sesi</button>
                    </form>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    

    <!-- <button id="pay-button">Pay!</button>
    <input type="text" id="snap-token"> -->
    
</body>
</html>