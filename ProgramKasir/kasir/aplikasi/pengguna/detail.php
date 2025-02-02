<?php
include 'layout/header.php';
?>
<?php
if (isset($_POST['edit'])) {
  echo "<meta http-equiv='refresh' content='0'>";
  update_user();
}
?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Detail <?= $key['nama']; ?></h1><br>
        </div>

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Detail <?= $key['nama']; ?></li>
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
          <div class="table-responsive">
            <table class="table table-border">
              <tbody>
                <tr>
                  <td>Nama : </td>
                  <td><?php echo $key['nama']; ?></td>
                </tr>
                <tr>
                  <td>Level User : </td>
                  <td>
                    <?php
                    if ($key['level'] == "admin") {
                      echo '<b><p style="color: green;">admin</p></b>';
                    } else if ($key['level'] == "kasir") {
                      echo '<b><p style="color: blue;">kasir</p></b>';
                    }
                    ?>
                  </td>
                <tr>
                  <td>Foto : </td>
                  <td>
                    <?php
                    if ($key['foto'] != '') {
                      echo '<img src="../admin/img/' . $key['foto'] . '" data-target="#view_image" data-toggle="modal" height="150">';
                    } else {
                      echo '<img src="../admin/img/user_logo.png" height="150">';
                    }
                    ?>

                    <div class="modal fade" id="view_image" tabindex="-1" role="dialog" aria-labelledby="view_image" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <center><img src="../admin/img/<?= $key['foto']; ?>" height="512"></center>
                      </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <!-- Button Update -->
                    <div data-toggle="modal" data-target="#edit-profil<?= $key['id'] ?>">
                      <button type="button" class="btn btn-info datapotensi" data-toggle="tooltip" title="Edit">
                        <i class="fa fa-edit"></i> <b>Update</b>
                      </button>
                    </div>
                    <!-- Modal edit -->
                    <div class="modal fade" id="edit-profil<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit-profil<?= $adm['id'] ?>" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <b>
                              <p class="modal-title" id="edit-profil<?= $adm['id'] ?>" style="text-align: center; font-size: 18px;">Edit Data Kasir</p>
                            </b>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <!-- Modal Body -->
                          <div class="modal-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                              <input type="hidden" value="<?= $key['id'] ?>" name="id">

                              <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" value="<?= $key['username']; ?>" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Masukkan Username" required="">

                              </div>
                              <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" id="exampleInputEmail1" name="password" aria-describedby="emailHelp" required placeholder="Masukkan Password">

                              </div>
                              <div class="form-group">
                                <label>Nama Pengguna</label>
                                <input type="text" class="form-control" value="<?= $key['nama']; ?>" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" placeholder="Masukkan Nama" required="">

                              </div>
                              <div class="form-group">
                                <label>Level User</label>
                                <select type="text" class="form-control" value="<?= $key['level']; ?>" id="exampleInputEmail1" name="level" aria-describedby="emailHelp" placeholder="Masukkan Level">
                                  <option>admin</option>
                                  <option>kasir</option>
                                </select>
                              </div>

                              <div class="form-group">
                                <label>Foto User</label>
                                <br>
                                <?php
                                if ($key['foto'] != '') {
                                  echo '<img src="../admin/img/' . $key['foto'] . '" height="150">';
                                } else {
                                  echo '<img src="../admin/img/user_logo.png" height="150">';
                                }
                                ?>
                                <br>
                                <input type="checkbox" name="ubahfoto" value="true">Klik jika ingin mengubah foto <br>
                              </div>

                              <div class="form-group">
                                <label>Masukkan Foto Baru</label>
                                <input type="file" name="foto">
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
                  </td>
                </tr>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </section>
</div>

<?php
include 'layout/footer.php';
?>