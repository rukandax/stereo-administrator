<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $title ?></title>

  <?= link_tag("https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i") ?>
  <?= link_tag("/public/vendor/fontawesome-free/css/all.min.css") ?>
  <?= link_tag("/public/vendor/datatables/dataTables.bootstrap4.min.css") ?>
  <?= link_tag("/public/css/sb-admin-2.min.css") ?>
  <?= link_tag("/public/css/global-custom.css") ?>

  <?php
  foreach ($style as $key => $value) {
    ?>
    <?= link_tag($value) ?>
    <?php
  }
  ?>
</head>
<body id="application">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center bg-white" href="<?= base_url() ?>">
        <img src="<?= base_url('/public/image/logo.png') ?>" alt="Bank BTN" class="w-100" />
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <hr class="sidebar-divider">

      <?php
      require_once('sidebar.php');

      $num = 1;

      foreach ($sidebar as $key => $value) {
        switch($value['type']) {
          case 'divider':
            ?>
            <hr class="sidebar-divider">
            <?php
            break;
          case 'header':
            ?>
            <div class="sidebar-heading">
              <?= $value['text'] ?>
            </div>
            <?php
            break;
          case 'collapse':
            ?>
            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#identifier<?= $num ?>" aria-expanded="true" aria-controls="identifier<?= $num ?>">
                <i class="fas fa-fw <?= $value['icon'] ?>"></i>
                <span><?= $value['text'] ?></span>
              </a>
              <div id="identifier<?= $num ?>" class="collapse" aria-labelledby="heading<?= $num ?>" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <?php
                  foreach ($value['item'] as $keyItem => $valueItem) {
                    ?>
                    <a class="collapse-item" href="<?= base_url($valueItem['link']) ?>"><?= $valueItem['text'] ?></a>
                    <?php
                  }
                  ?>
                </div>
              </div>
            </li>
            <?php
            break;
        }

        $num++;
      }
      ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-4 d-none d-lg-inline text-gray-600">Valerie Luna</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?= $content ?>
        </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; PT Provalindo 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <?php
  if (!empty($_SESSION['notify'])) {
    ?>
    <div id="notify" data-type="<?= $_SESSION['notify']['type'] ?>" hidden><?= $_SESSION['notify']['text'] ?></div>
    <?php
    unset($_SESSION['notify']);
  }
  ?>

  <!-- Script From Theme -->
  <script src="<?= base_url('/public/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('/public/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('/public/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
  <script src="<?= base_url('/public/js/sb-admin-2.min.js') ?>"></script>
  <script src="<?= base_url('/public/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
  <script src="<?= base_url('/public/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

  <!-- Script For Notify -->
  <script src="<?= base_url('/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js') ?>"></script>

  <script>
    if ($('#notify') && $('#notify').text()) {
      setTimeout(function() {
        $.notify($('#notify').text(), {
          placement: {
            from: "top",
            align: "center"
          },
          allow_dismiss: true,
          newest_on_top: true,
          type: $('#notify').data('type') || 'info',
        });
      }, 500);
    }
  </script>

  <?php
  foreach ($script as $key => $value) {
    ?>
    <script src="<?= base_url($value) ?>"></script>
    <?php
  }
  ?>
</body>
</html>
