<?php
require 'fungsi/fungsi.php';
?>

<?php
foreach (summon_admin() as $key) :
?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $judul; ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="<?= url() ?>img/logokasir.png">

    <link rel="stylesheet" href="<?= url() ?>plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="<?= url() ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <link rel="stylesheet" href="<?= url() ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="<?= url() ?>plugins/jqvmap/jqvmap.min.css">

    <link rel="stylesheet" href="<?= url() ?>dist/css/adminlte.min.css">

    <link rel="stylesheet" href="<?= url() ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <link rel="stylesheet" href="<?= url() ?>plugins/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" href="<?= url() ?>plugins/summernote/summernote-bs4.css">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>

  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="index.php" class="nav-link"><b>Home</b></a>
          </li>
        </ul>

        <!-- SEARCH FORM -->
        <form action="" method="POST" class="form-inline ml-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" name="cari" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" name="go" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>

        <!-- Right navbar links -->
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Logo -->
        <a href="index.php" class="brand-link">
          <img src="<?= url() ?>img/logokasir.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light"><b>Admin.</b></span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <?php
              if ($key['foto'] != '') {
                echo '<img src="img/' . $key['foto'] . '" height="150">';
              } else {
                echo '<img src="img/user_logo.png" height="150">';
              }
              ?>
            </div>
            <div class="info">
              <a href="index.php?m=pengguna&s=detail" class="d-block"><?= $key['nama']; ?></a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item has-treeview">
                <a href="index.php" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="info">
                    <a href="#" class="d-block">Menu</a>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a href="index.php?m=supplier&s=title" class="nav-link">
                  <i class="nav-icon fas fa-truck"></i>
                  <p>Supplier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?m=pelanggan&s=title" class="nav-link">
                  <i class="nav-icon fas fa-address-book"></i>
                  <p>Pelanggan</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-box"></i>
                  <p>
                    Produk
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right"></span>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="index.php?m=kategori&s=title" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Kategori Produk</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?m=satuan&s=title" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Satuan Produk</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?m=rak&s=title" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Rak Produk</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="index.php?m=produk&s=title" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Produk</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-archive"></i>
                  <p>
                    Stok
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="index.php?m=stokmasuk&s=title" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Stok Masuk</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fas fa-book nav-icon"></i>
                  <p>
                    Laporan
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="index.php?m=laporan&s=title" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Laporan Penjualan</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="index.php?m=pengguna&s=title" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Pengguna</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?m=pengguna&s=detail" class="nav-link">
                  <i class="fas fa-cog nav-icon"></i>
                  <p>Pengaturan</p>
                </a>
              </li>
              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                  <span class="d-block text-gray">Logout</span>
                </div>
              </div>
              <a href="logout.php"><button class="btn btn-danger"><i class="fa fa-power-off" aria-hidden="true"></i> <b>Logout</b></button></a>
              <br>
            </ul>
          </nav>
        </div>
      </aside>
    <?php
  endforeach;
    ?>