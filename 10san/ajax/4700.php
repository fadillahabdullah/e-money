<?php
	include "../../setting/koneksi.php";
	$idbarang = $_REQUEST["idbarang"];
	$sql = "SELECT * FROM barang WHERE id = '$idbarang'";
    $tampil = mysqli_query($koneksi, $sql);
    while ($z = mysqli_fetch_array($tampil)){
    	$sat = $z["satuan"];
    	$hrg = $z["harga"];
    }
    echo "$sat|$hrg";
?>