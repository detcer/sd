
<!-- ================== BEGIN BASE JS ================== -->
<script src="{{ asset('admin/assets/js/app.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/theme/default.min.js') }}"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{ asset('admin/assets/plugins/d3/d3.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/nvd3/build/nv.d3.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/jvectormap-next/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/gritter/js/jquery.gritter.js') }}"></script>
<script src="{{ asset('admin/assets/js/demo/dashboard-v2.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
<script src="{{asset('js/myjs.js')}}"               ></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js" ></script>

<script src="{{ asset('admin/assets/js/myjs.js') }}"></script>

<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function() {
        $('#editorArea').summernote({
            height:600,
        });

        $('#editorArea2').summernote({
            height:600,
        });

    });
</script>
</body>
</html>
