<?php

// koneksi
$koneksi = mysqli_connect('localhost', 'root', '', 'kelompok2b');

// summon admin

function summon_admin()
{
	global $koneksi;
	$id = $_SESSION['idkasir'];
	return mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id ='$id'");
}

// -------------------------------------USER SECTION--------------------------------------------------------------------
// select user by admin

function select_laporan()
{
	global $koneksi;
	return mysqli_query($koneksi, "SELECT * FROM laporan_penjualan");
}


// Insert user

function insert_user()
{
	global $koneksi;
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$level = $_POST['level'];
	$foto = $_FILES['foto']['name'];

	// cek username
	$cek = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username ='$username'");
	$row = mysqli_fetch_row($cek);

	if ($row) {
		echo "username  '%" . $username . "%' sudah ada";
	} else if ($foto != "") {

		$allowed_ext = array('png', 'jpg');
		$x = explode(".", $foto);
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['foto']['tmp_name'];
		$angka_acak = rand(1, 999);
		$nama_file_baru = $angka_acak . '-' . $foto;
		if (in_array($ekstensi, $allowed_ext) 	=== true) {
			move_uploaded_file($file_tmp, '../admin/img/' . $nama_file_baru);
			$result = mysqli_query($koneksi, "INSERT INTO pengguna SET username='$username', password='$password', nama='$nama', level='$level', foto='$nama_file_baru'");
		}
	} else if ($foto == "") {
		return mysqli_query($koneksi, "INSERT INTO pengguna SET username='$username', password='$password', nama='$nama', level='$level'");
	}
}

// delete user

function delete_user()
{
	global $koneksi;
	$id = $_POST['id'];
	$cekimg = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id='$id'");
	$row = mysqli_fetch_array($cekimg);

	// hapus gambar
	$foto = $row['foto'];
	unlink("img/$foto");
	return mysqli_query($koneksi, "DELETE FROM pengguna WHERE id='$id'");
}

// update user
function update_user()
{

	global $koneksi;
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];

	$foto = $_FILES['foto']['name'];

	// unlink
	$unlink = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id='$id'");
	$row = mysqli_fetch_array($unlink);

	$hapus_foto = $row['foto'];



	// update

	if (isset($_POST['ubahfoto'])) {
		if ($row['foto'] == "") {
			if ($foto != "") {
				$allowed_ext = array('png', 'jpg');
				$x = explode(".", $foto);
				$ekstensi = strtolower(end($x));
				$file_tmp = $_FILES['foto']['tmp_name'];
				$angka_acak = rand(1, 999);
				$nama_file_baru = $angka_acak . '-' . $foto;
				if (in_array($ekstensi, $allowed_ext) === true) {
					move_uploaded_file($file_tmp, '../admin/img/' . $nama_file_baru);
					$result =  mysqli_query($koneksi, "UPDATE pengguna SET username='$username', password='$password', nama='$nama', foto='$nama_file_baru' WHERE id='$id'");
				}
			}
		} else if ($row['foto'] != "") {
			if ($foto != "") {
				$allowed_ext = array('png', 'jpg');
				$x = explode(".", $foto);
				$ekstensi = strtolower(end($x));
				$file_tmp = $_FILES['foto']['tmp_name'];
				$angka_acak = rand(1, 999);
				$nama_file_baru = $angka_acak . '-' . $foto;
				if (in_array($ekstensi, $allowed_ext) === true) {
					move_uploaded_file($file_tmp, '../admin/img/' . $nama_file_baru);
					$result =  mysqli_query($koneksi, "UPDATE pengguna SET username='$username', password='$password', nama='$nama', foto='$nama_file_baru' WHERE id='$id'");
					if ($result) {
						unlink("../admin/img/$hapus_foto");
					}
				}
			}
		}
	}

	if (empty($_POST['foto'])) {
		return  mysqli_query($koneksi, "UPDATE pengguna SET username='$username', password='$password', nama='$nama' WHERE id='$id'");
	}
}

