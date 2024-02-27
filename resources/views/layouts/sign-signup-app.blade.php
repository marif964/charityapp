<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @yield('title')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="./login.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.toast.min.css') }}" /> 
    <style>
            label {
                font-weight: 700;
            }

            @media (max-width:770px) {
                .forget-pass {
                    width: 80% !important;
                }

            }

            @media (max-width:460px) {
                .forget-pass {
                    width: 90% !important;
                }

            }
    </style>
    @stack('styles')
</head>

<body>
   

    @yield('content')

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    @stack('scripts')
    <script src="{{ asset('assets/js/jquery.toast.min.js') }}"></script>
    <script src="{{ asset('assets/js/alerts.js') }}"></script>
        
         @if(Session::has('error_message'))
             <script type="text/javascript">
               var mesg =  "{{Session::get('error_message') }}";
               showWarningToast(mesg);

         </script>
         @endif 
</body>
</html>