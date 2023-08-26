@include('layouts.partials.head')

<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('layouts.partials._navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('layouts.partials._sidebar')
        <!-- partial -->
        <div class="main-panel">
            @yield('content')

            @yield('content_data')
            <!-- partial:partials/_footer.html -->
            @include('layouts.partials._footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
@include('layouts.partials.scripts')

@stack('scripts')

@yield('page_script')
</body>
</html>













