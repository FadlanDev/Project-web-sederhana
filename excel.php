<?php
require 'koneksi.php';
require 'vendor/autoload.php';

$query=mysqli_query($koneksi,"SELECT * FROM `Transaksi`");

$pushData = [];
$file_name = "laporan_excel_". date("y_m_d").".xlsx";
$pushData = [
	["No Bayar","Nama Produk","Jumlah Bayar", "Tanggal Transaksi"]
];

while ($rows = mysqli_fetch_object($query)) {
	$pushData[] = [
		$rows->no_bayar,
		$rows->nama_produk,
		"Rp.". number_format($rows->pembayaran),
		$rows->tgl_transaksi
	];
}

$data = [];
array_push($data, $pushData);

// var_dump($data);die;

$xlsx = SimpleXLSXGen::fromArray($pushData);
$xlsx->downloadAs($file_name);