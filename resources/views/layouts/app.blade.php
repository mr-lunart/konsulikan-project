<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link type="text/css" href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/homepage.css') }}" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body>
    <div class="d-flex flex-row">
        <div class="sidebox">
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

