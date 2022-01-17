<!-- Bootstrap core JavaScript-->
<script src={{ asset('vendor/jquery/jquery.min.js') }}></script>
<script src={{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}></script>
<!-- Core plugin JavaScript-->
<script src={{ asset('vendor/jquery-easing/jquery.easing.min.js') }}></script>
<!-- Page level plugin JavaScript-->
<script src={{ asset('vendor/chart.js/Chart.js') }}></script>
<script src={{ asset('vendor/datatables/jquery.dataTables.js') }}></script>
<script src={{ asset('vendor/datatables/dataTables.bootstrap4.js') }}></script>
<script src={{ asset('vendor/jquery.selectbox-0.2.js') }}></script>
<script src={{ asset('vendor/retina-replace.min.js') }}></script>
<script src={{ asset('vendor/jquery.magnific-popup.min.js') }}></script>
<!-- Custom scripts for all pages-->
<script src={{ asset('js/admin/admin.js') }}></script>
<!-- Custom scripts for this page-->
<script src={{ asset('js/admin/admin-charts.js') }}></script>
@stack('scripts')
