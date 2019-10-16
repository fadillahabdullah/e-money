<?php
  error_reporting(0);
  header("Access-Control-Allow-Origin: *");
  //$Host = "45.64.1.64";
  date_default_timezone_set("Asia/Jakarta");
  $Pengguna = "root";
  $Sandi = "";
  $Host = "127.0.0.1";
  $db = "e-money";
  $koneksi = mysqli_connect($Host, $Pengguna, $Sandi, $db);
?>