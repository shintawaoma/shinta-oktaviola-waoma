<?php
session_start();//perintah agar file membaca/memulai sasi
session_destroy();
header('location:endpointni.php#login.php');//perintah menghapus semua sesi yg ad header ("location:login.php");
//mengalihkan halaman ke login.php
?>