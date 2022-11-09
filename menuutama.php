<?php
session_start();
echo "Selamat Datang : ".$_SESSION['nama']."<br>";
echo "Email Anda Adalah : ".$_SESSION['email'];
?>