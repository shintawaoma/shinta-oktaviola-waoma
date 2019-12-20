<?php

if(isset($_POST['simpan'])) {
	include ('koneksi.php');
	$title =$_POST['Title'];
	$actor=$_POST['Actor'];
	$genre=$_POST['Genre'];
	$date=$_POST['Date'];
	$duration=$_POST['Duration'];
	$update = mysqli_query($koneksi,"UPDATE SWMovie SET Actor = '$actor',Genre='$genre',Date ='$date', Duration = '$duration'WHERE Title = '$title'") or die (mysqli_error());
	
	if ($update) {
	echo "<script> alert('Berhasil');location='haladmin.php';
		</script>";
	}
	else {
		echo 'Gagal menyimpan data!';
		echo '<center><a href = "edit.php?Title='.$title.'">Kembali</a></center>';
	}

}
	
	else {
		echo '<script>window.history.back()</script>';
	}
	


?>	
