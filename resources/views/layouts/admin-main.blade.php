<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Voting System</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/skins/_all-skins.min.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/morris.js/morris.css') }}">
      <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet"
        href="{{ asset('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <!-- CK Editor -->
<script src="{{asset('assets/bower_components/ckeditor/ckeditor.js')}}"></script>
    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <header class="main-header">
            @include('layouts.components.navbar')
        </header>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar">
            @include('layouts.components.sidebar')
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                @yield('active')
            </section>
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2023 <a href="#">WebTech.Co</a>.</strong> All rights
            reserved.
        </footer>
    </div>

    <!-- jQuery 3 -->
    <script src="{{ asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Morris.js charts -->
    <script src="{{ asset('assets/bower_components/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/morris.js/morris.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('assets/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('assets/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('assetsbower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>

    <!-- DataTables -->
    <script src="{{asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    @yield('scripts')
</body>

</html>
