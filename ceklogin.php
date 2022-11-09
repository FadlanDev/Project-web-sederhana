<?php
session_start();
include("koneksi.php");
$username=$_POST['username'];
$password=$_POST['password'];
$query = mysqli_query($koneksi, "SELECT * FROM `users` WHERE email = '$username' and password = '$password'");

if(!$query){
	die(mysqli_error($koneksi));
}

if (mysqli_num_rows($query) >0) {
	$data = mysqli_fetch_object($query);
	$_SESSION['login'] = true;
	$_SESSION['nama'] = $data->nama;
	$_SESSION['email'] = $data->email;

	echo "<script>alert('Login sukses'); window.location.href= 'index.php';</script>";
} else {
	echo "<script>alert('gagal login'); window.location.href= 'form_login.php?';</script>";
}
