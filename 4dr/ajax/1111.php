<?php
include "../../setting/koneksi.php";
$id = $_REQUEST["id"];
$m = $_REQUEST["m"];
$ket = $_REQUEST["ket"];
$j = strtotime(date("YmdHis"));
$jam = date("H:i:s");
$tgl = date("Y-m-d");
$sql = "INSERT INTO e_trans_masuk VALUES('$j','$id','$jam','$tgl','$m','$ket')";
$proses = mysqli_query($koneksi, $sql);
if($proses){
echo "1";
}else{
echo "0";
}
?>