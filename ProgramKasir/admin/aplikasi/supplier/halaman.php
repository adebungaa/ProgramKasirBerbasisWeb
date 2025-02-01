<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'kelompok2b');
global $koneksi;

$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM supplier");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$nomor = $halaman_awal + 1;

// Fitur Searching
if (isset($_POST['go'])) {
  $cari = $_POST['cari'];
  $data_supplier = mysqli_query($koneksi, "SELECT * FROM supplier WHERE namaspl LIKE '%" . $cari . "%'");
} else {
  $data_supplier = mysqli_query($koneksi, "SELECT * FROM supplier LIMIT $halaman_awal, $batas");
}

foreach ($data_supplier as $pro) :
?>

  <tr>
    <td><?= $i++;  ?></td>
    <td><?= $pro['kdspl']; ?></td>
    <td><?= $pro['namaspl']; ?></td>
    <td><?= $pro['alamatspl']; ?></td>
    <td><?= $pro['kontakspl']; ?></td>

    <td>

      <!-- Trigger Modal Edit -->
      <div data-toggle="modal" data-target="#edit-sup<?= $pro['id'] ?>">
        <button type="button" class="btn btn-info datapotensi" data-toggle="tooltip" title="Edit">
          <i class="fa fa-edit"></i> <b>Update</b>
        </button>
      </div>

      <!-- Modal Edit-->
      <div class="modal fade" id="edit-sup<?= $pro['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <b>
                <p class="modal-title" id="edit-sup<?= $pro['id'] ?>" style="text-align: center; font-size: 18px;">Edit Data Supplier</p>
              </b>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="<?= $pro['id']; ?>" name="id">
                <div class="form-group">
                  <label>Kode Supplier</label>
                  <input type="text" class="form-control" value="<?= $pro['kdspl']; ?>" id="exampleInputEmail1" name="kdspl" aria-describedby="emailHelp" required="">

                </div>
                <div class="form-group">
                  <label>Nama Supplier</label>
                  <input type="text" name="namaspl" value="<?= $pro['namaspl']; ?>" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Alamat Supplier</label>
                  <input type="text" name="alamatspl" value="<?= $pro['alamatspl']; ?>" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Kontak Supplier</label>
                  <input type="text" name="kontakspl" value="<?= $pro['kontakspl']; ?>" class="form-control" required="">
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="edit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <br>
      <!-- Trigger Modal Hapus -->
      <div data-toggle="modal" data-target="#hapus-sup<?= $pro['id'] ?>">
        <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Hapus">
          <i class="fa fa-trash"></i> <b>Delete</b>
        </button>
      </div>

      <!-- Modal Hapus -->
      <form action="" method="POST">
        <div class="modal fade" id="hapus-sup<?= $pro['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <b>
                  <p class="modal-title" id="hapus-sup<?= $pro['id'] ?>" style="text-align: center; font-size: 18px;">Apakah Anda Yakin Ingin Menghapus ?</p>
                </b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="modal-body">

                  <p>Kode Supplier</p>
                  <b>
                    <p><?= $pro['kdspl'] ?></p>
                  </b>
                  <p>Nama Supplier</p>
                  <b>
                    <p><?= $pro['namaspl']; ?></p>
                  </b>
                  <p>Alamat Supplier</p>
                  <b>
                    <p><?= $pro['alamatspl']; ?></p>
                  </b>
                  <p>Kontak Supplier</p>
                  <b>
                    <p><?= $pro['kontakspl']; ?></p>
                  </b>

                  <input type="hidden" name="id" value="<?= $pro['id'] ?>" class="form-control" hidden>
                </div>

              </div>
              <div class="modal-footer">
                <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              </div>
            </div>
          </div>
        </div>
      </form>

    </td>
  </tr>
<?php endforeach; ?>