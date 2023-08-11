<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Crud</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>

    <!-- datepicker -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  

    <!-- Bootstrap Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


    <!-- CSS -->
    <style type="text/css">
       
    </style>
    <!-- end CSS -->
</head>



<!-- BODY -->
<body style="background-color: #769981;">

    <!-- Header menu bar -->
    <header>
        <div class="header-container">
            <h1 class="logo">
                    Contact Crud
            </h1>
            <nav>
                <ul>
                    <li><a href="/">Home</a></li>
                </ul>    
            </nav>
        </div>

    </header>

    <!-- Content for each page -->
    @yield('content')

</body>


<!-- SCRIPTS -->
<script>
$(document).ready(function(){

    //Time out for flash message
    setTimeout(function(){
       $("div.alert.alert-success").remove();
    }, 5000 ); // 5 secs

    setTimeout(function(){
       $("div.alert.alert-danger").remove();
    }, 5000 ); // 5 secs

});
</script>

</html>