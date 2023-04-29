<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    <title>Konsultan</title>
</head>
<body>
    
        <div class=" container">
            <div class="m-3">
                <a href="{{ route('dashboard.home') }}"> <button class="btn btn-primary ">Kembali</button> </a>
            </div>
            <div class="card m-3 p-3">
                <div>
                    <p>Chat Session <strong>{{ $query[0]->session_id }}</strong> </p>
                </div>
                <div> 
                    <a href="<?= route('dashboard.chat').'?session_id='.$query[0]->session_id ?>">
                        <button  class="btn btn-primary">Mulai Chat</button>
                    </a>
                </div>
            </div>
        </div>
</body>
</html>