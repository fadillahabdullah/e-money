<?php
	include "../../setting/koneksi.php";
	$a = $_REQUEST["a"];
	$sql = "SELECT * FROM saldo_santri WHERE kd_emoney = '$a'";
    $tampil = mysqli_query($koneksi, $sql);
    while ($z = mysqli_fetch_array($tampil)){
    	$ids = $z["id_santri"];
    	$nms = $z["nm_santri"];
    	$sld = $z["saldo"];
        $pin = $z["pin"];
    }
    echo "$ids|$nms|$sld|$pin";
?>