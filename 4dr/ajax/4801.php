<?php
	include "../../setting/koneksi.php";
	$kelas = $_REQUEST["kelas"];
	$tahun= $_REQUEST["tahun"];
	$sql = "SELECT * FROM kelas WHERE nama_kelas = '$kelas' and tahun = '$tahun' ";
    $tampil = mysqli_query($koneksi, $sql);
    $jumlah = mysqli_num_rows($tampil);
    echo $jumlah;
?>