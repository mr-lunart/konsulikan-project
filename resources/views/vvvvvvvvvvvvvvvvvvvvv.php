<?php
$query = session('query')
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="<?php echo(asset('css/user.css')) ?>" rel="stylesheet">
    <!-- <meta name="csrf-token" content="<?php echo(csrf_token()) ?> "> -->
    <title>Profil</title>
</head>
<body>
    <div class="container">
        <div class="m-5">
        <div class="card ">
            <div class="dflex m-3">
                <h4>Data Profil</h4>
                <hr>
                <div class="d-flex flex-row">
                    <div class="d-flex flex-column">
                        <p><strong>Nama</strong></p>
                        <p><strong>Username</strong></p>
                        <p><strong>Email</strong></p>
                        <p><strong>No Handphone</strong></p>
                    </div>
                    <div class="d-flex flex-column">
                        <p> : <?php echo($query[0] -> nama)?></p>
                        <p> : <?php echo($query[0] -> user)?></p>
                        <p> : <?php echo($query[0] -> email)?></p>
                        <p> : <?php echo($query[0] -> noHP)?></p>
                    </div>
                </div>
                <hr>
                <div>
                    <a href="<?= route('profil.update')?>"><button class="btn btn-primary">Edit</button></a>
                    <button onclick=" window.location.replace('<?=route('home')?>') " class="btn btn-success">Kembali Ke Dashboard</button>
                    <button onclick="logoutConfirm()" class="btn btn-danger"> Logout </button>
                </div>
            </div>
        </div>
        </div>
    </div>
    <script>
        function logoutConfirm(){
            if(confirm("Apakah Anda ingin Logout?")){
                window.location.replace('<?= route('home.logout') ?>')
            }
            else{}
        }
    </script>
</body>
</html>