<?php $tabeldata = "Barang Masuk"; ?>

<div class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <button type="button" 
                    data-toggle="modal" data-target="#ModalTambah" class="btn btn-round btn-success btn-sm ">Tambah Data
            </button>
        </div>
        <h3 class="panel-title">Data Barang Masuk</h3>
    </header>
    <div class="panel-body">
        <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
            <thead>
                <tr>
                    <th style="width: 15%">ID</th>
                    <th style="width: 15%">Tanggal</th>
                    <th style="width: 15%">Jam</th>
                    <th style="width: 30%">Nama Barang</th>
                    <th style="width: 15%">Satuan</th>
                    <th style="width: 10%">Jumlah</th>
                </tr>
            </thead>
            <tbody>


                <?php
                    $sql = "SELECT a.*, b.nama AS nama_barang, c.nama AS admin_gudang FROM barang_masuk AS a LEFT JOIN barang AS b ON a.id_barang = b.id LEFT JOIN gudang AS c ON a.id_admin_gudang = c.id ORDER BY a.id";
                    $tampil = mysqli_query($koneksi, $sql);
                    while ($z = mysqli_fetch_array($tampil)){ 
                        $id = $z["id"];
                        $idg = $z["id_admin_gudang"];
                        $nmg = $z["admin_gudang"];
                        $tgl = $z["tgl"];
                        $jam = $z["jam"];
                        $idb = $z["id_barang"];
                        $nmb = $z["nama_barang"];
                        $sat = $z["satuan"];
                        $jml = $z["jumlah"];
                        echo "<tr>";
                            echo "<td>$id</td>";
                            echo "<td>".tgl_in($tgl)."</td>";
                            echo "<td>$jam</td>";
                            echo "<td>$nmb</td>";
                            echo "<td>$sat</td>";
                            echo "<td>$jml</td>";
                            echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!--MODAL TAMBAH DATA-->
    <div class="modal fade modal-success" id="ModalTambah" aria-hidden="true" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Barang Masuk</h4>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label>ID Barang Masuk</label>
                                <input type="text" class="form-control" value="{Otomatis By Sistem}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Jumlah</label>
                                <input type="number" class="form-control" name="txtjumlah" placeholder="ex : 50" required>
                            </div>
                            <div class="form-group col-md-6">
                                 <label>Nama Barang</label>
                                    <select class="form-control" name="txtbarang" id="txtbarang" required onchange="CekBarang()">
                                        <option value="">--{Pilih Barang}--</option>
                                          <?php
                                              $sql = "SELECT * FROM barang ORDER BY id";
                                              $tampil = mysqli_query($koneksi, $sql);
                                              while ($z = mysqli_fetch_array($tampil)){ 
                                                  $idb = $z["id"];
                                                  $nmb = $z["nama"];
                                                  echo "<option value='$idb'>$nmb</option>";
                                              }
                                          ?>
                                    </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Satuan</label>
                                <input type="text" class="form-control" name="txtsatuan" id="txtsatuan" readonly required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Harga</label>
                                <input type="text" class="form-control" id="txtharga" readonly>
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
            $a = strtotime(date("YmdHis"));
            $b = $iduser;
            $c = date("Y-m-d");
            $d = date("H:i:s");
            $e = $_REQUEST["txtbarang"];
            $f = $_REQUEST["txtsatuan"];
            $g = $_REQUEST["txtjumlah"];
            $SQL = "INSERT INTO barang_masuk VALUES ('$a','$b','$c','$d','$e','$f','$g')";
            $ProsesSimpan = mysqli_query($koneksi, $SQL);
            if ($ProsesSimpan){
                $isilog = "ID Barang Masuk = $a,\n ID Admin Gudang = $b,\n Tanggal = $c,\n Jam = $d,\n ID Barang = $e,\n Satuan = $f,\n Jumlah = $g";
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
                    <h4 class="modal-title">Edit Data Barang Masuk</h4>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>ID Barang Masuk</label>
                                <input type="text" class="form-control" name="txtide" id="txtide" required readonly>
                            </div>
                            <div class="form-group col-md-8">
                              <label>Nama Gudang</label>
                                <select class="form-control" name="txtnmgudange" id="txtidgudange" required>
                                    <option value="">--Pilih ID Gudang--</option>
                                      <?php
                                              $sql = "SELECT * FROM gudang ORDER BY id";
                                              $tampil = mysqli_query($koneksi, $sql);
                                              while ($z = mysqli_fetch_array($tampil)){ 
                                                  $nm = $z["nama"];
                                                  echo "<option value='$nm'>$nm</option>";
                                              }
                                        ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Tanggal</label>
                                <input type="date" class="form-control" name="txttanggale" id="txttanggale" value="{Otomatis By Sistem}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Jam</label>
                                <input type="time" class="form-control" name="txtjame" id="txtjame" value="{Otomatis By Sistem}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                              <label>Nama Barang</label>
                                <select class="form-control" name="txtnmbarange" id="txtnmbarange" required>
                                    <option value="Karton">--Pilih Nama Barang--</option>
                                      <?php
                                              $sql = "SELECT * FROM barang ORDER BY id";
                                              $tampil = mysqli_query($koneksi, $sql);
                                              while ($z = mysqli_fetch_array($tampil)){ 
                                                  $nm = $z["nama"];
                                                  echo "<option value='$nm'>$nm</option>";
                                              }
                                        ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Satuan</label>
                                <select class="form-control" name="txtsatuane" id="txtsatuane" value="{Otomatis By Sistem}" readonly>
                                          <?php
                                              $sql = "SELECT * FROM barang ORDER BY id";
                                              $tampil = mysqli_query($koneksi, $sql);
                                              while ($z = mysqli_fetch_array($tampil)){ 
                                                  $sat = $z["satuan"];
                                                  echo "<option value='$sat'>$sat</option>";
                                              }
                                          ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Jumlah</label>
                                <input type="number" class="form-control" name="txtjumlahe" id="txtjumlahe" placeholder="ex : 50" required>
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
            $k = $_REQUEST["txtidgudange"];
            $l = date("Y-m-d");
            $m = date("H:i:s");
            $n = $_REQUEST["txtidbarange"];
            $o = $_REQUEST["txtsatuane"];
            $p = $_REQUEST["txtjumlahe"];
            $SQL = "UPDATE barang_masuk SET id_gudang = '$k', tgl = '$l', jam = '$m', id_barang = '$n', satuan = '$o', jumlah = '$p' WHERE id = '$j'";
            $ProsesSimpan = mysqli_query($koneksi, $SQL);
            if ($ProsesSimpan){
                $isilog = "ID Barang Masuk = $j,\n ID Gudang = $k,\n Tanggal = $l,\n Jam = $m,\n ID Barang = $n,\n Satuan = $o,\n Jumlah = $p";
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
                    <h4 class="modal-title">Hapus Data Barang Masuk</h4>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="txtidh" name="txtidh">
                            <input type="hidden" id="txtidgudangh" name="txtidgudangh">
                            <input type="hidden" id="txttanggalh" name="txttanggalh">
                            <input type="hidden" id="txtjamh" name="txtjamh">
                            <input type="hidden" id="txtidbarangh" name="txtidbarangh">
                            <input type="hidden" id="txtsatuanh" name="txtsatuanh">
                            <input type="hidden" id="txtjumlahh" name="txtjumlahh">
                            <div class="form-group col-md-12">
                                <p>Anda Yakin Ingin Menghapus Data Barang Masuk Ini ?</p>
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
            $k = $_REQUEST["txtnmgudangh"];
            $l = date("Y-m-d");
            $m = date("H:i:s");
            $n = $_REQUEST["txtnmbarangh"];
            $o = $_REQUEST["txtsatuanh"];
            $p = $_REQUEST["txtjumlahh"];
            $SQL = "DELETE FROM barang_masuk WHERE id = '$j'";
            $ProsesSimpan = mysqli_query($koneksi, $SQL);
            if ($ProsesSimpan){
                $isilog = "ID Barang Masuk = $j,\n ID Gudang = $k,\n Tanggal = $l,\n Jam = $m,\n ID Barang = $n,\n Satuan = $o,\n Jumlah = $p";
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

</div>

<script>
    function edit(a, b, c, d, e, f, g){
        $("#txtide").val(a);
        $("#txtnmgudange").val(b);
        $("#txttanggale").val(c);
        $("#txtjame").val(d);
        $("#txtnmbarange").val(e);
        $("#txtsatuane").val(f);
        $("#txtjumlahe").val(f);
    }

    function hapus(a, b, c, d, e, f, g){
        $("#txtidh").val(a);
        $("#txtnmgudangh").val(b);
        $("#txttanggalh").val(c);
        $("#txtjamh").val(d);
        $("#txtnmbarangh").val(e);
        $("#txtsatuanh").val(f);
        $("#txtjumlahh").val(f);
    }

    function CekBarang(){
        var idbarang = $("#txtbarang").val();
        $.ajax({
            url: "ajax/4700.php",
            data: "idbarang=" + idbarang,
            cache: false,
            success: function(hasil){
                var nilai = hasil.split("|");
                $("#txtsatuan").val(nilai[0]);
                $("#txtharga").val(nilai[1]);
            }
        })
    }
</script>