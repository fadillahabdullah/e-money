<?php
	include "../setting/koneksi.php";
	$data = array();
	$id = $_REQUEST["id"];
	$sql = "SELECT * FROM e_barang WHERE id_barang='$id'";
	$q = mysqli_query($koneksi, $sql);
	while ($row = mysqli_fetch_object($q)){
 		$data[] = $row;
	}
	echo json_encode($data);
?> 