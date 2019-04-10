<!DOCTYPE html>
<html>

<head>
    @include('sama.head')
    @yield('additionstyle')
</head>

<body>
    <div id="wrapper">
        
    @include('admin.menu')
        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        @include('admin.topmenu')
        </div>
            
            @yield('isi')
            <!-- Start content -->
            
                @include('sama.footer')
            </div>
        </div>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{url('assets/js/vendor/jquery/jquery-2.1.1.js')}}"></script>
    <script src="{{url('assets/js/vendor/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{url('assets/js/inspinia.js')}}"></script>
    <script src="{{url('assets/js/plugins/pace/pace.min.js')}}"></script>

    <!-- Toastr -->
    <script src="{{url('assets/js/plugins/toastr/toastr.min.js')}}"></script>
    @yield('jsmore')
</body>
</html>
