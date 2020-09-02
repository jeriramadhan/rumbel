<?php
//include('dbconnected.php');
include('conn.php');

$id = $_GET['id'];
$nama = $_GET['nama'];
$email = $_GET['email'];
$saran = $_GET['saran'];

//query hapus
$queryupdate = mysqli_query($koneksi, "DELETE FROM tb_feedback WHERE id='$_GET[id]' ");

if ($queryupdate) {
	# credirect ke page index
	header("location:cek.php");	
}
else{
	echo "ERROR, data gagal dihapus". mysqli_error($koneksi);
}

//mysql_close($host);
?>
