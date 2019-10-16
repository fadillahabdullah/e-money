<?php
	include "../../setting/koneksi.php";
	$a = $_REQUEST["a"];
	$sql = "SELECT * FROM e_santri WHERE kd_emoney = '$a'";
    $tampil = mysqli_query($koneksi, $sql);
    $hasil = mysqli_num_rows($tampil);
    	if($hasil==0){
    		$hasil=0;
    	}else{
    		$hasil=1;
    	}
    echo $hasil;
?>