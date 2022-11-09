<?php
require'koneksi.php';
$getproduk = mysqli_query($koneksi, "SELECT * FROM produk where id_prod = '".$_GET['id']."'");
$dataproduk = mysqli_fetch_object($getproduk);

$noBayar = date("ymd") . '-' . rand() . '-' . time();

$insertTransaksi= mysqli_query($koneksi,"insert into transaksi (nama_produk, pembayaran, no_bayar) values('".$dataproduk->nama."', '".$dataproduk->harga."', '$noBayar')");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Transaksi</title>
	<style type="text/css">
		body {
			font-family: monospace;
			background: #33CCFF;
		}
	</style>
</head>
<body>
<div style="margin-top: 20px;margin-bottom: 20px;">
	<center>
		<div style="background: #000;width: 340px;height: 100px;">
			<br>
			<h3 style="color: #fff;margin-top: 10px">ALLIANZ ENTHERPRISE RESELLER SCARLETT</h3>
		</div>
	</center>
	<center>
		<br>
		<h3>Menunggu Pembayaran</h3>
	</center>
	<table align="center" style="background: #000;border: 1 solid #fff;color: #fff;padding: 30px;text-align: left;">
		<tr>
			<th colspan="2">Data Pesanan</th>
		</tr>
		<tr>
			<th colspan="2"><hr></th>
		</tr>
		<tr>
			<th>
				Nama Produk
			</th>
			<th>
				: <?=$dataproduk->nama?>
			</th>
		</tr>
		<tr>
			<th>
				Kode Bayar
			</th>
			<th>
				: #<?=$noBayar?>
			</th>
		</tr>
		<tr>
			<th>
				Jumlah Bayar
			</th>
			<th>
				: Rp.<?=number_format($dataproduk->harga);?>
			</th>
		</tr>
		<tr>
			<td colspan="3" align="center" >
				<br>
				<a href="index.php" style="color: #fff;text-decoration: none;">Kembali</a>
			</td>
		</tr>
	</table>
</div>
</body>
</html>