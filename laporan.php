<?php
require 'koneksi.php';
$query=mysqli_query($koneksi,"SELECT * FROM `transaksi`");
?>
<!DOCTYPE html>
<html>
<head>
	<title>LAPORAN</title>
	<style type="text/css">
		body {
			font-family: monospace;
			background: #33CCFF;
		}
	</style>
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
	<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
</head>
</head>
<body>
<div style="margin-top: 20px;margin-bottom: 20px;">
	<center><div style="background: #000;width: 340px;height: 100px;">
		<br>
		<h3 style="color: #fff;margin-top: 10px">ALLIANZ ENTHERPRISE RESELLER SCARLETT</h3>
	</div>
	<br>
	<a href="excel.php" style="color: #fff;text-decoration: none;border: 1px solid black;background: black;padding: 3px;">Export Excel</a>
	<a href="pdf.php" style="color: #fff;text-decoration: none;border: 1px solid black;background: black;padding: 3px;">Export PDF</a>&nbsp;
	<a href="transaksi.php?id=2" style="color: #fff;text-decoration: none;border: 1px solid black;background: black;padding: 3px;">Data Pemesanan</a>&nbsp;
	</center>
</div>
<table align="center" id="tabletransaksi">
	<thead>
		<tr>
			<th>No Bayar</th>
			<th>Nama Produk</th>
			<th>Jumlah Bayar</th>
			<th>Tanggal Transaksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		while ($rows = mysqli_fetch_object($query)) {?>
		<tr>
			<td>#<?=$rows->no_bayar?></td>
			<td><?=$rows->nama_produk?></td>
			<td>Rp.<?=number_format($rows->pembayaran)?></td>
			<td><?=$rows->tgl_transaksi?></td>

		</tr>
		<?php	
		}
		?>
	</tbody>
</table>
<script type="text/javascript">
	const dataTable = new simpleDatatables.DataTable("#tabletransaksi", {
	searchable: true,
	fixedHeight: true,
})
</script>
</body>
</html>
 