<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'kelompok2b');
global $koneksi;

$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM satuan");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$nomor = $halaman_awal + 1;

// Fitur Searching
if (isset($_POST['go'])) {
  $cari = $_POST['cari'];
  $data_satuan = mysqli_query($koneksi, "SELECT * FROM satuan WHERE satuan LIKE '%" . $cari . "%'");
} else {
  $data_satuan = mysqli_query($koneksi, "SELECT * FROM satuan LIMIT $halaman_awal, $batas");
}

foreach ($data_satuan as $pro) :
?>

  <tr>
    <td><?= $i++;  ?></td>
    <td><?= $pro['satuan']; ?></td>
    <td>

      <!-- Trigger Modal Edit -->
      <div data-toggle="modal" data-target="#edit-kat<?= $pro['id'] ?>">
        <button type="button" class="btn btn-info datapotensi" data-toggle="tooltip" title="Edit">
          <i class="fa fa-edit"></i> <b>Update</b>
        </button>
      </div>

      <!-- Modal Edit-->
      <div class="modal fade" id="edit-kat<?= $pro['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit-kat<?= $pro['id'] ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <b>
                <p class="modal-title" id="edit-satuan<?= $pro['id'] ?>" style="text-align: center; font-size: 18px;">Edit Data Satuan</p>
              </b>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="<?= $pro['id']; ?>" name="id">
                <div class="form-group">
                  <label>Nama Satuan</label>
                  <input type="text" class="form-control" value="<?= $pro['satuan']; ?>" id="exampleInputEmail1" name="satuan" aria-describedby="emailHelp" required="">

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
      <div data-toggle="modal" data-target="#hapus-kat<?= $pro['id'] ?>">
        <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Hapus">
          <i class="fa fa-trash"></i> <b>Delete</b>
        </button>
      </div>

      <!-- Modal Hapus -->
      <form action="" method="POST">
        <div class="modal fade" id="hapus-kat<?= $pro['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <b>
                  <p class="modal-title" id="hapus-kat<?= $pro['id'] ?>" style="text-align: center; font-size: 18px;">Apakah Anda Yakin Ingin Menghapus ?</p>
                </b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="modal-body">

                  <p>Nama Satuan</p>
                  <b>
                    <p><?= $pro['satuan'] ?></p>
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