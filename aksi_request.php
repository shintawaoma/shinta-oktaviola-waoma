<?php
include 'koneksi.php';
$tambah = isset($_POST['request']);
	$title=$_POST['Title'];
	$actor=$_POST['Actor'];
	$genre=$_POST['Genre'];
	$date=$_POST['Date'];
	$duration=$_POST['Duration'];

$input=mysqli_query($koneksi,"INSERT INTO SWMovie VALUES ('$title','$actor','$genre','$date','$duration')")
or die(mysqli_error($koneksi));
if ($input==1){
	echo "<script> alert('Berhasil Request, silahkan tunggu konfirmasi');location='haluser.php';
		</script>";
}
else{
	echo'<script>window.history.back()
	</script>';
}
?> 