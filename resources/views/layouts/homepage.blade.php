<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link type="text/css" href="{{ asset('css/homepage.css') }}" rel="stylesheet">
    <title>Halaman Login</title>
</head>
<body>
    <div class="d-flex flex-row">
        <div style="width: 280px;">
        @yield('sidebar')
        </div>
        <div class="flex-fill">
            @yield('navbar')
            @yield('content')
        </div>
    </div>
    <footer>
        @yield('footer')
    </footer>
</body>
</html>

