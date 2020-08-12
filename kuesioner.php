<?php
//include('dbconnected.php');
include('conn.php');

$nama = $_POST['nama'];
$saran = $_POST['saran'];
$email = $_POST['email'];

//query update
$queryupdate = mysqli_query($koneksi, "INSERT INTO tb_feedback (nama,saran,email) VALUES ('$nama', '$saran', '$email')");

if ($queryupdate) {
	# credirect ke page index
	header("location:index.php");	
}
else{
	echo "ERROR, data gagal ditambah". mysqli_error($koneksi);
}

//mysql_close($host);
?>
