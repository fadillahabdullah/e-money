<?php
	include "../setting/koneksi.php";
	$emoney = $_REQUEST["emoney"];
	$pin = $_REQUEST["pin"];
	$data = array();
	$sql = "SELECT * FROM saldo_santri WHERE kd_emoney = '$emoney' AND pin = '$pin' ";
	$q = mysqli_query($koneksi, $sql);
	while ($row = mysqli_fetch_object($q)){
 		$data[] = $row;
	}
	echo json_encode($data);
?> 