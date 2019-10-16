<?php
	include "../../setting/koneksi.php";
    $id = $_REQUEST["id"];
	$sql = "SELECT a.*, b.nama AS nama_barang FROM detail AS a LEFT JOIN barang AS b ON a.id_barang = b.id where id_transaksi = $id";
    $tampil = mysqli_query($koneksi, $sql);
    echo "<h4 style='margin-top: -10px;'>Detail Barang</h4><ol>";
    while ($z = mysqli_fetch_array($tampil)){ 
        $quest = $z["nama_barang"];
        echo "<li>$quest</li>";
    }
    echo "</ol>";
?>