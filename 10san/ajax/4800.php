<?php
	include "../../setting/koneksi.php";
	$id_wali = $_REQUEST["id_wali"];
	$tahun = $_REQUEST["tahun"];
	$kelas = $_REQUEST["kelas"];
	// cek wali + tahun
	$sql = "SELECT * FROM kelas WHERE id_wali = '$id_wali' and tahun = '$tahun' ";
    $tampil = mysqli_query($koneksi, $sql);
    $jumlahwali_th = mysqli_num_rows($tampil);

    //cek kelas + tahun
    $sql = "SELECT * FROM kelas WHERE nama_kelas = '$kelas' and tahun = '$tahun' ";
    $tampil = mysqli_query($koneksi, $sql);
    $jumlahkls_th = mysqli_num_rows($tampil);

    echo $jumlahwali_th."|".$jumlahkls_th;
?>