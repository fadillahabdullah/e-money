<?php
	include "../setting/koneksi.php";
	$id = $_REQUEST["idbarang"];
	$kode = $_REQUEST["kodebarang"];
	$brg = $_REQUEST["barang"];
	$hrg = $_REQUEST["harga"];
	$merk = $_REQUEST["merk"];
	$sat = $_REQUEST["satuan"];
	$sql = "UPDATE e_barang SET kd_brg='$kode', nm_barang='$brg', hrg_jual='$hrg', merk ='$merk', satuan ='$sat' WHERE id_barang='$id'";
	$q = mysqli_query($koneksi, $sql);
	if($q){echo "1";}
	else{echo "0";}
?> 