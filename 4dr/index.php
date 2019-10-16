<?php
	include "../setting/encrypt.php";
	include "../setting/koneksi.php";
	session_start();
	if (ISSET($_SESSION["33DweMB"])){
		$decrypt = simple_decrypt($_SESSION["33DweMB"]);
		$arr =  explode("|", $decrypt);
		$SQL = "SELECT * FROM v_login WHERE id = '".$arr[0]."' AND password = '".$arr[1]."' AND status = '1'";
		$Proses = mysqli_query($koneksi, $SQL);
	    $jml = mysqli_num_rows($Proses);
	    if ($jml > 0){
	    	// while ($z = mysqli_fetch_array($Proses)) { 
	    	//  	$iduser = $z["id"];
	    	//  	$namauser = $z["nama_lengkap"];
	    	//  	$panggilan = $z["panggilan"];
	    	//  	$level = $z["level"];
	    	//  	$folder = $z["folder"];
	    	//  	$telpuser = $z["telp"];
	    	//  	if(file_exists("../upload/akun/$iduser.jpg")){$foto = "../upload/akun/$iduser.jpg";}
	    	//  	else{$foto = "../upload/akun/usermissing.png";}
	    	// }
	    	echo "<script>window.location = 'Beranda';</script>";
	    } else {echo "<script>window.location = '../Login';</script>";}
	} else {echo "<script>window.location = '../Login';</script>";}
?>