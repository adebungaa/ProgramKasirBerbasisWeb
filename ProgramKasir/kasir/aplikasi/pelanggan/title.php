<?php
include 'layout/header.php';
?>
<?php

if (isset($_POST['simpan'])) {
  insert_pelanggan();
}

if (isset($_POST['hapus'])) {
  hapus_pelanggan();
}

if (isset($_POST['edit'])) {
  update_pelanggan();
}

?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Pelanggan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Pelanggan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->

      <div class="row">
        <div class="col-sm-12">
          <div class="well">
            <!-- button trigger modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
              <b>Tambah Data Pelanggan</b>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><b>Tambah Data Pelanggan</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">

                      <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="namapel" aria-describedby="emailHelp" required="">

                      </div>
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="jeniskel" aria-describedby="emailHelp" required="">

                      </div>
                      <div class="form-group">
                        <label>Alamat Pelanggan</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="alamat" aria-describedby="emailHelp" required="">

                      </div>
                      <div class="form-group">
                        <label>Kontak Pelanggan</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="kontak" aria-describedby="emailHelp" required="">

                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="card-body">
            <div class="table-responsive table--card-body m-b-30">
              <table class="table table-bordered table-striped table-earning">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Kontak</th>
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
                                        echo "href='?m=pelanggan&s=title&halaman=$previous'";
                                      } ?>>Previous</a>
              </li>
              <?php
              for ($x = 1; $x <= $total_halaman; $x++) {
              ?>
                <li class="page-item"><a class="page-link" href="?m=pelanggan&s=title&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
              <?php
              }
              ?>
              <li class="page-item">
                <a class="page-link" <?php if ($halaman < $total_halaman) {
                                        echo "href='?m=pelanggan&s=title&halaman=$next'";
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