<?php

// Koneksi
$koneksi = mysqli_connect('localhost', 'root', '', 'kelompok2b');

// Panggil Admin
if (function_exists("summon_admin") === FALSE) {
	function summon_admin()
	{
		global $koneksi;
		$id = $_SESSION['idstart'];
		return mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id ='$id'");
	}
}
// User Section
// Select User By Admin
if (function_exists("select_user") === FALSE) {
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
}
// Jumlah Admin
if (function_exists("select_user_2") === FALSE) {
	function select_user_2()
	{
		global $koneksi;
		$query =  mysqli_query($koneksi, "SELECT count(id) AS jadmin FROM pengguna ORDER BY id DESC");
		$key = mysqli_fetch_array($query);
		echo $key['jadmin'];
	}
}
// Insert User
if (function_exists("insert_user") === FALSE) {
	function insert_user()
	{
		global $koneksi;
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$nama = $_POST['nama'];
		$level = $_POST['level'];
		$foto = $_FILES['foto']['name'];

		// Cek username
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
				move_uploaded_file($file_tmp, 'img/' . $nama_file_baru);
				$result = mysqli_query($koneksi, "INSERT INTO pengguna SET username='$username', password='$password', nama='$nama', level='$level', foto='$nama_file_baru'");
			}
		} else if ($foto == "") {
			return mysqli_query($koneksi, "INSERT INTO pengguna SET username='$username', password='$password', nama='$nama', level='$level'");
		}
	}
}
// Delete User
if (function_exists("delete_user") === FALSE) {
	function delete_user()
	{
		global $koneksi;
		$id = $_POST['id'];
		$cekimg = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id='$id'");
		$row = mysqli_fetch_array($cekimg);

		// Hapus Image
		$foto = $row['foto'];
		unlink("img/$foto");
		return mysqli_query($koneksi, "DELETE FROM pengguna WHERE id='$id'");
	}
}
// Update User
if (function_exists("update_user") === FALSE) {
	function update_user()
	{
		global $koneksi;
		$id = $_POST['id'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$nama = $_POST['nama'];
		$level = $_POST['level'];
		$foto = $_FILES['foto']['name'];

		// Unlink Image
		$unlink = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id='$id'");
		$row = mysqli_fetch_array($unlink);
		$hapus_foto = $row['foto'];

		// Update Image
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
						move_uploaded_file($file_tmp, 'img/' . $nama_file_baru);
						$result =  mysqli_query($koneksi, "UPDATE pengguna SET username='$username', password='$password', nama='$nama', level='$level', foto='$nama_file_baru' WHERE id='$id'");
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
						move_uploaded_file($file_tmp, 'img/' . $nama_file_baru);
						$result =  mysqli_query($koneksi, "UPDATE pengguna SET username='$username', password='$password', nama='$nama', level='$level', foto='$nama_file_baru' WHERE id='$id'");
						if ($result) {
							unlink("img/$hapus_foto");
						}
					}
				}
			}
		}

		if (empty($_POST['foto'])) {
			return  mysqli_query($koneksi, "UPDATE pengguna SET username='$username', password='$password', nama='$nama', level='$level' WHERE id='$id'");
		}
	}
}
// ---------------------------------------------------RAK SECTION---------------------------------\\
if (function_exists("insert_rak") === FALSE) {
	function insert_rak()
	{
		global $koneksi;
		$kdrak = $_POST['kdrak'];
		$namarak = $_POST['namarak'];
		return mysqli_query($koneksi, "INSERT INTO tb_rak SET kdrak='$kdrak', namarak='$namarak'");
	}
}
if (function_exists("delete_rak") === FALSE) {
	function delete_rak()
	{
		global $koneksi;
		$id = $_POST['id'];
		return mysqli_query($koneksi, "DELETE FROM tb_rak WHERE id='$id'");
	}
}
if (function_exists("update_rak") === FALSE) {
	function update_rak()
	{
		global $koneksi;
		$id = $_POST['id'];
		$kdrak = $_POST['kdrak'];
		$namarak = $_POST['namarak'];
		return mysqli_query($koneksi, "UPDATE tb_rak SET kdrak='$kdrak', namarak='$namarak' WHERE id='$id'");
	}
}

