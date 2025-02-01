<?php 

session_start();
include_once 'sesi.php';
$nama_app = "Kelompok2B : Kasir -";
$modul = (isset($_GET['m']))?$_GET['m']:"transaksi";

switch ($modul) {
	
	case 'transaksi': default: $judul="$nama_app Transaksi"; include "transaksi.php"; break;
	case 'detail': $judul="$nama_app Pengaturan"; include 'aplikasi/pengguna/detail.php'; break;
	case 'supplier': $judul="Menu Supplier $nama_app"; include 'aplikasi/supplier/index.php'; break;
	case 'pelanggan': $judul="$nama_app Pelanggan"; include 'aplikasi/pelanggan/index.php'; break;
	case 'produk': $judul="$nama_app Produk"; include 'aplikasi/produk/index.php'; break;
	case 'stokmasuk':$judul="$nama_app Stok Masuk"; include 'aplikasi/stokmasuk/index.php';break;
	case 'pengguna':$judul="$nama_app Pengguna"; include 'aplikasi/pengguna/index.php'; break;
}

?>