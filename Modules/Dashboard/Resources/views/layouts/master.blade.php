@include('dashboard::layouts.header')
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    @include('dashboard::layouts.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include('dashboard::layouts.topbar')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
           @yield('content')
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        @include('dashboard::layouts.copyright')
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
@include('dashboard::layouts.footer')
