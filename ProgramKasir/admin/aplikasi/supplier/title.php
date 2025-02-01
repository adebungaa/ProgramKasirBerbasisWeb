<?php
include 'layout/header.php';
?>
<?php

if (isset($_POST['simpan'])) {
  insert_supplier();
}

if (isset($_POST['hapus'])) {
  hapus_supplier();
}

if (isset($_POST['edit'])) {
  update_supplier();
}

?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Supplier</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Supplier</li>
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
              <b>Tambah Data Supplier</b>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><b>Tambah Data Supplier</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">

                      <div class="form-group">
                        <label>Kode Supplier</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="kdspl" aria-describedby="emailHelp" required="">

                      </div>
                      <div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="namaspl" aria-describedby="emailHelp" required="">

                      </div>
                      <div class="form-group">
                        <label>Alamat Supplier</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="alamatspl" aria-describedby="emailHelp" required="">

                      </div>
                      <div class="form-group">
                        <label>Kontak Supplier</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="kontakspl" aria-describedby="emailHelp" required="">

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
                    <th>Kode Supplier</th>
                    <th>Nama Supplier</th>
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
                                        echo "href='?m=supplier&s=title&halaman=$previous'";
                                      } ?>>Previous</a>
              </li>
              <?php
              for ($x = 1; $x <= $total_halaman; $x++) {
              ?>
                <li class="page-item"><a class="page-link" href="?m=supplier&s=title&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
              <?php
              }
              ?>
              <li class="page-item">
                <a class="page-link" <?php if ($halaman < $total_halaman) {
                                        echo "href='?m=supplier&s=title&halaman=$next'";
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