<!DOCTYPE html>
<html lang="en">
    @include('admin.components.header')
    <body class="fixed-nav sticky-footer" id="page-top">
    <!-- Navigation-->
   @include('admin.components.sidebar', ['sizeConfirm' => 0])
    <!-- /Navigation-->
        @yield('body')
        <!-- /.container-wrapper-->
           @include('admin.components.footer')
        <!-- Scroll to Top Button-->
           @include('admin.components.miniComponents.scrollToTop')
        <!-- Logout Modal-->
           @include('admin.components.miniComponents.logoutModal')
           @include('admin.components.script')
</body>
</html>
