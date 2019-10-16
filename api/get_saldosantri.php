<?php
	include "../setting/koneksi.php";
	$keyword = $_REQUEST["santri"];
	$data = array();
	$sql = "SELECT * FROM saldo_santri WHERE id_santri = '$keyword'";
	$q = mysqli_query($koneksi, $sql);
	while ($row = mysqli_fetch_object($q)){
 		$data[] = $row;
	}
	echo json_encode($data);
?> 