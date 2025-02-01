<?php 
include 'sesi.php';
$modul = (isset($_GET['s']))?$_GET['s']:"dashboard";
$nama_app = " Kelompok2B : Admin -";
switch ($modul) {
	case 'kategori': default: $judul = "$nama_app Kategori"; include 'title.php'; break;
}
?>