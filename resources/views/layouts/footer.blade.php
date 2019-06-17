<script src="{{asset('smartrestaux/js/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('smartrestaux/js/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('smartrestaux/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('smartrestaux/js/raphael.min.js')}}"></script>
<script src="{{asset('smartrestaux/js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('smartrestaux/js/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('smartrestaux/js/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('smartrestaux/js/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('smartrestaux/js/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('smartrestaux/js/moment.min.js')}}"></script>
<script src="{{asset('smartrestaux/js/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('smartrestaux/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('smartrestaux/js/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('smartrestaux/js/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('smartrestaux/js/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('smartrestaux/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('smartrestaux/js/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('smartrestaux/js/demo.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('smartrestaux/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('smartrestaux/js/dataTables.bootstrap.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('smartrestaux/js/select2.full.min.js')}}"></script>

<!-- page script -->
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>