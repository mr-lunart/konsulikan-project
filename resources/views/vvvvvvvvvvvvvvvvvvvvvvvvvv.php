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
            session('query')[0]->telephone = $data['noHP'];
            session('query')[0]->ikan = $data['ikan'];
            session('query')[0]->tarif = $data['tarif'];
            session('query')[0]->deskripsi = $data['deskripsi'];
            $hasil = NULL;
            echo("<script> 
                alert('Update Berhasil');
                window.location.href = '". route('dashboard.profil') ."';
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
            <form onSubmit=" return confirm('Apakah Anda Yakin Ingin Menyimpan Data?')" action="<?=route('dashboard.profil.save')?>" method="post">
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
                        <strong> No Handphone</strong> <input class="form-control" type="text" name="noHP" value="<?php echo(session('query')[0]->telephone)?>" required>
                    </div>
                    <p> </p>
                    <div class="form-grup">
                        <strong>Jenis Ikan</strong>
                        <select class="form-select" aria-label="Default select example" name="ikan" id="">
                            <option value="lele" <?php if(session('query')[0]->ikan=='lele'){ echo(" selected");}?>>Lele</option>
                            <option value="gurame" <?php if(session('query')[0]->ikan=='gurame'){echo(" selected");}?>>Gurame</option>
                        </select>
                    </div>
                    <p> </p>
                    <div class="form-grup">
                        <strong> Tarif </strong> <input class="form-control" type="text" name="tarif" value="<?php echo(session('query')[0]->tarif)?>" required>
                    </div>
                    <p> </p>
                    <div class="form-grup">
                        <strong> Deksripsi </strong> <input class="form-control" type="text" name="deskripsi" value="<?php echo(session('query')[0]->deskripsi)?>" required>
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
            <br>
            <div>
                <button onclick="window.location.replace('<?=route('dashboard.profil')?>')" class="btn btn-danger"> Cancel </button>
            </div>
        </div>
    </div>
</body>
</html>