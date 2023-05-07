<!-- jQuery -->
<script src="{{ asset('dashboard/admin') }}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('dashboard/admin') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge("uibutton", $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('dashboard/admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('dashboard/admin') }}/plugins/chart.js/Chart.min.js"></script>
<!-- Treeview -->
<script src="{{ asset('dashboard/admin') }}/build/js/treeview.js"></script>
<!-- Sparkline -->
<script src="{{ asset('dashboard/admin') }}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('dashboard/admin') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('dashboard/admin') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('dashboard/admin') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('dashboard/admin') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('dashboard/admin') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('dashboard/admin') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<!-- Summernote -->
<script src="{{ asset('dashboard/admin') }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('dashboard/admin') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dashboard/admin') }}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dashboard/admin') }}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dashboard/admin') }}/dist/js/pages/dashboard.js"></script>
<!--picker-->
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"
    integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA=="
    crossorigin="anonymous"></script>
<!-- js untuk select2  -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    //Initialize Select2 Elements
    $('.select2').select2()
</script>

@yield('script')

<script>
    // Ubah Modal Gambar
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

<script>
    // ckeditor
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    // ckeditor
    ClassicEditor
        .create(document.querySelector('#editor3'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    // ckeditor
    ClassicEditor
        .create(document.querySelector('#editor4'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    // ckeditor
    ClassicEditor
        .create(document.querySelector('#editor5'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    // ckeditor
    ClassicEditor
        .create(document.querySelector('#editor6'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    // ckeditor
    ClassicEditor
        .create(document.querySelector('#editor7'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    // ckeditor
    ClassicEditor
        .create(document.querySelector('#editor8'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    // ckeditor
    ClassicEditor
        .create(document.querySelector('#editor9'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    // ckeditor
    ClassicEditor
        .create(document.querySelector('#editor0'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    // ckeditor
    ClassicEditor
        .create(document.querySelector('#editor11'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    // ckeditor
    ClassicEditor
        .create(document.querySelector('#editor12'))
        .catch(error => {
            console.error(error);
        });
</script>

<script>
    // datetimepicker
    $(function() {
        $('#datetimepicker').datetimepicker({
            // format: 'L'
        });
        $('#datetimepicker1').datetimepicker({
            // format: 'L'
        });
    });
</script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('dashboard/admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('dashboard/admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('dashboard/admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('dashboard/admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('dashboard/admin') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('dashboard/admin') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('dashboard/admin') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('dashboard/admin') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('dashboard/admin') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('dashboard/admin') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('dashboard/admin') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('dashboard/admin') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
