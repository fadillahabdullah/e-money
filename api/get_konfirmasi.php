<?php
	include "../setting/koneksi.php";
	$data = array();
	$sql = "SELECT * FROM e_konfir";
	$q = mysqli_query($koneksi, $sql);
	while ($row = mysqli_fetch_object($q)){
 		$data[] = $row;
	}
	echo json_encode($data);
?> 