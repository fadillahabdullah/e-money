<?php
	include "../setting/koneksi.php";
	$id = strtotime(date("YmdHis"));
	$idsantri = $_REQUEST["idsantri"];
	$harga = $_REQUEST["harga"];
	$jam = date("H:i:s");
	$tgl = date("Y-m-d"); 
	$sql = "INSERT INTO e_trans_keluar VALUES('$id','$idsantri','-','1','$harga','$jam','$tgl','00-00-0000','','Tidak')";
	$q = mysqli_query($koneksi, $sql);
	if($q){echo "1";}
	else{echo "0";}
?> 