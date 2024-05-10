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
    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    {{-- datatables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    {{--    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>--}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css"
          rel="stylesheet"/>
    {{--    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.4.0/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.4.0/css/rowGroup.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.4.0/js/dataTables.fixedHeader.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/rowgroup/1.4.0/js/dataTables.rowGroup.min.js"></script>


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


        let table = $('#tabla').DataTable({
            responsive: true,
            orderCellsTop: true,
            order: [[0, 'asc']],
            dom: 'Bfrtip',
            buttons: [
                {
                    extend : 'copy',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8]
                    }
                },
                {
                    extend : 'csv',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8]
                    },
                    title : function() {
                        return "Listado de Cargos Pendientes";
                    },
                },
                {
                    extend : 'excelHtml5',
                    title : function() {
                        return "Listado de Cargos Pendientes";
                    },
                    orientation : 'landscape',
                    pageSize : 'legal', // You can also use "A1","A2" or "A3", most of the time "A3" works the best.
                    text : 'Excel',
                    titleAttr : 'Excel',
                    footer: true,
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8]
                    }
                },
                {
                    extend : 'pdfHtml5',
                    title : function() {
                        return "Listado de Cargos Pendientes";
                    },
                    orientation : 'landscape',
                    pageSize : 'legal', // You can also use "A1","A2" or "A3", most of the time "A3" works the best.
                    text : 'PDF',
                    titleAttr : 'PDF',
                    footer: true,
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8]
                    }
                },
                {
                    extend : 'print',
                    title : function() {
                        return "Listado de Cargos Pendientes";
                    },
                    orientation : 'landscape',
                    pageSize : 'legal', // You can also use "A1","A2" or "A3", most of the time "A3" works the best.
                    text : 'print',
                    titleAttr : 'print'
                }
            ],
            "aaSorting": [8,'desc'],
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
        //var table = $('#tabla').DataTable();

        // Add column filters to specific columns
        // $('#filterRow th').each(function() {
        //     var title = $(this).text();
        //     var columnIndex = $(this).index();
        //
        //     // Exclude columns where you don't want to add filters
        //     if ((columnIndex !== 11) && (columnIndex !== 10)) {
        //         $(this).html('<input type="text" placeholder="Buscar por ' + title + '" />');
        //     }
        //
        // });
        //
        // // Clone filter row and append it to footer
        // var filterRowFooter = $('#filterRow').clone();
        // $('#filterRowFooter').html(filterRowFooter.html());
        //
        // // Apply the column filters
        // $('#filterRow input').on('keyup change', function() {
        //     var columnIndex = $(this).parent().index();
        //     // Exclude columns where you don't want to apply filters
        //     if ((columnIndex !== 11) && (columnIndex !== 10)) {
        //         table.column(columnIndex).search(this.value).draw();
        //     }
        // });
        //
        // // Apply the column filters in the footer
        // $('#filterRowFooter input').on('keyup change', function() {
        //     var columnIndex = $(this).parent().index();
        //     // Exclude columns where you don't want to apply filters
        //     if ((columnIndex !== 11) && (columnIndex !== 10)) {
        //         table.column(columnIndex).search(this.value).draw();
        //     }
        // });
        // $('#tabla').DataTable().columns.adjust();


    });
</script>
</body>
</html>
