<?php
require 'koneksi.php';
$query=mysqli_query($koneksi,"SELECT * FROM `kategori`");
?>
<!DOCTYPE html>
<html>
<head>
	<title>ALLIANZ ENTHERPRISE SCARLETT</title>
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
<div style="display: flex;">
	<select style="display: inline;margin-left: 60px;margin-right: 100px;margin-top: 20px;margin-bottom: 20px;padding: 5px;border: 1px solid black;background: white;text-decoration: none;color: black;" onchange="hal_kategori(this.value)">
		<option>Category Product</option>
		<?php 
		while ($row = mysqli_fetch_object($query)) {
			echo "<option value='{$row->id_kat}'>{$row->judul_kategori}</option>";
		}
		?>
	</select>
	<a href="laporan.php" style="display: inline;margin-left: 135px;margin-right: 100px;margin-top: 20px;margin-bottom: 20px;padding: 5px;border: 1px solid black;background: white;text-decoration: none;color: black;">Transaksi</a>
	<a href="form_login.php" style="display: inline;margin-left: 180px;margin-right: 100px;margin-top: 20px;margin-bottom: 20px;padding: 5px;border: 1px solid black;background: white;text-decoration: none;color: black;">Logout</a>

	<select style="display: inline;margin-left: 120px;margin-right: 100px;margin-top: 20px;margin-bottom: 20px;padding: 5px;border: 1px solid black;background: white;text-decoration: none;color: black;">
		<option>Contact Person</option>
		<option>Instagram 	: allianz._</option>
		<option>Whatsup 	: 081911039946</option>
		<option>Email 		: fadlanramadhan396@gmail.com</option>
	</select>
</div>
<center>
	<img src="produk1.webp" style="margin: 30px auto">
</center>
<script type="text/javascript">
	function hal_kategori(id){
		window.location.href = 'produk.php?id=' + id
	}
</script>
</body>
</html>