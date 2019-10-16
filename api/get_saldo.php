<?php
	include "../setting/koneksi.php";
	$keyword = $_REQUEST["tempel"];
	$data = array();
	$sql = "SELECT * FROM saldo_santri WHERE kd_emoney = '$keyword'";
	$q = mysqli_query($koneksi, $sql);
	while ($row = mysqli_fetch_object($q)){
 		$data[] = $row;
	}
	echo json_encode($data);
?> 