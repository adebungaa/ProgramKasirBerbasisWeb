<?php 
include 'sesi.php';
$modul = (isset($_GET['s']))?$_GET['s']:"dashboard";
$nama_app = "Kelompok2B : Admin -";
switch ($modul) {
	case 'title': default: include 'title.php'; break;
	case 'detail': $judul = "$nama_app Pengaturan"; include 'detail.php'; break;		
}
?>