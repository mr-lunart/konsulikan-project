<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo(csrf_token()) ?> ">
    <title>Login</title>
</head>

<body>

<div class="border">
    <button class="btn btn-danger m-2"> Logout Chat </button>
</div>
<div id="chat" class="overflow-auto mb-5">
    
</div>

<div class="container">
    <div class="input-group">
            <input id="pesan" class="form-control rounded-0" placeholder="..." name="pesan">
            <input id="idSession" type="hidden" value="<?=$id_sesi?>" name="idSession">
            <input id="pengirim" type="hidden" value="<?=session('query')[0]->nama?>">
            <button id="chat-submit" class="btn btn-primary rounded-0" type="submit"> Send </button>
    </div>
</div>

<script src="{{ asset('/js/jquery.js') }}" ></script>
<script src="{{ asset('/js/ajax.js') }}" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
