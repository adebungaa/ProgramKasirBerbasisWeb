<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'kelompok2b');
class log_app
{
	public $koneksi;

	public function login()
	{
		$this->koneksi;
		$user = $_POST['user'];
		$pass = md5($_POST['pass']);
		$login = mysqli_query($this->koneksi, "SELECT * FROM pengguna WHERE username = '$user' AND password = '$pass'");
		$cek = mysqli_num_rows($login);

		if ($cek > 0) {
			$key = mysqli_fetch_array($login);
			if ($key['level'] == "admin") {
				session_start();
				$_SESSION['idstart'] = $key['id'];
				$_SESSION['userstart'] = $key['username'];
				$_SESSION['passstart'] = $key['password'];
				$_SESSION['namastart'] = $key['nama'];
				$_SESSION['levelstart'] = $key['level'];
				$_SESSION['fotostart'] = $key['foto'];
				header("location: admin/index.php?m=dashboard");
			} else if ($key['level'] == "kasir") {
				session_start();
				$_SESSION['idkasir'] = $key['id'];
				$_SESSION['userkasir'] = $key['username'];
				$_SESSION['passkasir'] = $key['password'];
				$_SESSION['namakasir'] = $key['nama'];
				$_SESSION['levelkasir'] = $key['level'];
				$_SESSION['fotokasir'] = $key['foto'];
				header("location: kasir/index.php?m=transaksi");
			}
		} else {
			echo '<script> alert("Username Atau Password Salah") </script>';
		}
	}

	public function sesi()
	{
	}
	
	function insert_user()
	{
		global $koneksi;
		$username = $_POST['username'];
		$nama = $_POST['nama'];
		$password = md5($_POST['password']);

		// Cek username
		$cek = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username ='$username'");
		$row = mysqli_fetch_row($cek);

		if ($row) {
			echo "username  '%" . $username . "%' sudah ada";
		} else {
			return mysqli_query($koneksi, "INSERT INTO pengguna SET username='$username', password='$password', nama='$nama'");
		}
	}
}

$proses = new log_app();
$proses->koneksi = mysqli_connect('localhost', 'root', '', 'kelompok2b');
