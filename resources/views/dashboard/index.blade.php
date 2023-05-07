<!DOCTYPE html>
<html lang="en">

<head>

    @include('dashboard.header')

</head>

<body class="hold-transition sidebar-mini layout-fixed sidebar-open">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('dashboard.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('dashboard.sidebar')
        <!-- Main Sidebar Container End -->

        <!-- Content Wrapper. Contains page content -->

        @yield('content')
        <!-- /.content-wrapper -->

        <!-- Footer Start -->
        @include('dashboard.footer')
        <!-- Footer End -->

        <!-- Sweet Alert -->
        @include('sweetalert::alert')
        <!-- Sweet Alert End -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('dashboard.js')

</body>

</html>
