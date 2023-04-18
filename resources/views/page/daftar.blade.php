<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="login d-flex justify-content-center">
        <div id="auth" class="card ">
            <br>
            <span class="text-center">
                <strong>Daftar Akun</strong>
                <hr>
            </span>
            <div class="m-4 d-flex justify-content-center">
                <div class="align-self-stretch" id="form-auth" >
                    
                    <form method="post" action="daftar" >
                        @csrf
                        <div class="form-group">
                            <label class="form-text" for="">Nama</label>
                            <input class="form-control" type="text" name="nama">
                        </div>
                        <div class="form-group">
                            <label class="form-text" for="">Username</label>
                            <input class="form-control" type="text" name="user">
                        </div>
                        <div class="form-group">
                            <label class="form-text" for="">Password</label>
                            <input class="form-control" type="password" name="pass">
                        </div>
                        <br>
                        <div id="d-flex justify-content-center">
                            <button class="btn btn-primary col-12" type="submit">login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>    
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
