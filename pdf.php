<?php
require 'koneksi.php';
require 'vendor/autoload.php';

$template = @file_get_contents("template_pdf.html");
$query = mysqli_query($koneksi,"SELECT * FROM `transaksi`");


$html = "";
while ($rows = mysqli_fetch_object($query)) {
	$html .= "
	<tr>
		<td>{$rows->no_bayar}</td>
		<td>{$rows->nama_produk}</td>
		<td>Rp.".number_format($rows->pembayaran)."</td>
		<td>{$rows->tgl_transaksi}</td>
	</tr>";
}
$nama_file = "cetak_laporan_".date("y_m_d").".pdf";
$render = str_replace("{{data}}", $html, $template);

use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml($render);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');
// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($nama_file);