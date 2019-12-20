<?php
if(isset($_GET['Title'])) {
	include ('koneksi.php');
	$title = $_GET['Title'];
	$cek = mysqli_query($koneksi,"SELECT Title FROM SWMovie WHERE Title = '$title'") or die (mysql_error());

	if(mysqli_num_rows($cek) == 0) {
		echo '<script>windows.history.back()</script>';
	}
	else {
		$del = mysqli_query($koneksi,"DELETE FROM SWMovie WHERE Title = '$title'");
		
		if ($del) {
		echo "<script> alert('Berhasil');location='haladmin.php';
		</script>";	
		}
		
		else {
			echo 'Gagal menghapus data!';
			echo "<script> alert('Gagal menghapus data , coba lagi ');location='haladmin.php' ;</script>";
		}
		
	}
	}
	
	else {
		echo '<script>window.history.back()</script>';
	}
	
?>
