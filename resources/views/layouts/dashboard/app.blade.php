@include('layouts.dashboard.header')

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

      @include('layouts.dashboard.sidebar')
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          @include('layouts.dashboard.navbar')

          @yield('body')

        </div>
        <!-- End of Main Content -->

        @include('layouts.dashboard.footer')
      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>


