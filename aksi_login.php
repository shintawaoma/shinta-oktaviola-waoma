<?php
session_start();//memulai sesi
include 'koneksi.php';//hubungkan dgn konek.php utk berhubungan dgn database

$username=$_POST['username'];//tangkap data yg di input form login username
$password=$_POST['password'];
$status =$_POST['status'];
$statusadmin="Admin";
$statususer="User";
//tangkap data yg di input form login password

$query=mysqli_query($koneksi,"SELECT * FROM SWlogin where Username='$username' and Password='$password' and status='$status' and status ='$statususer'");//pengambilan data dari database utk dicocokkan
$xxx=mysqli_num_rows($query);//melalkukan pencocokan

if ($xxx==TRUE) {//melakukan pemeriksaan kecocokan
  $_SESSION["tester"]=TRUE;
  $_SESSION['username']=$username;//jika cocok buat sesi dgn nama sesuai username
  header("location:haluser.php");//dan alihkan ke index.php

}
else{//jika tidak, tampilkan pesan gagal login
  echo "<script> alert('username atau password salah'); location='endpointni.php'; </script>";
}
$query=mysqli_query($koneksi,"SELECT*FROM SWlogin WHERE Username='$username' and 
  Password='$password' and status='$status' and Status='$statusadmin'");
$xxx=mysqli_num_rows($query);

if ($xxx==TRUE){
  $_SESSION["tester"]=TRUE;
  $_SESSION['username']=$username;
  header("location:haladmin.php");
}else {
  echo "<script> alert('Username atau Passowrd Salah')
  location='endpointni.php#login';</script>";
}
?>
