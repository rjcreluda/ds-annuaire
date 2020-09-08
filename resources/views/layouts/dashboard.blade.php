    @include('admin.inc.header')
    <!-- Sidebar -->
    @include('admin.inc.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('admin.inc.topnav')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          @include('admin.inc.message')

          @yield('content')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

@include('admin.inc.footer')