// ----------------------------------------------SUPPLIER SECTION---------------------------------------------------------------\\
if (function_exists("insert_supplier") === FALSE) {
	function insert_supplier()
	{
		global $koneksi;
		$kdspl = $_POST['kdspl'];
		$namaspl = $_POST['namaspl'];
		$alamatspl = $_POST['alamatspl'];
		$kontakspl = $_POST['kontakspl'];
		return mysqli_query($koneksi, "INSERT INTO supplier SET kdspl='$kdspl', namaspl='$namaspl', alamatspl='$alamatspl', kontakspl='$kontakspl'");
	}
}
if (function_exists("hapus_supplier") === FALSE) {
	function hapus_supplier()
	{
		global $koneksi;
		$id = $_POST['id'];
		return mysqli_query($koneksi, "DELETE FROM supplier WHERE id='$id'");
	}
}
if (function_exists("update_supplier") === FALSE) {
	function update_supplier()
	{
		global $koneksi;
		$id = $_POST['id'];
		$kdspl = $_POST['kdspl'];
		$namaspl = $_POST['namaspl'];
		$alamatspl = $_POST['alamatspl'];
		$kontakspl = $_POST['kontakspl'];
		return mysqli_query($koneksi, "UPDATE supplier SET kdspl='$kdspl', namaspl='$namaspl', alamatspl='$alamatspl', kontakspl='$kontakspl' WHERE id='$id'");
	}
}
// Pelanggan
if (function_exists("insert_pelanggan") === FALSE) {
	function insert_pelanggan()
	{
		global $koneksi;
		$namapel = $_POST['namapel'];
		$jeniskel = $_POST['jeniskel'];
		$alamat = $_POST['alamat'];
		$kontak = $_POST['kontak'];
		return mysqli_query($koneksi, "INSERT INTO pelanggan SET namapel='$namapel', jeniskel='$jeniskel', alamat='$alamat', kontak='$kontak'");
	}
}
if (function_exists("hapus_pelanggan") === FALSE) {
	function hapus_pelanggan()
	{
		global $koneksi;
		$id = $_POST['id'];
		return mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id='$id'");
	}
}
if (function_exists("update_pelanggan") === FALSE) {
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
}
// ------------------------------------------------------------PRODUK SECTION----------------------------------------------------\\
if (function_exists("insert_produk") === FALSE) {
	function insert_produk()
	{
		global $koneksi;
		$kdproduk = $_POST['kdproduk'];
		$nm_produk = $_POST['nm_produk'];
		$kategori = $_POST['kategori'];
		$stok = $_POST['stok'];
		$satuan = $_POST['satuan'];
		$rak = $_POST['rak'];
		$supplier = $_POST['supplier'];
		$harga = $_POST['harga'];

		return mysqli_query($koneksi, "INSERT INTO tb_produk SET kdproduk='$kdproduk', nm_produk='$nm_produk', kategori='$kategori', stok='$stok', satuan='$satuan', rak='$rak', supplier='$supplier', harga='$harga'");
	}
}
if (function_exists("delete_produk") === FALSE) {
	function delete_produk()
	{
		global $koneksi;
		$id = $_POST['id'];
		return mysqli_query($koneksi, "DELETE FROM tb_produk WHERE id='$id'");
	}
}
if (function_exists("update_produk") === FALSE) {
	function update_produk()
	{
		global $koneksi;
		$id = $_POST['id'];
		$kdproduk = $_POST['kdproduk'];
		$nm_produk = $_POST['nm_produk'];
		$kategori = $_POST['kategori'];
		$stok = $_POST['stok'];
		$satuan = $_POST['satuan'];
		$rak = $_POST['rak'];
		$supplier = $_POST['supplier'];
		$harga = $_POST['harga'];

		return mysqli_query($koneksi, "UPDATE tb_produk SET kdproduk='$kdproduk', nm_produk='$nm_produk', kategori='$kategori', stok='$stok', satuan='$satuan', rak='$rak', supplier='$supplier', harga='$harga' WHERE id='$id'");
	}
}
if (function_exists("select_produk") === FALSE) {
	function select_produk()
	{
		global $koneksi;
		$query = mysqli_query($koneksi, "SELECT count(id) AS jproduk FROM tb_produk");
		$row = mysqli_fetch_array($query);
		echo $row['jproduk'];
	}
}
// ------------------------------------------------KATEGORI SECTION---------------------------------------------------------------\\\
if (function_exists("insert_kategori") === FALSE) {
	function insert_kategori()
	{
		global $koneksi;
		$kategori = $_POST['kategori'];
		return mysqli_query($koneksi, "INSERT INTO kategori SET kategori='$kategori'");
	}
}
if (function_exists("hapus_kategori") === FALSE) {
	function hapus_kategori()
	{
		global $koneksi;
		$id = $_POST['id'];
		return mysqli_query($koneksi, "DELETE FROM kategori WHERE id='$id'");
	}
}
if (function_exists("update_kategori") === FALSE) {
	function update_kategori()
	{
		global $koneksi;
		$id = $_POST['id'];
		$kategori = $_POST['kategori'];

		return mysqli_query($koneksi, "UPDATE kategori SET kategori='$kategori' WHERE id='$id'");
	}
}
// Satuan
if (function_exists("insert_satuan") === FALSE) {
	function insert_satuan()
	{
		global $koneksi;
		$satuan = $_POST['satuan'];
		return mysqli_query($koneksi, "INSERT INTO satuan SET satuan='$satuan'");
	}
}
if (function_exists("hapus_satuan") === FALSE) {
	function hapus_satuan()
	{
		global $koneksi;
		$id = $_POST['id'];
		return mysqli_query($koneksi, "DELETE FROM satuan WHERE id='$id'");
	}
}
if (function_exists("update_satuan") === FALSE) {
	function update_satuan()
	{
		global $koneksi;
		$id = $_POST['id'];
		$satuan = $_POST['satuan'];

		return mysqli_query($koneksi, "UPDATE satuan SET satuan='$satuan' WHERE id='$id'");
	}
}
// ---------------------------------------------------PRODUK MASUK SECTION----------------------------------------------------------\\
if (function_exists("produk_masuk") === FALSE) {
	function produk_masuk()
	{
		global $koneksi;
		$noinv = $_POST['noinv'];
		$tanggal = $_POST['tanggal'];
		$jam = $_POST['jam'];
		$kdproduk = $_POST['kdproduk'];
		$nm_produk = $_POST['nm_produk'];
		$kategori = $_POST['kategori'];
		$rak = $_POST['rak'];
		$supplier = $_POST['supplier'];
		$stok = $_POST['stok'];
		$jml_masuk = $_POST['jml_masuk'];
		$admin = $_POST['admin'];

		// Tambah Stok Tabel Produk

		$tambah_stok = $jml_masuk + $stok;

		$query = mysqli_query($koneksi, "UPDATE tb_produk SET stok='$tambah_stok' WHERE kdproduk='$kdproduk'");

		$query_insert = mysqli_query($koneksi, "INSERT INTO stok_masuk SET noinv='$noinv', tanggal='$tanggal', jam='$jam', kdproduk='$kdproduk', nm_produk='$nm_produk', kategori='$kategori', rak='$rak', supplier='$supplier', stok='$stok', jml_masuk='$jml_masuk', admin='$admin'");

		if ($query_insert) {
			echo '<script>window.history.back()</script>';
		}
	}
}
// -----------------------------------------CALL TRANSACTION-------------------------------------------------------------------------\\
if (function_exists("jumlah_saldo") === FALSE) {
	function jumlah_saldo()
	{
		global $koneksi;
		$jumlah = mysqli_query($koneksi, "SELECT sum(total) as jtotal from laporan_penjualan");
		$row = mysqli_fetch_array($jumlah);
		echo rupiah($row['jtotal']);
	}
}
if (function_exists("jumlah_terjual") === FALSE) {
	function jumlah_terjual()
	{
		global $koneksi;
		$jumlah = mysqli_query($koneksi, "SELECT sum(jumlah_beli) as jbeli from laporan_penjualan");
		$row = mysqli_fetch_array($jumlah);
		echo $row['jbeli'];
	}
}
// ---------------------------------------------lOGISTIK SECTON-----------------------------------------------------------------\\
if (function_exists("delete_pro_masuk") === FALSE) {
	function delete_pro_masuk()
	{
		global $koneksi;
		$id = $_POST['id'];
		return mysqli_query($koneksi, "DELETE FROM stok_masuk WHERE id='$id'");
	}
}
// Hapus laporan
if (function_exists("hapus_laporan") === FALSE) {
	function hapus_laporan()
	{
		global $koneksi;
		return mysqli_query($koneksi, "DELETE FROM laporan_penjualan");
	}
}
// url
if (function_exists("url") === FALSE) {
	function url()
	{
		return $url = "//localhost/Kelompok2B/ProgramKasir/vendors/";
	}
}
if (function_exists("rupiah") === FALSE) {
	function rupiah($angka)
	{
		$hasil = "Rp. " . number_format($angka, 2, ',', '.');
		return $hasil;
	}
}
