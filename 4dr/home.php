<?php
include "../setting/ceklogin.php";
include "../setting/log.php";
include "../setting/fungsi.php";
$page = htmlentities($_REQUEST['page']);
if ($folder != "4dr"){echo "<script>window.location = '../index.php';</script>";}
?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="bootstrap material admin template">
        <meta name="author" content="">
        
        <title>Dashboard | e-money</title>
        <link rel="apple-touch-icon" href="../tema/assets/images/apple-touch-icon.png">
        <link rel="shortcut icon" href="../tema/assets/images/gzaicon.png">
        <!-- Stylesheets -->
        <link rel="stylesheet" href="../tema/global/css/bootstrap.min.css">
        <link rel="stylesheet" href="../tema/global/css/bootstrap-extend.min.css">
        <link rel="stylesheet" href="../tema/assets/css/site.min.css">
        <!-- Plugins -->
        <link rel="stylesheet" href="../tema/global/vendor/animsition/animsition.css">
        <link rel="stylesheet" href="../tema/global/vendor/asscrollable/asScrollable.css">
        <link rel="stylesheet" href="../tema/global/vendor/switchery/switchery.css">
        <link rel="stylesheet" href="../tema/global/vendor/intro-js/introjs.css">
        <link rel="stylesheet" href="../tema/global/vendor/slidepanel/slidePanel.css">
        <link rel="stylesheet" href="../tema/global/vendor/waves/waves.css">
        <link rel="stylesheet" href="../tema/global/vendor/chartist/chartist.css">
        <link rel="stylesheet" href="../tema/global/vendor/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="../tema/global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
        <link rel="stylesheet" href="../tema/assets/examples/css/dashboard/v1.css">
        <link rel="stylesheet" href="../tema/global/vendor/bootstrap-sweetalert/sweetalert.css">
        <script src="../tema/global/vendor/bootstrap-sweetalert/sweetalert.js"></script>
        <link rel="stylesheet" href="../tema/global/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="../tema/global/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css">
        <link rel="stylesheet" href="../tema/global/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css">
        <link rel="stylesheet" href="../tema/global/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css">
        <link rel="stylesheet" href="../tema/global/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css">
        <link rel="stylesheet" href="../tema/global/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css">
        <link rel="stylesheet" href="../tema/global/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css">
        <link rel="stylesheet" href="../tema/global/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css">
        <link rel="stylesheet" href="../tema/assets/examples/css/tables/datatable.css">
        <link rel="stylesheet" href="../tema/global/vendor/dropify/dropify.css">
        
        <!-- Fonts -->
        <link rel="stylesheet" href="../tema/global/fonts/material-design/material-design.min.css">
        <link rel="stylesheet" href="../tema/global/fonts/themify/themify.css">
        <link rel="stylesheet" href="../tema/global/fonts/brand-icons/brand-icons.min.css">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
        <!-- Scripts -->
        <script src="../tema/global/vendor/breakpoints/breakpoints.js"></script>
        <script src="../tema/global/vendor/jquery/jquery.js"></script>
        <script src="../tema/highcharts.js"></script>
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
    <body class="animsition dashboard">
        <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-inverse overlay-blueblack" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided" data-toggle="menubar">
                <span class="sr-only">Toggle navigation</span>
                <span class="hamburger-bar"></span>
                </button>
                <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse" data-toggle="collapse">
                <i class="icon md-more" aria-hidden="true"></i>
                </button>
                <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
                    <img class="navbar-brand-logo" src="../tema/assets/images/gza2.png" title="e-money">
                    <span class="navbar-brand-text hidden-xs-down"> e-money</span>
                </div>
            </div>
            
            <div class="navbar-container container-fluid">
                <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
                    <ul class="nav navbar-toolbar">
                        <li class="nav-item hidden-float" id="toggleMenubar">
                            <a class="nav-link" data-toggle="menubar" href="#" role="button">
                                <i class="icon hamburger hamburger-arrow-left">
                                <span class="sr-only">Toggle menubar</span>
                                <span class="hamburger-bar"></span>
                                </i>
                            </a>
                        </li>
                        <li class="nav-item hidden-sm-down" id="toggleFullscreen">
                            <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                                <span class="sr-only">Toggle fullscreen</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Navbar Toolbar Right -->
                    <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Notifications"
                                aria-expanded="false" data-animation="scale-up" role="button">
                                <i class="icon md-notifications" aria-hidden="true"></i>
                                <span class="badge badge-pill badge-danger up">5</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                                <div class="dropdown-menu-header">
                                    <h5>NOTIFICATIONS</h5>
                                    <span class="badge badge-round badge-danger">New 5</span>
                                </div>
                                <div class="list-group">
                                    <div data-role="container">
                                        <div data-role="content">
                                            <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                                <div class="media">
                                                    <div class="pr-10">
                                                        <i class="icon md-receipt bg-red-600 white icon-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">A new order has been placed</h6>
                                                        <time class="media-meta" datetime="2017-06-12T20:50:48+08:00">5 hours ago</time>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                                <div class="media">
                                                    <div class="pr-10">
                                                        <i class="icon md-account bg-green-600 white icon-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Completed the task</h6>
                                                        <time class="media-meta" datetime="2017-06-11T18:29:20+08:00">2 days ago</time>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                                <div class="media">
                                                    <div class="pr-10">
                                                        <i class="icon md-settings bg-red-600 white icon-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Settings updated</h6>
                                                        <time class="media-meta" datetime="2017-06-11T14:05:00+08:00">2 days ago</time>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                                <div class="media">
                                                    <div class="pr-10">
                                                        <i class="icon md-calendar bg-blue-600 white icon-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Event started</h6>
                                                        <time class="media-meta" datetime="2017-06-10T13:50:18+08:00">3 days ago</time>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                                <div class="media">
                                                    <div class="pr-10">
                                                        <i class="icon md-comment bg-orange-600 white icon-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Message received</h6>
                                                        <time class="media-meta" datetime="2017-06-10T12:34:48+08:00">3 days ago</time>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-menu-footer">
                                    <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                        <i class="icon md-settings" aria-hidden="true"></i>
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                        All notifications
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
                                <span class="avatar avatar-online">
                                    <img src="<?php echo $foto; ?>" alt="x"><i></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="#ModalProfil" role="menuitem"
                                    data-toggle="modal"><i class="icon ti-user" aria-hidden="true"></i> Profil
                                </a>
                                <a class="dropdown-item" href="#ModalFoto" role="menuitem"
                                    data-toggle="modal"><i class="icon ti-id-badge" aria-hidden="true"></i> Upload Foto Profil
                                </a>
                                <a class="dropdown-item" href="#ModalPassword" role="menuitem"
                                    data-toggle="modal"><i class="icon ti-key" aria-hidden="true"></i> Ubah Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#ModalLogout" role="menuitem"
                                    data-toggle="modal"><i class="icon ti-power-off" aria-hidden="true"></i></i> Logout
                                </a>
                            </div>
                        </li>
                        
                    </ul>
                    <!-- End Navbar Toolbar Right -->      
                    <div class="navbar-brand navbar-brand-center">
                        <a href="Beranda">
                            <img class="navbar-brand-logo navbar-brand-logo-normal" src="../tema/assets/images/gza2.png" title="e-money">
                            <img class="navbar-brand-logo navbar-brand-logo-special" src="../tema/assets/images/gza2.png" title="e-money">
                        </a>
                    </div>
                </div>
                <!-- End Navbar Collapse -->            
                <!-- Site Navbar Seach -->
                <div class="collapse navbar-search-overlap" id="site-navbar-search">
                    <form role="search">
                        <div class="form-group">
                            <div class="input-search">
                                <i class="input-search-icon md-search" aria-hidden="true"></i>
                                <input type="text" class="form-control" name="site-search" placeholder="Searchtema.">
                                <button type="button" class="input-search-close icon md-close" data-target="#site-navbar-search" data-toggle="collapse" aria-label="Close"></button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End Site Navbar Seach -->
            </div>
        </nav>
        <div class="site-menubar">
            <div class="site-menubar-header">
                <div class="cover overlay">
                    <img class="cover-image" src="../tema/assets/examples/images/coming-soon.jpg" alt="tema.">
                    <div class="overlay-panel vertical-align overlay-background">
                        <div class="vertical-align-middle">
                            <a class="avatar avatar-lg" href="javascript:void(0)">
                                <img src="<?= $foto; ?>" alt="">
                            </a>
                            <div class="site-menubar-info">
                                <h5 class="site-menubar-user"><?= $namauser; ?></h5>
                                <p class="site-menubar-email"><?= $level; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-menubar-body">
                <div>
                    <div>
                        <ul class="site-menu" data-plugin="menu">
                            <li class="site-menu-item active">
                                <a class="animsition-link" href="Beranda">
                                    <i class="site-menu-icon ti-layout-grid3" aria-hidden="true"></i>
                                    <span class="site-menu-title">Beranda</span>
                                </a>
                            </li>
                            <li class="site-menu-item has-sub">
                                <a href="javascript:void(0)">
                                    <i class="site-menu-icon ti-bookmark-alt" aria-hidden="true"></i>
                                    <span class="site-menu-title">Master Data</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <ul class="site-menu-sub">
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href="Barang">
                                            <span class="site-menu-title">Barang</span>
                                        </a>
                                    </ul>
                                </li>
                                <li class="site-menu-item has-sub">
                                    <a href="javascript:void(0)">
                                        <i class="site-menu-icon ti-bookmark-alt" aria-hidden="true"></i>
                                        <span class="site-menu-title">Transaksi</span>
                                        <span class="site-menu-arrow"></span>
                                    </a>
                                    <ul class="site-menu-sub">
                                        <li class="site-menu-item">
                                            <a class="animsition-link" href="Konfirmasi">
                                                <span class="site-menu-title">Konfirmasi</span>
                                            </a>
                                        </li>
                                        <li class="site-menu-item">
                                            <a class="animsition-link" href="Pencairan">
                                                <span class="site-menu-title">Pencairan</span>
                                            </a>
                                        </li>
                                        <li class="site-menu-item">
                                            <a class="animsition-link" href="TransaksiMasuk">
                                                <span class="site-menu-title">Transaksi Masuk</span>
                                            </a>
                                        </li>
                                        <li class="site-menu-item">
                                            <a class="animsition-link" href="TransaksiKeluar">
                                                <span class="site-menu-title">Transaksi Keluar</span>
                                            </a>
                                        </ul>
                                    </li>
                                <li class="site-menu-item has-sub">
                                    <a href="javascript:void(0)">
                                        <i class="site-menu-icon ti-bookmark-alt" aria-hidden="true"></i>
                                        <span class="site-menu-title">Laporan</span>
                                        <span class="site-menu-arrow"></span>
                                    </a>
                                    <ul class="site-menu-sub">
                                        <li class="site-menu-item">
                                            <a class="animsition-link" href="laporan">
                                                <span class="site-menu-title">Laporan Transaksi</span>
                                            </a>
                                        </li>
                                        </ul>
                                    </li>
                                    <li class="site-menu-item has-sub">
                                        <a href="javascript:void(0)">
                                            <i class="site-menu-icon ti-bookmark-alt" aria-hidden="true"></i>
                                            <span class="site-menu-title">Setting</span>
                                            <span class="site-menu-arrow"></span>
                                        </a>
                                        <ul class="site-menu-sub">
                                            <li class="site-menu-item">
                                                <a class="animsition-link" href="loghistory">
                                                    <span class="site-menu-title">Log History</span>
                                                </a>
                                            </ul>
                                        </li>
                                        <li class="site-menu-item has-sub">
                                            <a href="javascript:void(0)">
                                                <i class="site-menu-icon ti-bookmark-alt" aria-hidden="true"></i>
                                                <span class="site-menu-title">Akun</span>
                                                <span class="site-menu-arrow"></span>
                                            </a>
                                            <ul class="site-menu-sub">
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="Admin">
                                                        <span class="site-menu-title">Admin</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="Petugas">
                                                        <span class="site-menu-title">Petugas</span>
                                                    </a>
                                                </li>
                                                <li class="site-menu-item">
                                                    <a class="animsition-link" href="Santri">
                                                        <span class="site-menu-title">Santri</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page -->
            <div class="page">
                <div class="page-content container-fluid"> <!--mulai page-->
                <?php
                $halaman = "$page.php";
                if(!file_exists($halaman) || empty($page)){include "../not_found.php";}
                else{include "$halaman";}
                ?>
            </div>
        </div>
        <!-- End Page -->
        <!-- MODAL LOGOUT -->
        <div class="modal fade modal-danger" id="ModalLogout" aria-hidden="true" role="dialog" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Logout</h4>
                    </div>
                    <div class="modal-body">
                        <p>Anda Yakin Ingin Logout ?</p>
                    </div>
                    <div class="modal-footer">
                        <form method="post">
                            <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" name="btnlogout">Ya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--LOGOUT PHP-->
        <?php
        if (isset($_REQUEST["btnlogout"])){
        session_unset('33DweMB');
        echo "<script>window.location = '../Login';</script>";
        }
        ?>
        <!-- MODAL PROFIL -->
        <div class="modal fade modal-primary" id="ModalProfil" aria-hidden="true" role="dialog" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Profil Pengguna</h4>
                    </div>
                    <form method="post">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group input-group-icon">
                                            <span class="input-group-addon">
                                                <span class="icon ti-check" aria-hidden="true"></span>
                                            </span>
                                            <input type="text" class="form-control" value="<?= $iduser; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="input-group input-group-icon">
                                            <span class="input-group-addon">
                                                <span class="icon ti-shield" aria-hidden="true"></span>
                                            </span>
                                            <input type="text" class="form-control" value="<?php echo $level; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-icon">
                                    <span class="input-group-addon">
                                        <span class="icon ti-user" aria-hidden="true"></span>
                                    </span>
                                    <input type="text" class="form-control" value="<?= $namauser; ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group input-group-icon">
                                            <span class="input-group-addon">
                                                <span class="icon ti-home" aria-hidden="true"></span>
                                            </span>
                                            <input type="text" class="form-control" name="txtkelahiranu" value="<?= $kelahiranuser; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group input-group-icon">
                                            <span class="input-group-addon">
                                                <span class="icon ti-calendar" aria-hidden="true"></span>
                                            </span>
                                            <input type="date" class="form-control" name="txttgllahiru" value="<?= $tgllahiruser; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group input-group-icon">
                                            <span class="input-group-addon">
                                                <span class="icon ti-mobile" aria-hidden="true"></span>
                                            </span>
                                            <input type="text" class="form-control" name="txttelpu" value="<?= $telpuser; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="input-group input-group-icon">
                                            <span class="input-group-addon">
                                                <span class="icon ti-pin-alt" aria-hidden="true"></span>
                                            </span>
                                            <input type="" class="form-control" value="<?= $statususer; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="txtalamatu"><?= $alamatuser; ?></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" name="btnupdatep">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--UPDATE DATA PHP-->
        <?php
        if (isset($_REQUEST["btnupdatep"])){
        $a = $_REQUEST["txtkelahiranu"];
        $b = $_REQUEST["txttgllahiru"];
        $c = $_REQUEST["txttelpu"];
        $d = $_REQUEST["txtalamatu"];
        $SQL = "UPDATE admin SET kelahiran = '$a', tgl_lahir = '$b', telp = '$c', alamat = '$d' WHERE id = '$iduser'";
        $ProsesSimpan = mysqli_query($koneksi, $SQL);
        if ($ProsesSimpan){
        $isilog = "ID Admin = $iduser,\n Kelahiran = $a,\n Tgl Lahir = $b,\n Telp = $c,\n Alamat = $d";
        tambah_log('Admin','Update', $isilog, $iduser);
        echo "<script>
        swal({
        title: 'Update Berhasil',
        text: 'Profil Berhasil di Update',
        type: 'success',
        showCancelButton: false,
        confirmButtonClass: 'btn-success',
        confirmButtonText: 'OK',
        closeOnConfirm: false
        }, function () {window.location = '';});
        </script>";
        } else {
        echo "<script>
        swal({
        title: 'Update Gagal',
        text: 'Profil Gagal di Update',
        type: 'error',
        showCancelButton: false,
        confirmButtonClass: 'btn-success',
        confirmButtonText: 'OK',
        closeOnConfirm: false
        });
        </script>";
        }
        }
        ?>
        <!-- MODAL FOTO -->
        <div class="modal fade modal-primary" id="ModalFoto" aria-hidden="true" role="dialog" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Upload Foto Profil</h4>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="example-wrap">
                                <h4 class="example-title">Upload Foto Profil Khusus bertipe .jpg dengan Besar File < 500 Kb</h4>
                                <div class="example">
                                    <input type="file" id="input-foto" name="input-foto" data-plugin="dropify"
                                    data-default-file="<?= $foto; ?>"
                                    data-max-file-size="0.5M" onchange="cek_foto()">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" name="btnupload">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--UPLOAD FOTO PHP-->
        <?php
        if (isset($_REQUEST["btnupload"])){
        $lokasifile = $_FILES["input-foto"]["tmp_name"];
        move_uploaded_file($lokasifile, "../upload/akun/$iduser.jpg");
        if(file_exists("../upload/akun/$iduser.jpg")){
        echo "<script>
        swal({
        title: 'Upload Berhasil',
        text: 'Foto Profil Berhasil di Upload',
        type: 'success',
        showCancelButton: false,
        confirmButtonClass: 'btn-success',
        confirmButtonText: 'OK',
        closeOnConfirm: false
        }, function () {window.location = '';});
        </script>";
        }else {
        echo "<script>
        swal({
        title: 'Upload Gagal',
        text: 'Foto Profil Gagal di Upload',
        type: 'error',
        showCancelButton: false,
        confirmButtonClass: 'btn-success',
        confirmButtonText: 'OK',
        closeOnConfirm: false
        });
        </script>";
        }
        }
        ?>
        <!-- MODAL PASSWORD -->
        <div class="modal fade modal-primary" id="ModalPassword" aria-hidden="true" role="dialog" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Password Pengguna</h4>
                    </div>
                    <form method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="input-group input-group-icon">
                                    <span class="input-group-addon">
                                        <span class="icon ti-check" aria-hidden="true"></span>
                                    </span>
                                    <input type="password" class="form-control" name="txtpasslama" placeholder="Password Lama">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-icon">
                                    <span class="input-group-addon">
                                        <span class="icon ti-check" aria-hidden="true"></span>
                                    </span>
                                    <input type="password" class="form-control" name="txtpassbaru" placeholder="Password Baru">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-icon">
                                    <span class="input-group-addon">
                                        <span class="icon ti-check" aria-hidden="true"></span>
                                    </span>
                                    <input type="password" class="form-control" name="txtpasskonf" placeholder="Konfirmasi Password Baru">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" name="btnupdateps">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--UPDATE PASSWORD BARU-->
        <?php
        if (isset($_REQUEST["btnupdateps"])){
        $pssl = $_REQUEST["txtpasslama"];
        $pssb = $_REQUEST["txtpassbaru"];
        $pssbk = $_REQUEST["txtpasskonf"];
        $sql = "SELECT password FROM v_login WHERE id = '$iduser'";
        $tampil = mysqli_query($koneksi, $sql);
        while ($Data = mysqli_fetch_array($tampil)){$pDB = $Data["password"];}
        if (simple_encrypt($pssl) == $pDB){
        if ($pssb == $pssbk){
        $j = simple_encrypt($pssb);
        $SQL = "UPDATE admin SET password = '$j' WHERE id = '$iduser'";
        $ProsesUpdate = mysqli_query($koneksi, $SQL);
        if ($ProsesUpdate){
        echo "<script>
        swal({
        title: 'Update Berhasil',
        text: 'Password Berhasil di Update',
        type: 'success',
        showCancelButton: false,
        confirmButtonClass: 'btn-success',
        confirmButtonText: 'OK',
        closeOnConfirm: false
        }, function () {window.location = '';});
        </script>";
        }else {
        echo "<script>
        swal({
        title: 'Update Gagal',
        text: 'Password Gagal di Update',
        type: 'error',
        showCancelButton: false,
        confirmButtonClass: 'btn-success',
        confirmButtonText: 'OK',
        closeOnConfirm: false
        });
        </script>";
        }
        } else {
        echo "<script>
        swal({
        title: 'Update Gagal',
        text: 'Konfirmasi Password Baru Tidak Sama',
        type: 'error',
        showCancelButton: false,
        confirmButtonClass: 'btn-success',
        confirmButtonText: 'OK',
        closeOnConfirm: false
        });
        </script>";
        }
        } else {
        echo "<script>
        swal({
        title: 'Update Gagal',
        text: 'Password Lama Salah',
        type: 'error',
        showCancelButton: false,
        confirmButtonClass: 'btn-success',
        confirmButtonText: 'OK',
        closeOnConfirm: false
        });
        </script>";
        }
        }
        ?>
        <!-- FOOTER -->
        <footer class="site-footer">
            <div class="site-footer-legal">© 2019 <a href="http://themeforest.net/item/remark-responsive-bootstrap-admin-template/11989202">e-money</a></div>
            <div class="site-footer-right">
                Powered By <i class="red-600 icon ti-gift"></i> <a href="https://themeforest.net/user/creation-studio">SekawanProject</a>
            </div>
        </footer>
        <!-- Core  -->
        <script src="../tema/global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
        <script src="../tema/global/vendor/popper-js/umd/popper.min.js"></script>
        <script src="../tema/global/vendor/bootstrap/bootstrap.js"></script>
        <script src="../tema/global/vendor/animsition/animsition.js"></script>
        <script src="../tema/global/vendor/mousewheel/jquery.mousewheel.js"></script>
        <script src="../tema/global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
        <script src="../tema/global/vendor/asscrollable/jquery-asScrollable.js"></script>
        <script src="../tema/global/vendor/waves/waves.js"></script>
        
        <!-- Plugins -->
        <script src="../tema/global/vendor/switchery/switchery.js"></script>
        <script src="../tema/global/vendor/intro-js/intro.js"></script>
        <script src="../tema/global/vendor/screenfull/screenfull.js"></script>
        <script src="../tema/global/vendor/slidepanel/jquery-slidePanel.js"></script>
        <script src="../tema/global/vendor/chartist/chartist.min.js"></script>
        <script src="../tema/global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.js"></script>
        <script src="../tema/global/vendor/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="../tema/global/vendor/jvectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../tema/global/vendor/matchheight/jquery.matchHeight-min.js"></script>
        <script src="../tema/global/vendor/peity/jquery.peity.min.js"></script>
        <script src="../tema/global/vendor/dropify/dropify.min.js"></script>
        <script src="../tema/global/vendor/datatables.net/jquery.dataTables.js"></script>
        <script src="../tema/global/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
        <script src="../tema/global/vendor/datatables.net-fixedheader/dataTables.fixedHeader.js"></script>
        <script src="../tema/global/vendor/datatables.net-fixedcolumns/dataTables.fixedColumns.js"></script>
        <script src="../tema/global/vendor/datatables.net-rowgroup/dataTables.rowGroup.js"></script>
        <script src="../tema/global/vendor/datatables.net-scroller/dataTables.scroller.js"></script>
        <script src="../tema/global/vendor/datatables.net-responsive/dataTables.responsive.js"></script>
        <script src="../tema/global/vendor/datatables.net-responsive-bs4/responsive.bootstrap4.js"></script>
        <script src="../tema/global/vendor/datatables.net-buttons/dataTables.buttons.js"></script>
        <script src="../tema/global/vendor/datatables.net-buttons/buttons.html5.js"></script>
        <script src="../tema/global/vendor/datatables.net-buttons/buttons.flash.js"></script>
        <script src="../tema/global/vendor/datatables.net-buttons/buttons.print.js"></script>
        <script src="../tema/global/vendor/datatables.net-buttons/buttons.colVis.js"></script>
        <script src="../tema/global/vendor/datatables.net-buttons-bs4/buttons.bootstrap4.js"></script>
        <script src="../tema/global/vendor/asrange/jquery-asRange.min.js"></script>
        <script src="../tema/global/vendor/bootbox/bootbox.js"></script>
        <script src="../tema/global/js/Plugin/dropify.js"></script>
        <!-- Scripts -->
        <script src="../tema/global/js/Component.js"></script>
        <script src="../tema/global/js/Plugin.js"></script>
        <script src="../tema/global/js/Base.js"></script>
        <script src="../tema/global/js/Config.js"></script>
        
        <script src="../tema/assets/js/Section/Menubar.js"></script>
        <script src="../tema/assets/js/Section/Sidebar.js"></script>
        <script src="../tema/assets/js/Section/PageAside.js"></script>
        <script src="../tema/assets/js/Plugin/menu.js"></script>
        
        <!-- Config -->
        <script src="../tema/global/js/config/colors.js"></script>
        <!-- <script src="../tema/assets/js/config/tour.js"></script> -->
        <!-- <script>Config.set('assets', '../tema/assets');</script> -->
        
        <!-- Page -->
        <script src="../tema/assets/js/Site.js"></script>
        <script src="../tema/global/js/Plugin/asscrollable.js"></script>
        <script src="../tema/global/js/Plugin/slidepanel.js"></script>
        <script src="../tema/global/js/Plugin/switchery.js"></script>
        <script src="../tema/global/js/Plugin/matchheight.js"></script>
        <script src="../tema/global/js/Plugin/jvectormap.js"></script>
        <script src="../tema/global/js/Plugin/peity.js"></script>
        <script src="../tema/assets/examples/js/dashboard/v1.js"></script>
        <script src="../tema/global/js/Plugin/datatables.js"></script>
        <script src="../tema/assets/examples/js/tables/datatable.js"></script>
        <script src="../tema/assets/examples/js/uikit/icon.js"></script>
        <script>
        // $(".dataTable").datatable(
        //     searching: false;
        // );
        function cek_foto(){
        var tipe = $("#input-foto").val();
        var dtf = tipe.match(".jpg");
        if (dtf){}
        else{
        swal({
        title: 'File Salah',
        text: 'Hanya diperbolehkan Foto dengan extensi jpg',
        type: 'error',
        showCancelButton: false,
        confirmButtonClass: 'btn-success',
        confirmButtonText: 'OK',
        closeOnConfirm: false
        });
        $("#input-foto").val("");
        }
        }
        </script>
    </body>
</html>