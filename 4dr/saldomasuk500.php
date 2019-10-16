<?php $tabeldata = "Saldo Masuk"; ?>

<div class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">Data Saldo Masuk</h3>
    </header>
    <div class="panel-body">
        <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
            <thead>
                <tr>
                    <th style="width: 10%">ID</th>
                    <th style="width: 15%">ID Santri</th>
                    <th style="width: 15%">Nama Santri</th>
                    <th style="width: 10%">Nominal</th>
                    <th style="width: 10%">Keterangan</th>
                    <th style="width: 10%">Operasi</th>
                </tr>
            </thead>
            <tbody>


                <?php
                    $sql = "SELECT a.*, b.nama AS nm_santri, c.nama AS id_santri FROM e_trans_masuk AS a LEFT JOIN e_santri AS b ON a.id_santri = b.id ORDER BY a.id";
                    $tampil = mysqli_query($koneksi, $sql);
                    while ($z = mysqli_fetch_array($tampil)){ 
                        $id = $z["id"];
                        $idg = $z["id_santri"];
                        $nmb = $z["nm_santri"];
                        $nominal = $z["nominal"];
                        $keterangan = $z["keterangan"];
                        echo "<tr>";
                            echo "<td>$id</td>";
                            echo "<td>$nmg</td>";
                            echo "<td>$nmb</td>";
                            echo "<td>$nominal</td>";
                            echo "<td>$keterangan</td>";
                            echo "</td>";
                          echo "<td>"
                    ?>
                            <button type="button" data-toggle="modal" data-target="#ModalEdit"
                                    onclick="edit('<?= $id; ?>',
                                                  '<?= $idg; ?>',
                                                  '<?= $nmb; ?>',
                                                  '<?= $nominal; ?>',
                                                  '<?= $keterangan; ?>')"
                                    class="btn btn-info btn-success btn-sm" style="margin-bottom:5px;">Edit
                                </button>
                                <button type="button" data-toggle="modal" data-target="#ModalHapus"
                                    onclick="hapus('<?= $id; ?>',
                                                    '<?= $idb; ?>',
                                                    '<?= $nmb; ?>',
                                                    '<?= $nominal; ?>',
                                                    '<?= $keterangan; ?>')"
                                    class="btn btn-danger btn-success btn-sm " style="margin-bottom:5px;">Hapus
                                </button>
                <?php
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>


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
                            <div class="form-group col-md-8">
                                <label>ID Barang Masuk</label>
                                <input type="text" class="form-control" name="txtide" id="txtide" value="{Otomatis By Sistem}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Jumlah</label>
                                <input type="number" class="form-control" name="txtjumlahe" id="txtjumlahe" required>
                            </div>
                            <div class="form-group col-md-6">
                                 <label>Nama Barang</label>
                                    <select class="form-control" name="txtbarang" id="txtbarang" required onchange="CekBarang()" required>
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
                        <button type="submit" class="btn btn-primary" name="btnedit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--UPDATE DATA PHP-->
    <?php
        if (isset($_REQUEST["btnedit"])){
            $k = $_REQUEST["txtide"];
            $l = date("Y-m-d");
            $m = date("H:i:s");
            $n = $_REQUEST["txtbarang"];
            $o = $_REQUEST["txtsatuan"];
            $p = $_REQUEST["txtjumlahe"];
            $SQL = "UPDATE barang_masuk SET tgl = '$l', jam = '$m', id_barang = '$n', satuan = '$o', jumlah = '$p' WHERE id = '$k'";
            $ProsesSimpan = mysqli_query($koneksi, $SQL);
            if ($ProsesSimpan){
                $isilog = "ID Barang Masuk = $k,\n Nama Barang = $n,\n Satuan = $o,\n Jumlah = $p";
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
        $("#txtjumlahe").val(g);
    }

    function hapus(a, b, c, d, e, f, g){
        $("#txtidh").val(a);
        $("#txtnmgudangh").val(b);
        $("#txttanggalh").val(c);
        $("#txtjamh").val(d);
        $("#txtnmbarangh").val(e);
        $("#txtsatuanh").val(f);
        $("#txtjumlahh").val(g);
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