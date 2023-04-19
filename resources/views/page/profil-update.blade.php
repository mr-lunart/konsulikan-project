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
            <form action="update" method="post">
                @csrf
                <div class="dflex m-3">
                    <div class="form-grup">
                        <strong>Nama : </strong> <input class="form-control" type="text" name="nama" value="<?php echo($_SESSION['data']->nama)?>">
                    </div>
                    <br>
                    <div>
                        <button type="submit" class="btn btn-primary">Simpan Profil</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    if(isset($hasil))
    {
        if($hasil==true)
        {
            echo("<script>alert('Sukses Mendaftar')</script>");
        }
        elseif($hasil==false)
        {
            echo("<script>alert('Gagal Mendaftar')</script>");
        }
    }
    ?>
</body>
</html>