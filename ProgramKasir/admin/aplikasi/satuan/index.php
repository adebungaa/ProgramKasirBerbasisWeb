<?php 
include 'sesi.php';
$modul = (isset($_GET['s']))?$_GET['s']:"dashboard";
$nama_app = " Kelompok2B : Admin -";
switch ($modul) {
	case 'title': default: $judul = "$nama_app Satuan"; include 'title.php'; break;
}
?>