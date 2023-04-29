<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    <title>Sesi</title>
</head>
<body>
    
        <div class=" container">
            <div class="m-3">
                <a href="{{ route('home') }}"> <button class="btn btn-primary ">Kembali</button> </a>
            </div>
            @foreach ($query as $data)
            <div class="border rounded mb-3">
                <div class="m-3">
                    <strong> {{ $data->consultant_uid }} </strong>
                        
                        <a href="<?= route('dashboard.chat') ?>">
                            <button  class="btn btn-primary">Mulai Chat</button>
                        </a>
                </div>
            </div>
            @endforeach
        </div>
</body>
</html>