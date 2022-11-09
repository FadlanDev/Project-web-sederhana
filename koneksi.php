<?php
$host="localhost";
$username="root";
$password="";
$database="uas_web";

$koneksi=mysqli_connect ($host,$username,$password,$database);
if (mysqli_connect_error()){
	echo "Koneksi ke Database Gagal!!";
}
?>