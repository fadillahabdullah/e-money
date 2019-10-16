<?php $tabeldata = "Admin"; ?>

<div class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <button type="button" 
                    data-toggle="modal" data-target="#ModalTambah" class="btn btn-round btn-success btn-sm ">Tambah Data
            </button>
        </div>
        <h3 class="panel-title">Data Admin</h3>
    </header>
    <div class="panel-body">
        <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
            <thead>
                <tr>
                    <th style="width: 12%">ID Admin<br>Status</th>
                    <th style="width: 28%">Nama<br>Tanggal_lahir</th>
                    <th style="width: 15%">Alamat<br>Kelahiran</th>
                    <th style="width: 20%">Telpon</th>
                    <th style="width: 25%">Operasi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM e_admin ORDER BY id";
                    $tampil = mysqli_query($koneksi, $sql);
                    while ($z = mysqli_fetch_array($tampil)){ 
                        $id = $z["id"];
                        $nm = $z["nama"];
                        $tlh = $z["tgl_lahir"];
                        $alm = $z["alamat"];
                        $klh = $z["kelahiran"];
                        $tlp = $z["telp"];
                        $stt = $z["status"];
                        if($stt==1){
                            $sttt = "Aktif";
                            $warna = "success";
                            $tujuanmodal = "#ModalTidakAktif";
                        }else{
                            $sttt = "Tidak Aktif";
                            $warna = "danger";
                            $tujuanmodal = "#ModalAktif";
                        }
                        if($id == $iduser){$std = "disabled";}else{$std = "";}
                        echo "<tr>";
                            echo "<td>$id<br><span class='badge badge-$warna'>$sttt</span></td>";
                            echo "<td>$nm<br>".tgl_in($tlh)."</td>";
                            echo "<td>$alm<br>$klh</td>";
                            echo "<td>$tlp</td>";
                            echo "<td>"
                ?>
                        <button type="button" data-toggle="modal" data-target="<?= $tujuanmodal; ?>"        onclick="status('<?= $id; ?>')" class="btn btn-<?= $warna; ?> btn-success btn-sm" style="margin-bottom:5px;" <?= $std; ?>>Status
                        </button>
                        <button type="button" data-toggle="modal" data-target="#ModalReset"
                            onclick="reset('<?= $id; ?>')"
                            class="btn btn-<?= $warna; ?> btn-success btn-sm" style="margin-bottom:5px;">Reset
                        </button>
                        <button type="button" data-toggle="modal" data-target="#ModalEdit"
                            onclick="edit('<?= $id; ?>',
                                          '<?= $nm; ?>',
                                          '<?= $tlh; ?>',
                                          '<?= $alm; ?>',
                                          '<?= $klh; ?>',
                                          '<?= $tlp; ?>')"
                            class="btn btn-info btn-success btn-sm" style="margin-bottom:5px;">Edit
                        </button>
                        <button type="button" data-toggle="modal" data-target="#ModalHapus"
                            onclick="hapus('<?= $id; ?>',
                                           '<?= $nm; ?>',
                                           '<?= $tlh; ?>',
                                           '<?= $alm; ?>',
                                           '<?= $klh; ?>',
                                           '<?= $tlp; ?>')"
                            class="btn btn-danger btn-success btn-sm" style="margin-bottom:5px;">Hapus
                        </button>
                        <?php
                            echo "</td>";
                            echo "</tr>";
                           }
                        ?>
            </tbody>
        </table>
    </div>

    <!--MODAL TAMBAH DATA-->
    <div class="modal fade modal-success" id="ModalTambah" aria-hidden="true" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Admin</h4>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>ID Admin</label>
                                <input type="text" class="form-control" value="{Otomatis By Sistem}" readonly>
                            </div>
                            <div class="form-group col-md-8">
                                <label>Nama Admin</label>
                                <input type="text" class="form-control" name="txtnama" placeholder="ex : Yudha" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" name="txttlh" placeholder="ex : 01-01-2001" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Alamat</label>
                                <textarea class="form-control" name="txtalm" placeholder="ex : Dsn. Prayungan RT.03 RW.04 Kedungjati Kabuh Kab. Jombang" required></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Kelahiran</label>
                                <input type="text" class="form-control" name="txtklh" placeholder="ex : Jombang" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Telepon</label>
                                <input type="text" class="form-control" name="txttlp" placeholder="ex : 08********12" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="btntambah">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--TAMBAH DATA PHP-->
    <?php
        if (isset($_REQUEST["btntambah"])){
            $j = strtotime(date("YmdHis"));
            $k = $_REQUEST["txtnama"];
            $p = simple_encrypt($j);
            $m = $_REQUEST["txttlh"];
            $o = $_REQUEST["txtalm"];
            $l = $_REQUEST["txtklh"];
            $n = $_REQUEST["txttlp"];
            $q = "0";
            $SQL = "INSERT INTO e_admin VALUES ('$j','$k','$p','$m','$o','$l','$n','$q')";
            $ProsesSimpan = mysqli_query($koneksi, $SQL);
            if ($ProsesSimpan){
                $isilog = "ID Admin = $j,\n Nama Admin = $k,\n Tanggal Lahir = $m,\n Alamat = $o,\n Kelahiran = $l,\n Telepon = $n,\n Status = Tidak Aktif";
                tambah_log($tabeldata,'Tambah', $isilog, $iduser);
                echo "<script>
                  swal({
                      title: 'Simpan Berhasil',
                      text: 'Data Berhasil di Tambahkan',
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
                      title: 'Simpan Gagal',
                      text: 'Periksa Kembali Isian Anda',
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

    <!--MODAL EDIT DATA-->
    <div class="modal fade modal-info" id="ModalEdit" aria-hidden="true" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Admin</h4>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>ID Admin</label>
                                <input type="text" class="form-control" name="txtide" id="txtide" required readonly>
                            </div>
                            <div class="form-group col-md-8">
                                <label>Nama Admin</label>
                                <input type="text" class="form-control" name="txtnamae" id="txtnamae" placeholder="ex : Yudha" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" name="txttlhe" id="txttlhe" placeholder="ex : 01-01-2001" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Alamat</label>
                                <textarea class="form-control" name="txtalme" id="txtalme" placeholder="ex : Dsn. Prayungan RT.03 RW.04 Kedungjati Kabuh Kab. Jombang" required></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Kelahiran</label>
                                <input type="text" class="form-control" name="txtklhe" id="txtklhe" placeholder="ex : Jombang" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Telepon</label>
                                <input type="text" class="form-control" name="txttlpe" id="txttlpe" placeholder="ex : 08********12" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="btnedit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--UPDATE DATA PHP-->
    <?php
        if (isset($_REQUEST["btnedit"])){
            $j = $_REQUEST["txtide"];
            $k = $_REQUEST["txtnamae"];
            $m = $_REQUEST["txttlhe"];
            $o = $_REQUEST["txtalme"];
            $l = $_REQUEST["txtklhe"];
            $n = $_REQUEST["txttlpe"];
            
            $SQL = "UPDATE e_admin SET nama = '$k', tgl_lahir = '$m',alamat = '$o', kelahiran = '$l',  telp = '$n' WHERE id = '$j'";
            $ProsesSimpan = mysqli_query($koneksi, $SQL);
            if ($ProsesSimpan){
                $isilog = "ID Admin = $j,\n Nama Admin = $k,\n Tanggal Lahir = $m,\n Alamat = $o,\n Kelahiran = $l,\n Telepon = $n";
                tambah_log($tabeldata,'Update', $isilog, $iduser);
                echo "<script>
                  swal({
                      title: 'Update Berhasil',
                      text: 'Data Berhasil di Update',
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
                      text: 'Periksa Kembali Isian Anda',
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

    <!--MODAL HAPUS DATA-->
    <div class="modal fade modal-danger" id="ModalHapus" aria-hidden="true" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data Admin</h4>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="txtidh" name="txtidh">
                            <input type="hidden" id="txtnamah" name="txtnamah">
                            <input type="hidden" id="txttlhh" name="txttlhh">
                            <input type="hidden" id="txtalmh" name="txtalmh">
                            <input type="hidden" id="txtklhh" name="txtklhh">
                            <input type="hidden" id="txtlph" name="txttlph">
                            <div class="form-group col-md-12">
                                <p>Anda Yakin Ingin Menghapus Data Admin Ini ?</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="btnhapus">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--HAPUS DATA PHP-->
    <?php
        if (isset($_REQUEST["btnhapus"])){
            $j = $_REQUEST["txtidh"];
            $k = $_REQUEST["txtnamah"];
            $m = $_REQUEST["txttlhh"];
            $o = $_REQUEST["txtalmh"];
            $l = $_REQUEST["txtklhh"];
            $n = $_REQUEST["txttlph"];
            $SQL = "DELETE FROM e_admin WHERE id = '$j'";
            $ProsesSimpan = mysqli_query($koneksi, $SQL);
            if ($ProsesSimpan){
                $isilog = "ID Admin = $j,\n Nama Admin = $k,\n Tanggal Lahir = $m,\n Alamat = $o,\n Kelahiran = $l,\n Telepon = $n";
                tambah_log($tabeldata,'Hapus', $isilog, $iduser);
                echo "<script>
                  swal({
                      title: 'Hapus Berhasil',
                      text: 'Data Berhasil di Hapus',
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
                      title: 'Hapus Gagal',
                      text: 'Periksa Kembali Data Anda',
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

    <!--MODAL AKTIFKAN-->
    <div class="modal fade modal-danger" id="ModalAktif" aria-hidden="true" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Aktifkan Admin</h4>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="txtida" name="txtida">
                            <div class="form-group col-md-12">
                                <p>Anda Yakin Ingin Mengaktifkan Admin Ini ?</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="btnaktif">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--AKTIFKAN DATA PHP-->
    <?php
        if (isset($_REQUEST["btnaktif"])){
            $j = $_REQUEST["txtida"];
            $SQL = "UPDATE e_admin SET status = '1' WHERE id = '$j'";
            $ProsesSimpan = mysqli_query($koneksi, $SQL);
            if ($ProsesSimpan){
                $isilog = "Admin dengan ID = $j Telah di Aktifkan";
                tambah_log($tabeldata,'Update', $isilog, $iduser);
                echo "<script>
                  swal({
                      title: 'Update Berhasil',
                      text: 'Data Berhasil di Update',
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
                      text: 'Data Gagal di Update',
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

    <!--MODAL TIDAK AKTIFKAN-->
    <div class="modal fade modal-success" id="ModalTidakAktif" aria-hidden="true" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Non Aktifkan Admin</h4>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="txtidta" name="txtidta">
                            <div class="form-group col-md-12">
                                <p>Anda Yakin Ingin Menon-Aktifkan Admin Ini ?</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="btnnonaktif">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--NON AKTIFKAN DATA PHP-->
    <?php
        if (isset($_REQUEST["btnnonaktif"])){
            $j = $_REQUEST["txtidta"];
            $SQL = "UPDATE e_admin SET status = '0' WHERE id = '$j'";
            $ProsesSimpan = mysqli_query($koneksi, $SQL);
            if ($ProsesSimpan){
                $isilog = "Admin dengan ID = $j Telah di Non Aktifkan";
                tambah_log($tabeldata,'Update', $isilog, $iduser);
                echo "<script>
                  swal({
                      title: 'Update Berhasil',
                      text: 'Data Berhasil di Update',
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
                      text: 'Data Gagal di Update',
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

     <!--MODAL RESET-->
    <div class="modal fade modal-primary" id="ModalReset" aria-hidden="true" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Reset Password Admin</h4>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="txtidr" name="txtidr">
                            <div class="form-group col-md-12">
                                <p>Anda Yakin Ingin Me-Reset Password Admin Ini ?</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="btnreset">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--RESET PASSWORD PHP-->
    <?php
        if (isset($_REQUEST["btnreset"])){
            $j = $_REQUEST["txtidr"];
            $k = simple_encrypt($j);
            $SQL = "UPDATE e_admin SET password = '$k' WHERE id = '$j'";
            $ProsesSimpan = mysqli_query($koneksi, $SQL);
            if ($ProsesSimpan){
                $isilog = "Reset Password Admin ID = $j";
                tambah_log($tabeldata,'Update', $isilog, $iduser);
                echo "<script>
                  swal({
                      title: 'Update Berhasil',
                      text: 'Reset Password Berhasil',
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
                      text: 'Reset Password Gagal',
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


</div>

<script>
    function edit(a, b, c, d, e, f){
        $("#txtide").val(a);
        $("#txtnamae").val(b);
        $("#txttlhe").val(c);
        $("#txtalme").val(d); 
        $("#txtklhe").val(e);
        $("#txttlpe").val(f);
        
    }

    function hapus(a, b, c, d, e, f){
        $("#txtidh").val(a);
        $("#txtnamah").val(b);
        $("#txttlhh").val(d);
        $("#txtalmh").val(f);
        $("#txtklhh").val(c);
        $("#txttlph").val(e);
        
    }

    function status(a){
        $("#txtida").val(a);
        $("#txtidta").val(a);
    }

    function reset(a){
        $("#txtidr").val(a);
    }
</script>