<?php
include 'layout/header.php'; ?>
<?php

date_default_timezone_set("Asia/Jakarta");
$tanggalSekarang = date("Y-m-d");
$jamSekarang = date("h:i a");
if (isset($_POST['hapus'])) {
  delete_pro_masuk();
}
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Stok Masuk</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Stok Masuk</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-12">
          <div class="well">
            <!-- button trigger modal -->
            <a href="index.php?m=stokmasuk&s=stokmasuk"><button type="button" class="btn btn-primary">
                <b>Tambah Data Stok</b>
              </button></a>

            <div class="row">
              <div class="col-sm-12">
                <div class="card-body">
                  <div class="table-responsive table--card-body m-b-30">
                    <table class="table table-bordered table-striped table-earning">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>No Invoice</th>
                          <th>Tanggal</th>
                          <th>Jam</th>
                          <th>Kode Produk</th>
                          <th>Nama Produk</th>
                          <th>Kategori</th>
                          <th>Rak</th>
                          <th>Supplier</th>
                          <th>Stok</th>
                          <th>Jumlah Masuk</th>
                          <th>Admin</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        include 'halaman.php';
                        ?>

                      </tbody>
                    </table>

                  </div>
                </div>
                <center>
                  <ul class="pagination justify-content-center">
                    <li class="page-item">
                      <a class="page-link" <?php if ($halaman > 1) {
                                              echo "href='?m=stokmasuk&s=title&halaman=$previous'";
                                            } ?>>Previous</a>
                    </li>
                    <?php
                    for ($x = 1; $x <= $total_halaman; $x++) {
                    ?>
                      <li class="page-item"><a class="page-link" href="?m=stokmasuk&s=title&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
                    }
                    ?>
                    <li class="page-item">
                      <a class="page-link" <?php if ($halaman < $total_halaman) {
                                              echo "href='?m=stokmasuk&s=title&halaman=$next'";
                                            } ?>>Next</a>
                    </li>
                  </ul>
                </center>
              </div>

            </div>

  </section>
</div>
<?php
include 'layout/footer.php';
?>