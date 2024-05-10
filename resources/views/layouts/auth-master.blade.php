<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Ambrosio && Bianco">

    <title>Login - UNaB</title>
    <link rel="icon" type="image/x-icon" href="{!! url('imgs/favicon.png') !!}">

    <!-- Bootstrap core CSS -->
    <script src="{!! url('assets/js/jquery-3.6.0.min.js') !!}"></script>
    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <link href="{!! url('assets/css/signin.css') !!}" rel="stylesheet">
    {{-- datatables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
    <link href="{!! url('fontawesome/css/all.css') !!}" rel="stylesheet">
    @include('sweetalert::alert')


</head>
<body class="text-center">

<main class="form-signin">

    @yield('content')

</main>


</body>
</html>
