<?php
	include "setting/koneksi.php";
	include "setting/encrypt.php";
	include "setting/log.php";
	session_start();
	if (ISSET($_SESSION["33DweMB"])){
    	$decrypt = simple_decrypt($_SESSION["33DweMB"]);
    	$arr =  explode("|", $decrypt);
	    $SQL = "SELECT * FROM v_login WHERE id = '".$arr[0]."' AND password = '".$arr[1]."' AND status = '1'";
	    $Proses = mysqli_query($koneksi, $SQL);
	    $jml = mysqli_num_rows($Proses);
	    if ($jml > 0){
	      	while ($z = mysqli_fetch_array($Proses)) { 
	    	 	$folder = $z["folder"];
	      	}
	      	echo "<script>window.location = '$folder/Beranda';</script>";
	    }
  	}
?>

<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<meta name="description" content="bootstrap material admin template">
		<meta name="author" content="">
    
		<title>Login | e-money</title>
		
		<link rel="apple-touch-icon" href="tema/assets/images/apple-touch-icon.png">
		<link rel="shortcut icon" href="tema/assets/images/gzaicon.png">
		
		<!-- Stylesheets -->
		<link rel="stylesheet" href="tema/global/css/bootstrap.min.css">
		<link rel="stylesheet" href="tema/global/css/bootstrap-extend.min.css">
		<link rel="stylesheet" href="tema/assets/css/site.min.css">
		
		<!-- Plugins -->
		<link rel="stylesheet" href="tema/global/vendor/animsition/animsition.css">
		<link rel="stylesheet" href="tema/global/vendor/asscrollable/asScrollable.css">
		<link rel="stylesheet" href="tema/global/vendor/switchery/switchery.css">
		<link rel="stylesheet" href="tema/global/vendor/intro-js/introjs.css">
		<link rel="stylesheet" href="tema/global/vendor/slidepanel/slidePanel.css">
		<link rel="stylesheet" href="tema/global/vendor/flag-icon-css/flag-icon.css">
		<link rel="stylesheet" href="tema/global/vendor/waves/waves.css">
		<link rel="stylesheet" href="tema/assets/examples/css/pages/login-v3.css">
		<link rel="stylesheet" href="tema/global/vendor/bootstrap-sweetalert/sweetalert.css">
		<script src="tema/global/vendor/bootstrap-sweetalert/sweetalert.js"></script>
    
		<!-- Fonts -->
		<link rel="stylesheet" href="tema/global/fonts/material-design/material-design.min.css">
		<link rel="stylesheet" href="tema/global/fonts/brand-icons/brand-icons.min.css">
		<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
		
		<!-- Scripts -->
		<script src="tema/global/vendor/breakpoints/breakpoints.js"></script>
		<script> Breakpoints(); </script>
		<style type="text/css">
      .overlay-blueblack {

        background: linear-gradient(to top, #1ad098 -10%, #2f18bd 100%, #a09999 121%);
        background-position-x: initial;
        background-position-y: initial;
        background-size: 200% auto;
        background-repeat-x: initial;
        background-repeat-y: initial;
        background-attachment: initial;
        background-origin: initial;
        background-clip: initial;
        background-color: initial;
      }
    </style>
	</head>
	<body class="animsition page-login-v3 layout-full">

		<!-- Page -->
		<div class="page vertical-align text-center overlay-blueblack" data-animsition-in="fade-in" data-animsition-out="fade-out">
			<div class="page-content vertical-align-middle">
				<div class="panel">
					<div class="panel-body">
						<div class="brand">
							<img class="brand-img " src="tema/assets/images/gza1.png" alt="...">
							<h2 class="brand-text font-size-18">e-money</h2>
						</div>
						<form method="post" autocomplete="off">
							<div class="form-group form-material floating" data-plugin="formMaterial">
								<input type="text" class="form-control" name="txtid" required>
								<label class="floating-label">ID</label>
							</div>
							<div class="form-group form-material floating" data-plugin="formMaterial">
								<input type="password" class="form-control" name="txtpass" required>
								<label class="floating-label">Password</label>
							</div>
							<button type="submit" name="btnlogin" class="btn btn-primary btn-block btn-lg mt-40">Login</button>
						</form>
					</div>
				</div>

				<footer class="page-copyright page-copyright-inverse">
					<p>e-money © 2019. Mochamad Fadillah Abdullah.</p>
				</footer>
			</div>
		</div>
		<!-- End Page -->
		<?php
	      	if (isset($_REQUEST["btnlogin"])){
	        	$u = $_REQUEST["txtid"];
	        	$p = simple_encrypt($_REQUEST["txtpass"]);
	        	$sql = "SELECT * FROM v_login WHERE id = '$u' AND password = '$p' AND status = '1'";
	        	$Proses = mysqli_query($koneksi, $sql);
	        	$cocok = mysqli_num_rows($Proses);
		        if ($cocok > 0){
		          	while ($d = mysqli_fetch_array($Proses)){$s = $d["id"]."|".$d["password"];}
		          	$_SESSION['33DweMB'] = simple_encrypt($s);
		          	tambah_log('Hak Akses','Login', 'Login Berhasil', $u);
		          	echo "<script>window.location = '';</script>";
		        } else {echo "<script>
		        	swal({
        				title: 'Login Gagal',
        				text: 'Periksa Kembali Akun Anda',
        				type: 'error',
        				showCancelButton: false, confirmButtonClass: 'btn-success', confirmButtonText: 'OK', closeOnConfirm: false
      				});</script>";
		        }
	      	}
	    ?>

		<!-- Core  -->
		<script src="tema/global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
		<script src="tema/global/vendor/jquery/jquery.js"></script>
		<script src="tema/global/vendor/popper-js/umd/popper.min.js"></script>
		<script src="tema/global/vendor/bootstrap/bootstrap.js"></script>
		<script src="tema/global/vendor/animsition/animsition.js"></script>
		<script src="tema/global/vendor/mousewheel/jquery.mousewheel.js"></script>
		<script src="tema/global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
		<script src="tema/global/vendor/asscrollable/jquery-asScrollable.js"></script>
		<script src="tema/global/vendor/waves/waves.js"></script>
    
		<!-- Plugins -->
		<script src="tema/global/vendor/switchery/switchery.js"></script>
		<script src="tema/global/vendor/intro-js/intro.js"></script>
		<script src="tema/global/vendor/screenfull/screenfull.js"></script>
		<script src="tema/global/vendor/slidepanel/jquery-slidePanel.js"></script>
		<script src="tema/global/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		
		<!-- Scripts -->
		<script src="tema/global/js/Component.js"></script>
		<script src="tema/global/js/Plugin.js"></script>
		<script src="tema/global/js/Base.js"></script>
		<script src="tema/global/js/Config.js"></script>
		
		<script src="tema/assets/js/Section/Menubar.js"></script>
		<script src="tema/assets/js/Section/Sidebar.js"></script>
		<script src="tema/assets/js/Section/PageAside.js"></script>
		<script src="tema/assets/js/Plugin/menu.js"></script>
    
		<!-- Config -->
		<script src="tema/global/js/config/colors.js"></script>
		<script src="tema/assets/js/config/tour.js"></script>
		<script>Config.set('assets', 'tema/assets');</script>
		
		<!-- Page -->
		<script src="tema/assets/js/Site.js"></script>
		<script src="tema/global/js/Plugin/asscrollable.js"></script>
		<script src="tema/global/js/Plugin/slidepanel.js"></script>
		<script src="tema/global/js/Plugin/switchery.js"></script>
		<script src="tema/global/js/Plugin/jquery-placeholder.js"></script>
		<script src="tema/global/js/Plugin/material.js"></script>
    
		<script>
			(function(document, window, $){
				'use strict';
				var Site = window.Site;
				$(document).ready(function(){
					Site.run();
				});
			})(document, window, jQuery);
		</script>
  </body>
</html>
