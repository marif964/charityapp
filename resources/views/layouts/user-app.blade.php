<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Panel</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/theme-rtl.min.css') }}" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('admin/assets/css/theme.min.css') }}" rel="stylesheet" id="style-default">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.toast.min.css') }}" />
    <style type="text/css">
    	#wrapper #content-wrapper {
		    overflow-x: inherit !important;
		}
    </style>
    @yield('styles')

</head>

   <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
         @include('partial.user-side-menu')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

       		   @yield('content')

             </div>
            <!-- End of Main Content -->
 
         <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website {{ date('Y') }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

   </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    
<!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/assets/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('admin/assets/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin/assets/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin/assets/js/demo/chart-pie-demo.js') }}"></script>
    
    @yield('scripts')

    <script src="{{ asset('admin/assets/js/theme.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.toast.min.js') }}"></script>
    <script src="{{ asset('assets/js/alerts.js') }}"></script>
        @if(Session::has('successful_message'))
             <script type="text/javascript">
                 var mesg =  "{{Session::get('successful_message') }}";
                 $(document).find('#mg').text('Success');
                 showSuccessToast(mesg);
             </script>
         @endif
         @if(Session::has('error_message'))
             <script type="text/javascript">
               var mesg =  "{{Session::get('error_message') }}";
               showWarningToast(mesg);

         </script>
         @endif 

       
</body>

</html>