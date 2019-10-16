<?php
	include "../setting/koneksi.php";
	$id = strtotime(date("YmdHis"));
	$idsantri = $_REQUEST["idsantri"];
	$norek = $_REQUEST["norek"];
	$nominal = $_REQUEST["nominal"];
	$atasnm = $_REQUEST["atasnm"];
	$jam = $_REQUEST["jam"];
	$tgl = $_REQUEST["tgl"];
	$keterangan = $_REQUEST["keterangan"];
	$sql = "INSERT INTO e_konfir VALUES('$id','$idsantri','$norek','$nominal','$atasnm','$jam','$tgl','Proses','$keterangan')";
	$q = mysqli_query($koneksi, $sql);
	if($q){echo "1";}
	else{echo "0";}
?> 