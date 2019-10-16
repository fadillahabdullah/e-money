<?php
include "../../setting/koneksi.php";
$id = $_REQUEST["id"];
$m = $_REQUEST["m"];
$ket = $_REQUEST["ket"];
$kdb = $_REQUEST["kategori"];
$j = strtotime(date("YmdHis"));
$jam = date("H:i:s");
$tgl = date("Y-m-d");
$x = date("Y-m-d H:i:s");
$sql = "INSERT INTO e_trans_keluar VALUES('$j','$id','$kdb','1','$m','$jam','$tgl','$x','$ket','Ya')";
$proses = mysqli_query($koneksi, $sql);
if($proses){
echo "1";
}else{
echo "0";
}
?>