<?php
	include "koneksi.php";
	$SQL = "SELECT * FROM id_oto";
	$Proses = mysqli_query($koneksi, $SQL);
	while ($b = mysqli_fetch_array($Proses)) { 
	    $idlog = $b["id_detail"];
	    $tgllog = $b["tgl"];
	    $jamlog = $b["jam"];
	}
?>