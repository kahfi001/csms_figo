<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title') | {{ $setting->name ?? config('app.name', 'csms-figo!') }}</title>

    <!-- Custom fonts for this sb-admin-->
    <link href="{{ URL::asset('sb-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this sb-admin-->
    <link href="{{ URL::asset('sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap4.css"> --}}
    <link href="{{ URL::asset('sb-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('layouts.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content"
                style="background-image: url('{{ URL::asset('sb-admin/img/bg-content.jpg') }}'); background-size:cover">

                @include('layouts.header')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @hasSection('page-title')
                        <div class="app-toolbar">
                            <div class="app-container">
                                @yield('page-title')
                            </div>
                        </div>
                    @endif
                    <!-- Page Heading -->
                    <div class=" align-items-center justify-content-between mb-4">
                        @yield('content')
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src={{ URL::asset('sb-admin/vendor/jquery/jquery.min.js') }}></script>
    <script src={{ URL::asset('sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}></script>

    <!-- Core plugin JavaScript-->
    <script src={{ URL::asset('sb-admin/vendor/jquery-easing/jquery.easing.min.js') }}></script>

    <!-- Custom scripts for all pages-->
    <script src={{ URL::asset('sb-admin/js/sb-admin-2.min.js') }}></script>

    {{-- <!-- Page level plugins -->
    <script src={{URL::asset("sb-admin/vendor/chart.js/Chart.min.js")}}></script>

    <!-- Page level custom scripts -->
    <script src={{URL::asset("sb-admin/js/demo/chart-area-demo.js")}}></script>
    <script src={{URL::asset("sb-admin/js/demo/chart-pie-demo.js")}}></script> --}}
    {{-- 
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="{{ URL::asset('sb-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script> --}}

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    @stack('scripts')
</body>

</html>
