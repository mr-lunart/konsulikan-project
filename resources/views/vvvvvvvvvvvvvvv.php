<?php

    if(isset($pass))
    {
        if($pass==0)
        {
            echo("<script> 
                alert('Password Salah');
            </script>");
        }
        elseif($pass==1)
        {
            echo("<script> 
                alert('Password Baru tidak Serupa');
            </script>");
        }
        $pass=NULL;
    }

    if(isset($hasil))
    {
        if($hasil == true)
        {
            session('query')[0]->nama = $data['nama'];
            session('query')[0]->email = $data['email'];
            session('query')[0]->noHP = $data['noHP'];
            $hasil = NULL;
            echo("<script> 
                alert('Update Berhasil');
                window.location.href = '". route('home.profil') ."';
            </script>");
            
        }
        elseif($hasil == false)
        {
            echo("<script>alert('Update Gagal')</script>");
        }
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
        <div class="card p-3 m-5">
            <h4><strong> Edit Profil </strong></h4>
            <form onSubmit=" return confirm('Apakah Anda Yakin Ingin Menyimpan Data?')" action="<?=route('profil.save')?>" method="post">
                @csrf
                <div class="">
                    <div class="form-grup">
                        <strong> Nama</strong> <input class="form-control" type="text" name="nama" value="<?php echo(session('query')[0]->nama)?>" required>
                    </div>
                    <p> </p>
                    <div class="form-grup">
                        <strong> Email</strong> <input class="form-control" type="email" name="email" value="<?php echo(session('query')[0]->email)?>" required>
                    </div>
                    <p> </p>
                    <div class="form-grup">
                        <strong> No Handphone</strong> <input class="form-control" type="text" name="noHP" value="<?php echo(session('query')[0]->noHP)?>" required>
                    </div>
                    <p> </p>
                    <div>
                        <button type="submit" class="btn btn-primary">Simpan Profil</button>
                    </div>
                </div>
            </form>
            <hr>
            <form onSubmit=" return confirm('Apakah Anda Yakin Ingin Menyimpan Data?')" action="" method="">
                @csrf
                    <div class="form-grup">
                        <strong> Password Lama </strong> <input class="form-control" type="text" name="oldPass" required>
                    </div>
                    <p> </p>
                    <div class="form-grup">
                        <strong> Password Baru </strong> <input class="form-control" type="text" name="newPass" required>
                    </div>
                    <p> </p>
                    <div class="form-grup">
                        <strong> Ulangi Password Baru </strong> <input class="form-control" type="text" name="ReNewPass" required>
                    </div>
                    <p> </p>
            </form>
            <p> </p>
            <div>
                <button onclick="window.location.replace('<?=route('home.profil')?>')" class="btn btn-danger"> Cancel </button>
            </div>
        </div>
    </div>
    <script>
        function SaveConfirm(){
            if(confirm("Apakah Anda ingin Logout?")){
                window.location.replace('<?= route('home.logout') ?>')
            }
            else{}
        }
    </script>
</body>
</html>