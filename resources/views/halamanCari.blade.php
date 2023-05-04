<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    <title>Konsultasi</title>
</head>
<body>
    <div class="container">
        <div class="border rounded m-3">
            <div class="m-3">
                <a href="<?=route('home.sesi')?>"><button class="btn btn-primary">Sesi Konsultasi</button></a>
                <a href="<?=route('home')?>"><button class="btn btn-dark" >Kembali Ke Dashboard</button></a>
                <br>
                <br>
                <form class="d-flex" role="search" action="<?=route('home.cari')?>" method="post">
                @csrf
                    <select name="ikan" class="form-select" aria-label="Default select example" >
                        <option value="0" selected>Pilih Jenis Ikan</option>
                        <option value="lele">Lele</option>
                        <option value="gurame">Gurame</option>
                    </select>
                    <p> </p>
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="nama">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
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
                    <p><strong>Tarif</strong> : Rp.{{ $user->tarif }}</p>
                    <p><strong>Jenis Ikan</strong> : {{ $user->ikan }}</p>
                    <form method="post" action="<?= route('home.konsultan.detail') ?>">
                        @csrf
                        <input type="hidden" value="<?= $user->uid ?>" name="uid">
                        <button class="btn btn-primary">Lihat Profil</button>
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