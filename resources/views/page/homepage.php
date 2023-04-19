<?php
session_start();

if ( isset($data) == true )
{
    $_SESSION['data'] = $data[0];
}

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
        <br>
        <h3>Selamat Datang <?php print($_SESSION['data'] -> nama) ?> 
        </h3>
        <a href="dashboard/profil"><button class="btn btn-primary"> Profil </button></a>
        <a href="dashboard/profil"><button class="btn btn-warning"> Lihat List Konsultan </button></a>
        <a href="dashboard/logout"><button class="btn btn-danger"> Logout </button></a>
    </div>
    
</body>
</html>
