<?php
	include "../../setting/koneksi.php";
	$a = $_REQUEST["a"];
	$sql = "SELECT * FROM e_barang WHERE id_barang = '$a'";
    $tampil = mysqli_query($koneksi, $sql);
    while ($z = mysqli_fetch_array($tampil)){
    	$id = $z["id_barang"];
        $hrg = $z["hrg_jual"];
    }
    echo "$hrg|$id";
?>