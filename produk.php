<?php
require 'koneksi.php';
$query=mysqli_query($koneksi,"SELECT * FROM produk JOIN kategori on produk.id_kat = kategori.id_kat where kategori.id_kat = '".$_GET['id']."'");
// $fetchArray = mysqli_fetch_array($query);
// $kategori = $fetchArray['judul_kategori'];
$jumlah = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>List Produk</title>
	<style type="text/css">
		body {
			font-family: monospace;
			background: #33CCFF;
		}
	</style>
</head>
<body>
<div style="margin-top: 20px;margin-bottom: 20px;">
	<center><div style="background: #000;width: 340px;height: 100px;">
		<br>
		<h3 style="color: #fff;margin-top: 10px">ALLIANZ ENTHERPRISE RESELLER SCARLETT</h3>
	</div></center>
</div>
<div style="margin-left: 30px;padding: 10px">
	<center>
		<!-- <h2 style=""><?=$kategori?></h2> -->
		<b>Terdapat Jumlah Produk : <?=$jumlah?></b>
	</center>
	<br><br>
	<div style="width: 1200px;margin-top: 10px;display: flex;">
		<?php 
		while ($rows = mysqli_fetch_object($query)) {?>
			<div style="margin: 10px;padding: 5px;width: 300px">
				<img src="<?=$rows->gambar?>" style="width: 200px;height: 200px">
				<h3><?=$rows->nama?> - Rp.<?php echo number_format($rows->harga); ?></h3>
				<a href="transaksi.php?id=<?=$rows->id_prod?>" style="background: #003300;color: #fff;padding: 5px;border: 1;margin-top: 5px;text-decoration: none;">Bayar</a>
			</div>
		<?php	
		}
		?>
	</div>
</div>

</body>
</html>