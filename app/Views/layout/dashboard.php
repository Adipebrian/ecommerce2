<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="/icon.png" type="image/x-icon">
  <title>Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url() ?>/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url() ?>/adminlte/plugins/summernote/summernote-bs4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>/adminlte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url() ?>/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="<?= base_url() ?>/adminlte/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/adminlte/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav style="background-color: #c1f8cf; color:#000;" class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->


    <?= $this->include('layout/sidebar') ?>
    <!-- Flashdata -->
    <div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
    <div class="flash-data-warning" data-flashdata="<?= session()->getFlashdata('failed'); ?>"></div>
    <?= $this->renderSection('content') ?>



    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Adi
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2022</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="<?= base_url() ?>/adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- Select2 -->
  <script src="<?= base_url() ?>/adminlte/plugins/select2/js/select2.full.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="<?= base_url() ?>/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/jszip/jszip.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url() ?>/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- dropzonejs -->
  <script src="<?= base_url() ?>/adminlte/plugins/dropzone/min/dropzone.min.js"></script>
  <!-- Summernote -->
  <script src="<?= base_url() ?>/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/adminlte/dist/js/adminlte.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="<?= base_url() ?>/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Datatable script -->
  <script>
    $(function() {
      // Summernote
      $('.summernote').summernote();
      // $(".smartsearch_keyword").select2();
      $("#jns").select2();
      $(".select2").select2();
    })
  </script>
  <script>
    $(function() {
      $('#example1').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'print',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'copy',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'excel',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'csv',
            exportOptions: {
              columns: ':visible'
            }
          },
          'colvis'
        ],
        columnDefs: [{
          visible: false
        }],
        "fixedHeader": true,
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        paging: false,
        scrollY: 400,
        scrollCollapse: true,
        scroller: true
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
      $('#example3').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
      $('#example4').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'print',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'copy',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'excel',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'csv',
            exportOptions: {
              columns: ':visible'
            }
          },
          'colvis'
        ],
        columnDefs: [{
          // targets: -4,
          visible: false
        }],
        "fixedHeader": true,
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
  <script>
    function previewImg() {
      const foto = document.querySelector('#foto');
      const imgPreview = document.querySelector('.img-preview');
      const fileFoto = new FileReader();
      fileFoto.readAsDataURL(foto.files[0]);
      fileFoto.onload = function(e) {
        imgPreview.src = e.target.result;
      }
    }

    function previewImg2() {
      const foto = document.querySelector('#foto2');
      const imgPreview = document.querySelector('.img-preview2');
      const fileFoto = new FileReader();
      fileFoto.readAsDataURL(foto.files[0]);
      fileFoto.onload = function(e) {
        imgPreview.src = e.target.result;
      }
    }
    function previewImg3() {
      const foto = document.querySelector('#foto3');
      const imgPreview = document.querySelector('.img-preview3');
      const fileFoto = new FileReader();
      fileFoto.readAsDataURL(foto.files[0]);
      fileFoto.onload = function(e) {
        imgPreview.src = e.target.result;
      }
    }
    function previewImg4() {
      const foto = document.querySelector('#foto4');
      const imgPreview = document.querySelector('.img-preview4');
      const fileFoto = new FileReader();
      fileFoto.readAsDataURL(foto.files[0]);
      fileFoto.onload = function(e) {
        imgPreview.src = e.target.result;
      }
    }
  </script>
  <script>
    const flashDataSuccess = $('.flash-data-success').data('flashdata');
    const flashDataWarning = $('.flash-data-warning').data('flashdata');
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: true,
      timer: 3000
    });
    if (flashDataSuccess) {
      Toast.fire({
        icon: 'success',
        title: flashDataSuccess,
      })
    }
    if (flashDataWarning) {
      Toast.fire({
        icon: 'warning',
        title: flashDataWarning
      })
    }
  </script>


</body>

</html>