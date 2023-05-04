<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <meta name="csrf-token" content="<?php echo(csrf_token()) ?> ">
    <title>Pembayaran</title>
</head>

<body>
    <div class="container">
        <h4 class="m-4"><strong>Pembayaran</strong></h4>
        <div class="border rounded m-3">
            <div class="m-4">
                <strong> {{ $query[0]->nama }} </strong>
                <p><strong>Tarif : </strong>Rp.{{ $query[0]->tarif }}</p>
                <p><strong>Jenis Ikan</strong> : {{ $query[0]->ikan }}</p>
                <p>1 Sesi <strong></strong></p>
                <button onclick="snaptoken()" class="btn btn-primary"> Checkout </button>
                <form method="post" action="<?= route('home.konsultan.detail') ?>">
                        @csrf
                        <input type="hidden" value="<?= $query[0]->uid ?>" name="uid">
                        <p> </p>
                        <button class="btn btn-danger">Kembali</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('/js/jquery.js') }}" ></script>
    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
    function snaptoken() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url : "token",
            type : 'POST',
            data : { 
                harga:"<?= $query[0]->tarif?>",
                uid_cos:"<?=session('query')[0]->uid?>",
                uid_con:"<?= $query[0]->uid ?>"
             },

            success: function(response) {
                window.open(response, '_blank');
                // snap.pay(response);
                
            },

            error: function(response) {
                console.log(response);
            }
        })
      };
    </script>
</body>
</html>
