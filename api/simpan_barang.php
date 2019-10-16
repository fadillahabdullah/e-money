<?php
	include "../setting/koneksi.php";
	$id = strtotime(date("YmdHis"));
	$kode = $_REQUEST["kodebarang"];
	$brg = $_REQUEST["barang"];
	$hrg = $_REQUEST["harga"];
	$merk = $_REQUEST["merk"];
	$sat = $_REQUEST["satuan"];
	$sql = "INSERT INTO e_barang VALUES('$id','$kode','$brg','$hrg','$merk','$sat')";
	$q = mysqli_query($koneksi, $sql);
	if($q){echo "1";}
	else{echo "0";}
?> 