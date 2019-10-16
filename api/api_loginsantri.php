<?php
	include "../setting/koneksi.php";
	include "../setting/encrypt.php";
	$data = array();
	$u = $_REQUEST["u1"]; 
	$p = simple_encrypt($_REQUEST["p1"]); 
	$sql = "SELECT * FROM v_login WHERE id = '$u' AND password = '$p' AND status='1' AND level IN ('santri')";
	$q = mysqli_query($koneksi, $sql);
	while ($row = mysqli_fetch_object($q)){
 		$data[] = $row;
	}
	echo json_encode($data);
?> 