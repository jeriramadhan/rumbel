<?php
//include('dbconnected.php');
include('conn.php');

$id = $_GET['id'];
$nama = $_GET['nama'];
$email = $_GET['email'];
$saran = $_GET['saran'];

//query update
$queryupdate = mysqli_query($koneksi, "UPDATE tb_feedback SET nama='$nama' , email='$email', saran='$saran' WHERE id='$id' ");

if ($queryupdate) {
	# credirect ke page index
	header("location:cek.php");	
}
else{
	echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>
