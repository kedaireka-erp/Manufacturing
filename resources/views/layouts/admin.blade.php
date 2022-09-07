<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Astral Alumunium allure</title>
    <x-style></x-style>
</head>

<body>
    <div class="container-scroller">
        <x-navbar></x-navbar>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <x-sidebar></x-sidebar>
            <!-- partial -->
            <div class="main-panel">

                <!-- content-wrapper ends -->
                @yield('content')
                <x-footer></x-footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <x-script></x-script>
    @stack('script')
        
    
</body>

</html>
