<?php
	include "koneksi.php";
	$id = $_REQUEST["id"];
	$nama = $_REQUEST["nama"];
	$jenisu = $_REQUEST["jenisu"];
	
	if($jenisu == "Pelapor"){
		$tabel = "login_fakultas";
	}else{
		$tabel = "login_teknisi";
	}

	$sql = "UPDATE $tabel SET Nama = '$nama' WHERE Username = '$id'";
	$q = mysqli_query($con, $sql);

	if($q){
		echo "1";
	}else{
		echo "0";
	}
?> 