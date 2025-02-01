<?php
include 'layout/header_home.php';
?>
<?php

error_reporting(0);

date_default_timezone_set("Asia/Jakarta");
$tanggalSekarang = date("Y-m-d");
$jamSekarang = date("h:i a");

if (isset($_POST['simpan'])) {
  insert_transaksi();
}

if (isset($_POST['simpan_transaksi'])) {
  echo "<meta http-equiv='refresh' content='0'>";
  update_transaksi_1();
}

if (isset($_GET['print'])) {
  header("location: print.php");
}

global $koneksi;
$select_2 = mysqli_query($koneksi, "SELECT * FROM transaksi_temp");
$row = mysqli_fetch_array($select_2);

?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Transaksi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Transaksi</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-sm-12">
          <div class="well">

            <!-- form pesanan keranjang -->
            <form action="" method="POST">
              <input type="text" autofocus="" required="" name="cari"><br><br>
              <button type="submit" name="go" class="btn btn-primary"><b>Cari Produk</b></button>
            </form>
            <form action="" method="POST" class="mb-2">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-body">
                      <div class="table-responsive table--card-body m-b-30">
                        <table class="table table-bordered table-striped table-earning">
                          <tr>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                          </tr>
                          <?php
                          global $koneksi;
                          if (isset($_POST['go'])) {
                            $cari = $_POST['cari'];
                            $select_c = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE nm_produk LIKE '%" . $cari . "%'");
                          } else {
                          }

                          foreach ($select_c as $res) :

                          ?>
                            <tr>
                              <td>
                                <?php echo $res['kdproduk']; ?>
                                <input type="hidden" readonly="" class="" required="" name="kdproduk" value="<?= $res['kdproduk']; ?>" class="" placeholder="Kode Produk">
                              </td>
                              <td>
                                <?php echo $res['nm_produk']; ?>
                                <input type="hidden" readonly="" class="" required="" name="nm_produk" value="<?= $res['nm_produk']; ?>" class="" placeholder="Nama Produk">
                              </td>
                              <td>
                                <?php echo $res['kategori']; ?>
                                <input type="hidden" readonly="" class="" required="" name="kategori" value="<?= $res['kategori']; ?>" class="" placeholder="Nama Kategori">
                              </td>
                              <td>
                                <?php echo $res['stok']; ?>
                                <input type="hidden" readonly="" class="" required="" name="stok" value="<?= $res['stok']; ?>" class="" placeholder="Jumlah stok">
                              </td>
                              <td>
                                <?php echo $res['harga']; ?>
                                <input type="hidden" readonly="" class="" required="" name="harga" value="<?= $res['harga']; ?>" class="" placeholder="Kode Produk">
                                <input type="hidden" name="tanggal" value="<?= $tanggalSekarang; ?>">
                                <input type="hidden" name="jam" value="<?= $jamSekarang; ?>">
                                <input type="hidden" name="kasir" value="<?= $key['nama']; ?>">

                              </td>

                              <td><button type="" name="simpan" class="btn btn-primary"><i class="fa fa-plus"></i></button></td>
                            <?php endforeach; ?>
                            </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
            </form>
            <!-- END FORM PESANAN -->
            <div class="row">
              <div class="col-sm-12">
                <div class="card-body">
                  <div class="table-responsive table--card-body m-b-30">
                    <table class="table table-bordered table-striped table-earning">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Produk</th>
                          <th>Jumlah Beli</th>
                          <th>Harga</th>
                          <th>Aksi </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        global $koneksi;
                        $select = mysqli_query($koneksi, "SELECT * FROM transaksi_temp");
                        foreach ($select as $krj) :
                        ?>
                          <tr>
                            <td><?= $i++; ?></td>

                            <td><?= $krj['nm_produk']; ?></td>
                            <td>
                              <form action="" method="POST">
                                <input type="number" value="<?= $krj['jumlah_beli']; ?>" name="jumlah_beli">
                            </td>
                            <td>
                              <input type="text" value="<?= $krj['id']; ?>" name="id" hidden>
                              <input type="hidden" name="kdproduk" value="<?= $krj['kdproduk']; ?>">

                              <input type="text" value="<?= $krj['total']; ?>" readonly name="harga" hidden>
                              <?= $krj['total']; ?>
                              
                              <input type="hidden" name="stok" value="<?= $krj['stok']; ?>">
                            </td>

                            <td><button type="submit" name="simpan_transaksi" class="btn btn-primary"><i class="fa fa-edit"></i></button>
                              <a href="fungsi/delete.php?id=<?= $krj['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>

                          <?php endforeach; ?>
                          </tr>
                          </form>
                      </tbody>
                    </table>

                  </div>
                  <br>
                  <?php

                  if (!empty(isset($_POST['bayar_submit']))) {
                    global $koneksi;
                    $total = $_POST['total'];
                    $bayar = $_POST['bayar'];

                    // kembalian + hitung

                    if ($bayar < $total) {
                      $kurang = $total - $bayar;
                      echo '<div class="alert alert-danger" role="alert">
                            uang anda kurang ' . rupiah($kurang) . ' !
                            </div>';
                    } else {
                      $kembalian = $bayar - $total;
                    }
                  }

                  ?>
                  <form action="" method="POST">
                    <label>Total</label>
                    <?php
                    global $koneksi;
                    $query = mysqli_query($koneksi, "SELECT sum(total) as jtotal FROM transaksi_temp");
                    $r = mysqli_fetch_array($query);
                    ?>
                    <input type="number" name="total" value="<?= $r['jtotal']; ?>">
                    <label>Bayar</label>
                    <input type="number" name="bayar">
                    <button type="submit" class="btn btn-success" required name="bayar_submit"><b>Bayar</b></button>
                    <label>Kembalian</label>
                    <input type="number" name="kembalian" value="<?= $kembalian; ?>" readonly="">

                  </form>

                  <!-- Print -->

                  <form action="fungsi/print.php" target="_BLANK" method="POST">

                    <input type="hidden" name="total" value="<?= $total; ?>">

                    <input type="hidden" name="bayar" value="<?= $bayar; ?>">

                    <input type="hidden" name="kembalian" readonly="" value="<?= $kembalian; ?>">

                    <input type="hidden" name="kasir" value="<?= $key['nama']; ?>">
                    <table class="table-responsive">
                      <tr>

                        <td><a href="index.php"><button type="submit" name="print" class="btn btn-primary" <?php

                                                                                                            if (empty(isset($_POST['bayar']))) {
                                                                                                              echo "disabled";
                                                                                                            } else if (isset($_POST['bayar'])) {
                                                                                                              $total = $_POST['total'];
                                                                                                              $bayar = $_POST['bayar'];

                                                                                                              if ($bayar < $total) {
                                                                                                                echo "disabled";
                                                                                                              }
                                                                                                            }

                                                                                                            ?>><b>Print Data</b></button></a></td>
                      </tr>
                    </table>
                  </form>

                </div>
              </div>
              <?php  ?>
            </div>

  </section>

</div>

<?php
include 'layout/footer.php';
?>