<?php
	include "../setting/koneksi.php";
	$id = $_REQUEST["idbarang"];
	$sql = "DELETE FROM e_barang WHERE id_barang='$id'";
	$q = mysqli_query($koneksi, $sql);
	if($q){echo "1";}
	else{echo "0";}
?> 