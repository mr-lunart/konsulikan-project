<?php
// if(isset($sesi[0])){
//     echo("chat");
// }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <meta name="csrf-token" content="<?php echo(csrf_token()) ?> ">
    <title>Detail Konsultan</title>
</head>

<body>
    <div class="container">
        <h4 class="m-4"><strong>Detail Konsultan</strong></h4>
        <div class="border rounded m-3">
            <div class="m-4">
                <strong> {{ $query[0]->nama }} </strong>
                <p><strong>Jenis Ikan</strong> : {{ $query[0]->ikan }}</p>
                <p><strong>Deskripsi</strong> : {{ $query[0]->deskripsi }}</p>
                <?php if(isset($sesi[0])):?>
                    <a href="<?= route('homepage.chat').'?session_id='.$sesi[0]->session_id ?>">
                        <button  class="btn btn-primary">Mulai Chat</button>
                    </a>
                <?php else:?>
                    <form method="post" action="<?= route('home.pesanan') ?>">
                        @csrf
                        <input type="hidden" value="<?= $query[0]->uid ?>" name="uid">
                        <button class="btn btn-primary"> Pesan Sesi </button></a>
                    </form>
                <?php endif;?>
                
                <p> </p>
                <button onclick=" window.location.replace('<?=route('home.konsultan')?>')" class="btn btn-danger"> Kembali </button>
            </div>
        </div>
    </div>
    <script src="{{ asset('/js/jquery.js') }}" ></script>
</body>
</html>
