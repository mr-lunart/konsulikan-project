<?php
$query = session('query');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <br>
        <h3>Selamat Datang <?php echo( $query[0] -> nama ) ?> </h3>
        <a href="<?= route('dashboard.profil') ?>"><button class="btn btn-primary"> Profil </button></a>
        <a href="<?=route('dashboard.client')?>"><button class="btn btn-warning"> Lihat List Client </button></a>
        <button onclick=" window.location.replace('<?= route('dashboard.logout') ?>')" class="btn btn-danger"> Logout </button>
    </div>
</body>
</html>
