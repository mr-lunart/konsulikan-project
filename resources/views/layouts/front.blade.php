<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
    <link href="<?=asset('css/bootstrap.css')?>" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
</head>

<body class="bg-gradient-primary">

    @yield('main')

    @yield('auth')

    <script type="text/javascript" src="<?= asset('js/jquery.js') ?>" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js" crossorigin="anonymous"></script>
    @yield('footer')
</body>

</html>