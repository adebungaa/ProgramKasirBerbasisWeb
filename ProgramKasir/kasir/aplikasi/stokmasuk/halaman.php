<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'kelompok2b');
global $koneksi;

$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM stok_masuk");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$nomor = $halaman_awal + 1;

// Fitur Searching
if (isset($_POST['go'])) {
  $cari = $_POST['cari'];
  $data_stokmasuk = mysqli_query($koneksi, "SELECT * FROM stok_masuk WHERE nm_produk LIKE '%" . $cari . "%'");
} else {
  $data_stokmasuk = mysqli_query($koneksi, "SELECT * FROM stok_masuk LIMIT $halaman_awal, $batas");
}

foreach ($data_stokmasuk as $pro) :
?>

  <tr>
    <td><?= $i++;  ?></td>
    <td><?= $pro['noinv']; ?></td>
    <td><?= $pro['tanggal']; ?></td>
    <td><?= $pro['jam']; ?></td>
    <td><?= $pro['kdproduk']; ?></td>
    <td><?= $pro['nm_produk']; ?></td>
    <td><?= $pro['kategori']; ?></td>
    <td><?= $pro['rak']; ?></td>
    <td><?= $pro['supplier']; ?></td>
    <td><?= $pro['stok']; ?></td>
    <td><?= $pro['jml_masuk']; ?></td>
    <td><?= $pro['admin']; ?></td>
  </tr>
<?php endforeach; ?>