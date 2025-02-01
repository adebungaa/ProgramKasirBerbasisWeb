<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'kelompok2b');
global $koneksi;

$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM tb_produk");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$nomor = $halaman_awal + 1;

// Fitur Searching
if (isset($_POST['go'])) {
  $cari = $_POST['cari'];
  $data_produk = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE nm_produk LIKE '%" . $cari . "%'");
} else {
  $data_produk = mysqli_query($koneksi, "SELECT * FROM tb_produk LIMIT $halaman_awal, $batas");
}

foreach ($data_produk as $pro) :
?>

  <tr>
    <td><?= $i++;  ?></td>
    <td><?= $pro['kdproduk']; ?></td>
    <td><?= $pro['nm_produk']; ?></td>
    <td><?= $pro['kategori']; ?></td>
    <td><?= $pro['stok']; ?></td>
    <td><?= $pro['satuan']; ?></td>
    <td><?= $pro['rak']; ?></td>
    <td><?= $pro['supplier']; ?></td>

    <td><?php

        if ($pro['stok'] > 0) {
          echo '<p style="color: green;"><b>Ada</b></p>';
        } else if ($pro['stok'] == 0) {
          echo '<p style="color: red;"><b>Habis</b></p>';
        } else if ($pro['stok'] < 0) {
          echo '<p style="color: blue;"><b>Stok Kurang</b></p>';
        }

        ?></td>
    <td><?= rupiah($pro['harga']); ?></td>
  </tr>
<?php endforeach; ?>