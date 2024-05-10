<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Ambrosio && Bianco">


    <title>UNaB - Aulas y Profesores</title>
    <link rel="icon" type="image/x-icon" href="{!! url('imgs/favicon.png') !!}">

    <!-- Bootstrap core CSS -->
    <script src="{!! url('assets/js/jquery-3.6.0.min.js') !!}"></script>
    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
     <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    {{-- datatables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



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
    <link href="{!! url('assets/css/app.css') !!}" rel="stylesheet">
    <link href="{!! url('fontawesome/css/all.css') !!}" rel="stylesheet">
    @include('sweetalert::alert')





</head>
<body>

@include('layouts.partials.navbar')


<main class="container" style="margin-left: 0px; margin-right: 0px; max-width: 100% !important">
    @yield('content')

</main>

<script>
    $(document).ready(function () {
        $('#tabla').DataTable({
            "aaSorting": [],
            order: [[0, 'asc']],

            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
        });
    });
</script>
</body>
</html>
