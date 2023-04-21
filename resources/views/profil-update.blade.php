<?php
    if(isset($hasil))
    {
        if($hasil == true)
        {
            session('query')[0]->nama = $data['nama'];
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
            <form action="update" method="post">
                @csrf
                <div class="">
                    <div class="form-grup">
                        <strong> Nama : </strong> <input class="form-control" type="text" name="nama" value="<?php echo(session('query')[0]->nama)?>">
                    </div>
                    <br>
                    <div>
                        <button type="submit" class="btn btn-primary">Simpan Profil</button>
                    </div>
                </div>
            </form>
            <div>
                <button onclick="window.location.replace('<?=route('home.profil')?>')" class="btn btn-danger"> Cancel </button>
            </div>
        </div>
    </div>
</body>
</html>