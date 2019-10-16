<?php
	function tambah_log($data, $operasi, $keterangan, $id){
		include "oto.php";
	    $SQL2 = "INSERT INTO log_history VALUES('$idlog','$data','$operasi','$keterangan','$id','$tgllog','$jamlog');";
		$Proses2 = mysqli_query($koneksi, $SQL2);
	}
?>