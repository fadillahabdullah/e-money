<?php $tabeldata = "Santri"; ?>

<div class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <button type="button" 
                    data-toggle="modal" data-target="#ModalTambah" class="btn btn-round btn-success btn-sm" onclick="refresh()"">Tambah Data
            </button>
        </div>
        <h3 class="panel-title">Data Santri</h3>
    </header>
    <div class="panel-body">
        <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
            <thead>
                <tr>
                    <th style="width: 12%">ID Santri<br>Status</th>
                    <th style="width: 13%">Kode e-money</th>
                    <th style="width: 20%">Nama Santri<br>PIN</th>
                    <th style="width: 15%">Jenis kelamin<br>Kelahiran<br>Tanggal Lahir</th>
                    <th style="width: 15%">Telepon<br>Alamat</th>
                    <th style="width: 23%">Operasi</th>
                </tr>
        </thead>
            <tbody>
             <?php
                $sql = "SELECT * FROM e_santri ORDER BY id_santri";
                $tampil = mysqli_query($koneksi, $sql);
                while ($z = mysqli_fetch_array($tampil)){ 
                    $id = $z["id_santri"];
                    $kd = $z["kd_emoney"];
                    $nm = $z["nm_santri"];
                    $pin = $z["pin"];
                    $kln = $z["kelamin"];
                    $klh = $z["tmp_lahir"];
                    $tlh = $z["tgl_lahir"];
                    $tlp = $z["hp_ortu"];
                    $alm = $z["alamat"];
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
                    echo "<tr>";
                        echo "<td>$id<br><span class='badge badge-$warna'>$sttt</span></td>";
                        echo "<td>$kd</td>";
                        echo "<td>$nm<br>$pin</td>";
                        echo "<td>$kln<br>$klh<br>".tgl_in($tlh)."</td>";
                        echo "<td>$tlp<br>$alm</td>";
                        echo "<td>"
                   ?>
                        <button type="button" data-toggle="modal" data-target="<?= $tujuanmodal ?>"
                            onclick="status('<?= $id; ?>')"
                            class="btn btn-<?= $warna; ?> btn-success btn-sm" style="margin-bottom:5px;">Status
                        </button>
                        <button type="button" data-toggle="modal" data-target="#ModalReset"
                            onclick="reset('<?= $id; ?>')"
                            class="btn btn-primary btn-success btn-sm" style="margin-bottom:5px;">Reset
                        </button>
                        <button type="button" data-toggle="modal" data-target="#ModalEdit"
                            onclick="edit('<?= $id; ?>',
                                          '<?= $kd; ?>',
                                          '<?= $nm; ?>',
                                          '<?= $pin; ?>',
                                          '<?= $kln; ?>',
                                          '<?= $klh; ?>',
                                          '<?= $tlh; ?>',
                                          '<?= $tlp; ?>',
                                          '<?= $alm; ?>')"
                            class="btn btn-info btn-success btn-sm" style="margin-bottom:5px;">Edit
                        </button>
                        <button type="button" data-toggle="modal" data-target="#ModalHapus"
                            onclick="hapus('<?= $id; ?>',
                                           '<?= $kd; ?>',
                                           '<?= $nm; ?>',
                                           '<?= $pin; ?>',
                                           '<?= $kln; ?>',
                                           '<?= $klh; ?>',
                                           '<?= $tlh; ?>',
                                           '<?= $tlp; ?>',
                                           '<?= $alm; ?>')"
                            class="btn btn-danger btn-success btn-sm" style="margin-bottom:5px;">Hapus
                        </button>
                        <button type="submit" class="btn btn-round btn-success btn-sm" name="btncetak">Cetak</button>           
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
                    <h4 class="modal-title">Tambah Data Santri</h4>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>ID Santri</label>
                                <input type="text" class="form-control" value="{Otomatis By Sistem}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Kode e-money</label>
                                <input type="text" class="form-control" id="txtkd" name="txtkd" maxlength="10"  placeholder="ex : 1234567890" required onchange="kodeemoney()">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Nama Santri</label>
                                <input type="text" class="form-control" id="txtnama" name="txtnama" placeholder="ex : Fadil" required autocomplete="off">
                            </div>
                            <div class="form-group col-md-12">
                                <label>PIN</label>
                                <input type="password" class="form-control" id="txtpin" name="txtpin" placeholder="ex : ******" required autocomplete="off">
                            </div>                            
                            <div class="form-group col-md-6">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" id="txtkln" name="txtkln">
                                <option>>>----Pilih Jenis Kelamin----<<</option>
                                <option>laki-laki</option>
                                <option>perempuan</option>
                            </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Kelahiran</label>
                                <input type="text" class="form-control" id="txtklh" name="txtklh" placeholder="ex : Jombang" required autocomplete="off">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" id="txttlh" name="txttlh" placeholder="ex : 01-01-2001" required autocomplete="off">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Telepon</label>
                                <input type="text" class="form-control" id="txttlp" name="txttlp" placeholder="ex : 08********12" required autocomplete="off">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Alamat</label>
                                <textarea class="form-control" id="txtalm" name="txtalm" placeholder="ex : Dsn. Prayungan RT.03 RW.04 Kedungjati Kabuh Kab. Jombang" required autocomplete="off"></textarea>
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
            $kd = $_REQUEST["txtkd"];
            $k = $_REQUEST["txtnama"];
            $pin =$_REQUEST["txtpin"];
            $kln = $_REQUEST["txtkln"];
            $pas = simple_encrypt($j);
            $l = $_REQUEST["txtklh"];
            $m = $_REQUEST["txttlh"];
            $n = $_REQUEST["txttlp"];
            $o = $_REQUEST["txtalm"];
            $q = "0";
            $SQL = "INSERT INTO e_santri VALUES ('$j','$kd','$k','$pin','$kln','$pas','$l','$m','$n','$o','$q')";
            $ProsesSimpan = mysqli_query($koneksi, $SQL);
            if ($ProsesSimpan){
                $isilog = "ID Santri = $j,\n Kode e-money = $kd,\n Nama Santri = $k,\n PIN = $pin,\n Jenis kelamin = $kln,\n Kelahiran = $l,\n Tanggal Lahir = $m,\n Telepon = $n,\n Alamat = $o,\n Status = Tidak Aktif";
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
                    <h4 class="modal-title">Edit Data Santri</h4>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>ID Santri</label>
                                <input type="text" class="form-control" name="txtide" id="txtide" required readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Kode e-money</label>
                                <input type="text" class="form-control" name="txtkde" id="txtkde" maxlength="10" placeholder="ex : 8****" required>
                            </div>
                            <div class="form-group col-md-10">
                                <label>Nama Santri</label>
                                <input type="text" class="form-control" name="txtnamae" id="txtnamae" placeholder="ex : Fadil" required>
                            </div>
                            <div class="form-group col-md-10">
                                <label>PIN</label>
                                <input type="password" class="form-control" name="txtpine" id="txtpine" placeholder="ex : Fadil" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="txtklme" id="txtklme">
                                <option>laki-laki</option>
                                <option>perempuan</option>
                            </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Kelahiran</label>
                                <input type="text" class="form-control" name="txtklne" id="txtklne" placeholder="ex : Jombang" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" name="txttlhe" id="txttlhe" placeholder="ex : 01-01-2001" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Telepon</label>
                                <input type="text" class="form-control" name="txttlpe" id="txttlpe" placeholder="ex : 08********12" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Alamat</label>
                                <textarea class="form-control" name="txtalme" id="txtalme" placeholder="ex : Dsn. Prayungan RT.03 RW.04 Kedungjati Kabuh Kab. Jombang" required></textarea>
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
            $kd = $_REQUEST["txtkde"];
            $k = $_REQUEST["txtnamae"];
            $pin = $_REQUEST["txtpine"];
            $kln = $_REQUEST["txtklme"];
            $l = $_REQUEST["txtklne"];
            $m = $_REQUEST["txttlhe"];
            $n = $_REQUEST["txttlpe"];
            $o = $_REQUEST["txtalme"];
            $SQL = "UPDATE e_santri SET kd_emoney = '$kd', nm_santri = '$k',pin = '$pin', kelamin = '$kln', tmp_lahir = '$l', tgl_lahir = '$m', hp_ortu = '$n', alamat = '$o' WHERE id_santri = '$j'";
            $ProsesSimpan = mysqli_query($koneksi, $SQL);
            if ($ProsesSimpan){
                $isilog = "ID Santri = $j,\n Kode e-money = $kd,\n Nama Santri = $k,\n pin = $pin,\n kelamin = $kln,\n Kelahiran = $l,\n Tanggal Lahir = $m,\n Telepon = $n,\n Alamat = $o";
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
                    <h4 class="modal-title">Hapus Data Santri</h4>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="txtidh" name="txtidh">
                            <input type="hidden" id="txtkdh" name="txtkdh">
                            <input type="hidden" id="txtnamah" name="txtnamah">
                            <input type="hidden" id="txtpinh" name="txtpinh">
                            <input type="hidden" id="txtklhh" name="txtklhh">
                            <input type="hidden" id="txttlhh" name="txttlhh">
                            <input type="hidden" id="txtlph" name="txttlph">
                            <input type="hidden" id="txtalmh" name="txtalmh">
                            <div class="form-group col-md-12">
                                <p>Anda Yakin Ingin Menghapus Data Santri Ini ?</p>
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
            $kd = $_REQUEST["txtkdh"];
            $k = $_REQUEST["txtnamah"];
            $pin = $_REQUEST["txtpinh"];
            $kln = $_REQUEST["txtklmh"];
            $l = $_REQUEST["txtklhh"];
            $m = $_REQUEST["txttlhh"];
            $n = $_REQUEST["txttlph"];
            $o = $_REQUEST["txtalmh"];
            $SQL = "DELETE FROM e_santri WHERE id_santri = '$j'";
            $ProsesSimpan = mysqli_query($koneksi, $SQL);
            if ($ProsesSimpan){
                $isilog = "ID Santri = $j,\n Kode e-money = $kd,\n Nama Santri = $k,\n pin = $pin,\n Kelamin = $kln,\n Kelahiran = $l,\n Tanggal Lahir = $m,\n Telepon = $n,\n Alamat = $o";
                tambah_log($tabeldata,'Hapus', $isilog, $iduser);
                echo "<script>
                  swal({
                      title: 'Hapus Berhasil',
                      text: 'Data Berhasil di Hapus',
                      type: 'success',
                      showCancelButton: false,
                      confirmButtonClass: 'btn-success',
                      confirmButtonText: 'OK',
                     SantrieOnConfirm: false
                  }, function () {window.location = '';});
                  </script>";
            } else {
                  echo "<script>
                  swal({
                      title: 'Hapus Gagal',
                      texSantrieriksa Kembali Data Anda',
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
                    <h4 class="modal-title">Aktifkan Santri</h4>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="txtida" name="txtida">
                            <div class="form-group col-md-12">
                                <p>Anda Yakin Ingin Mengaktifkan Santri Ini ?</p>
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
        $SQL = "UPDATE e_santri SET status = '1' WHERE id_santri = '$j'";
        $ProsesSimpan = mysqli_query($koneksi, $SQL);
        if ($ProsesSimpan){
            $isilog = "Santri dengan ID = $j Telah di Aktifkan";
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
                    <h4 class="modal-title">Non Aktifkan Santri</h4>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="txtidta" name="txtidta">
                            <div class="form-group col-md-12">
                                <p>Anda Yakin Ingin Menon-Aktifkan Santri Ini ?</p>
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
            $SQL = "UPDATE e_santri SET status = '0' WHERE id_santri = '$j'";
            $ProsesSimpan = mysqli_query($koneksi, $SQL);
            if ($ProsesSimpan){
                $isilog = "Santri dengan ID = $j Telah di Non Aktifkan";
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
                    <h4 class="modal-title">Reset Password Santri</h4>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="txtidr" name="txtidr">
                            <div class="form-group col-md-12">
                                <p>Anda Yakin Ingin Me-Reset Password Santri Ini ?</p>
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
            $SQL = "UPDATE e_santri SET password = '$k' WHERE id_santri = '$j'";
            $ProsesSimpan = mysqli_query($koneksi, $SQL);
            if ($ProsesSimpan){
                $isilog = "Reset Password Santri ID = $j";
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
    function kodeemoney(){
        var a = $("#txtkd").val();
        $.ajax({
        url: "ajax/4446.php",
        method: "POST",
        data: {a: a},
        cache: false,
        success: function(x){
        if(x == 1){
           $("#txtkd").val("");
           $("#txtkd").focus(); 
        swal({
        title: 'Warning',
        text: 'Data Sudah Ada',
        type: 'warning',
        showCancelButton: false,
        confirmButtonClass: 'btn-success',
        confirmButtonText: 'OK',
        closeOnConfirm: false
        });
        }
    }
});
    }
    //fungsi refresh
    function refresh(){
        $('#txtkd').val("");
        $("#txtnama").val("");
        $("#txtpin").val("");
        $("#txtklm").val("");
        $("#txtkln").val("");
        $("#txttlh").val("");
        $("#txttlp").val("");
        $("#txtalm").val("");
    }

    function edit(a, b, c, d, e, f,g,h,i){
        $("#txtide").val(a);
        $("#txtkde").val(b);
        $("#txtnamae").val(c);
        $("#txtpine").val(d);
        $("#txtklme").val(e);
        $("#txtklne").val(f);
        $("#txttlhe").val(g);
        $("#txttlpe").val(h);
        $("#txtalme").val(i);
    }

    function hapus(a, b, c, d, e, f,g,h,i){
        $("#txtidh").val(a);
        $("#txtkdh").val(b);
        $("#txtnamah").val(c);
        $("#txtpinh").val(d);
        $("#txtklmh").val(e);
        $("#txtklhh").val(f);
        $("#txttlhh").val(g);
        $("#txttlph").val(h);
        $("#txtalmh").val(i);
    }

    function status(a){
        $("#txtida").val(a);
        $("#txtidta").val(a);
    }

    function reset(a){
        $("#txtidr").val(a);
    }
</script>