<?php 

include 'sesi.php';
$modul = (isset($_GET['s']))?$_GET['s']:"dashboard";
$nama_app = "Kelompok2B : Admin -";
switch ($modul) {
	case 'title': $judul = "$nama_app Produk"; include 'title.php'; break;
	default:
		break;
}
?>