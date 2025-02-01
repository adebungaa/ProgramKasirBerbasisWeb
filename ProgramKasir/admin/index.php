<?php 

session_start();
include_once 'sesi.php';
$nama_app = "Kelompok2B : Admin - ";
$modul = (isset($_GET['m']))?$_GET['m']:"dashboard";

switch ($modul) {
	case 'dashboard': default: $judul="$nama_app Dashboard"; include "dashboard.php"; break;
	case 'pengguna': $judul="$nama_app Pengguna"; include 'aplikasi/pengguna/index.php';  break;
	case 'produk': $judul="$nama_app Produk"; include 'aplikasi/produk/index.php'; break;
	case 'rak': $judul="$nama_app Rak"; include 'aplikasi/rak/index.php'; break;
	case 'supplier': $judul="$nama_app Supplier"; include 'aplikasi/supplier/index.php'; break;
	case 'kategori': $judul="$nama_app Kategori"; include 'aplikasi/kategori/index.php'; break;
	case 'stokmasuk': $judul="$nama_app Stok Masuk"; include 'aplikasi/stokmasuk/index.php'; break;
	case 'laporan': $judul="$nama_app Laporan"; include 'aplikasi/laporan/index.php'; break;
	case 'pelanggan': $judul="$nama_app Pelanggan"; include 'aplikasi/pelanggan/index.php'; break;
	case 'satuan': $judul="$nama_app Satuan"; include 'aplikasi/satuan/index.php'; break;
}
