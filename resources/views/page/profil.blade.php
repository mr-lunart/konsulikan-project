<?php
session_start()

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="card ">
            <div class="dflex m-3">
                <div>
                    <p><strong>Nama : </strong> <?php echo($_SESSION['data']->nama)?></p>
                </div>
                <div>
                    <p><strong>Username : </strong> <?php echo($_SESSION['data']->user)?> </p>
                </div>
                <div>
                    <button class="btn btn-primary">Ubah Profil</button>
                </div>
            </div>
        </div>
    </div>
    
    
</body>
</html>