// ---------------------------------------------------TRANSAKSI SECTION----------------------------------------------------------
function insert_transaksi()
{
	global $koneksi;
	$kdproduk = $_POST['kdproduk'];
	$nm_produk = $_POST['nm_produk'];
	$kategori = $_POST['kategori'];
	$stok = $_POST['stok'];
	$total = $_POST['harga'];
	$tanggal = $_POST['tanggal'];
	$jam = $_POST['jam'];
	$kasir = $_POST['kasir'];

	//validasi

	$select  = mysqli_query($koneksi, "SELECT * FROM transaksi_temp WHERE kdproduk = '$kdproduk'");
	$row = mysqli_fetch_row($select);

	if ($row) {
		echo '<script>alert("Produk Sudah Ada Dalam Pesanan")</script>';
	} else {
		
		$query1 =  mysqli_query($koneksi, "INSERT INTO transaksi_temp SET kdproduk='$kdproduk', nm_produk='$nm_produk', kategori='$kategori', stok='$stok', jumlah_beli=1, total='$total'");
		
		$query_2 = mysqli_query($koneksi, "INSERT INTO laporan_penjualan SET kdproduk='$kdproduk', nm_produk='$nm_produk', kategori='$kategori', jumlah_beli=1, total='$total', tanggal='$tanggal', jam='$jam', kasir='$kasir'");
	}
}

function update_transaksi_1()
{
	global $koneksi;
	$id = $_POST['id'];
	$kdproduk = $_POST['kdproduk'];
	$jumlah_beli = $_POST['jumlah_beli'];
	$stok = $_POST['stok'];
	// Ubah stok tb_produk
	$kurang_stok = $stok - $jumlah_beli;

	$query =  mysqli_query($koneksi, "UPDATE tb_produk SET stok='$kurang_stok' WHERE kdproduk='$kdproduk'");

	$harga = $_POST['harga'];
	// jumlah harga
	$harga_baru = $jumlah_beli * $harga;

	// update transaksi temp
	$query_1 = mysqli_query($koneksi, "UPDATE transaksi_temp SET jumlah_beli='$jumlah_beli', total='$harga_baru' WHERE id='$id'");
	// update laporan penjualan
	$query_2 = mysqli_query($koneksi, "UPDATE laporan_penjualan SET jumlah_beli='$jumlah_beli', total='$harga_baru' WHERE id='$id'");
}

function insert_pelanggan()
{
	global $koneksi;
	$namapel = $_POST['namapel'];
	$jeniskel = $_POST['jeniskel'];
	$alamat = $_POST['alamat'];
	$kontak = $_POST['kontak'];
	return mysqli_query($koneksi, "INSERT INTO pelanggan SET namapel='$namapel', jeniskel='$jeniskel', alamat='$alamat', kontak='$kontak'");
}

function hapus_pelanggan()
{
	global $koneksi;
	$id = $_POST['id'];
	return mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id='$id'");
}

function update_pelanggan()
{
	global $koneksi;
	$id = $_POST['id'];
	$namapel = $_POST['namapel'];
	$jeniskel = $_POST['jeniskel'];
	$alamat = $_POST['alamat'];
	$kontak = $_POST['kontak'];
	return mysqli_query($koneksi, "UPDATE pelanggan SET namapel='$namapel', jeniskel='$jeniskel', alamat='$alamat', kontak='$kontak' WHERE id='$id'");
}

function select_user()
{
	global $koneksi;
	if (isset($_POST['go'])) {
		$cari = $_POST['cari'];
		return mysqli_query($koneksi, "SELECT * FROM pengguna WHERE nama LIKE '%" . $cari . "%'");
	} else {
		return mysqli_query($koneksi, "SELECT * FROM pengguna");
	}
}

// url
function url()
{
	return $url = "//localhost/Kelompok2B/ProgramKasir/vendors/";
}

function rupiah($angka)
{
	$hasil = "Rp. " . number_format($angka, 2, ',', '.');
	return $hasil;
}
