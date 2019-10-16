<?php 
    $tabeldata = "Barang"; 
?>
<!-- <div class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
        </div>
        <h4 class="panel-title">
            <form method="post">
            <div class="row">
                <input type="hidden" id="txtkey" value="<?= $kolom; ?>">
                <div class="form-group col-md-">
                    <select class="form-control" name="cbocari" id="cbocari" required>
                      <option value="">-- Kriteria Kolom --</option>
                        <option value="id_barang">ID Barang</option>
                        <option value="nama">Nama Barang</option>
                        <option value="satuan">Satuan</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <input type="text" class="form-control" name="txtcari" value="<?= $keyword; ?>" placeholder="Botol">
                </div>
                <div class="form-group col-md-2">
                    <button type="submit" class="btn btn-info" name="btncari">Cari</button>
                </div>
            </div>
            </form>
        </h4>
    </header>
</div> -->
<div class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <button type="button" 
                    data-toggle="modal" data-target="#ModalTambah" class="btn btn-round btn-success btn-sm ">Tambah Data
            </button>
        </div>
        <h3 class="panel-title">Data Barang</h3>
    </header>
    <div class="panel-body">
        <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
            <thead>
                <tr>
                    <th style="width: 10%">ID</th>
                    <th style="width: 12%">Kode Barang</th>
                    <th style="width: 15%">Nama Barang</th>
                    <th style="width: 12%">Harga</th>
                    <th style="width: 15%">Merk</th>
                    <th style="width: 12%">Satuan</th>
                    <th style="width: 12%">Operasi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // if($kolom == NULL || $keyword == NULL){
                    //     $sql = "SELECT *, (jumlah_masuk - jumlah_keluar) AS stok FROM v1";
                    // }else{
                    //     $sql = "SELECT *, (jumlah_masuk - jumlah_keluar) AS stok FROM v1 WHERE $kolom LIKE '%$keyword%'";
                    // }
                    // //$sql = "SELECT *, (jumlah_masuk - jumlah_keluar) AS stok FROM v1 WHERE $kolom LIKE '%$keyword%'";
                    $sql = "SELECT * FROM e_barang ORDER BY id_barang";
                    $tampil = mysqli_query($koneksi, $sql);
                    while ($z = mysqli_fetch_array($tampil)){ 
                        $id = $z["id_barang"];
                        $kd = $z["kd_brg"];
                        $nm = $z["nm_barang"];
                        $hrg = $z["hrg_jual"];
                        $merk = $z["merk"];
                        $sat = $z["satuan"];
                        echo "<tr>";
                            echo "<td>$id</td>";
                            echo "<td>$kd</td>";
                            echo "<td>$nm</td>";
                            echo "<td>$hrg</td>";
                            echo "<td>$merk</td>";
                            echo "<td>$sat</td>";
                            echo "<td>"
                ?>
                                <button type="button" data-toggle="modal" data-target="#ModalEdit"
                                    onclick="edit('<?= $id; ?>',
                                                  '<?= $kd; ?>',
                                                  '<?= $nm; ?>',
                                                  '<?= $hrg; ?>',
                                                  '<?= $merk; ?>',
                                                  '<?= $sat; ?>')"
                                    class="btn btn-info btn-success btn-sm" style="margin-bottom:5px;">Edit
                                </button>
                                <button type="button" data-toggle="modal" data-target="#ModalHapus"
                                    onclick="hapus('<?= $id; ?>',
                                                   '<?= $kd; ?>',
                                                   '<?= $nm; ?>',
                                                   '<?= $hrg; ?>',
                                                   '<?= $merk; ?>',
                                                   '<?= $sat; ?>')"
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

    <!--MODAL TAMBAH DATA-->
    <div class="modal fade modal-success" id="ModalTambah" aria-hidden="true" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Barang</h4>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>ID Barang</label>
                                <input type="text" class="form-control" value="{Otomatis By Sistem}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Kode Barang</label>
                                <input type="text" class="form-control" name="txtkode" placeholder="ex : 99999" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" name="txtnama" placeholder="ex : Botol 330ml" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Harga</label>
                                <input type="number" class="form-control" name="txtharga" placeholder="ex : 55000" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>merk</label>
                                <input type="text" class="form-control" name="txtmerk" placeholder="ex : makroni" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Satuan</label>
                                <select class="form-control" name="txtsatuan" required>
                                  <option value="">--{Pilih Satuan}--</option>
                                    <option value="Lembar">Lembar</option>
                                    <option value="Karton">Karton</option>
                                    <option value="Pcs">Pcs</option>
                                </select>
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

   <!--  <!--TAMBAH DATA PHP-->
    <!-- <?php
        if (isset($_REQUEST["btncari"])){
          $_SESSION["kolomc"] = $_REQUEST["cbocari"];
          $_SESSION["keyword"] = $_REQUEST["txtcari"];
          echo "<script>window.location = '';</script>";
        }
    ?> --> -->
    <!--TAMBAH DATA PHP-->
    <?php
        if (isset($_REQUEST["btntambah"])){
            $j = strtotime(date("YmdHis"));
            $kd =  $_REQUEST["txtkode"]; 
            $k = $_REQUEST["txtnama"];
            $l = $_REQUEST["txtharga"];
            $m = $_REQUEST["txtmerk"];
            $n = $_REQUEST["txtsatuan"];
            $SQL = "INSERT INTO e_barang VALUES ('$j','$kd','$k','$l','$m','$n')";
            $ProsesSimpan = mysqli_query($koneksi, $SQL);
            if ($ProsesSimpan){
                $isilog = "ID Barang = $j,\n Kode Barang = $k,\n Nama Barang = $k,\n Harga = $l,\n Merk = $m,\n Satuan = $n";
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
                    <h4 class="modal-title">Edit Data Barang</h4>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>ID Barang</label>
                                <input type="text" class="form-control" name="txtide" id="txtide" readonly>
                            </div>
                            <div class="form-group col-md-8">
                                <label>Kode Barang</label>
                                <input type="text" class="form-control" name="txtkde" id="txtkde" placeholder="000001" required>
                            </div>
                            <div class="form-group col-md-8">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" name="txtnamae" id="txtnamae" placeholder="ex : Botol 330ml" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Harga</label>
                                <input type="number" class="form-control" name="txthargae" id="txthargae" placeholder="ex : 55000" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Merk</label>
                                <input type="text" class="form-control" name="txtmerke" id="txtmerke" placeholder="ex : 48" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Satuan</label>
                                <select class="form-control" name="txtsatuane" id="txtsatuane" required>
                                    <option value="Lembar">Lembar</option>
                                    <option value="Karton">Karton</option>
                                    <option value="Pcs">Pcs</option>
                                </select>
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
            $l = $_REQUEST["txthargae"];
            $m = $_REQUEST["txtmerke"];
            $n = $_REQUEST["txtsatuane"];
            $SQL = "UPDATE e_barang SET kd_brg = '$kd', nm_barang = '$k', hrg_jual = '$l', merk = '$m', satuan = '$n' WHERE id_barang = '$j'";
            $ProsesSimpan = mysqli_query($koneksi, $SQL);
            if ($ProsesSimpan){
                $isilog = "ID Barang = $j,\n Kode Barang = $kd,\n Nama Barang = $k,\n Harga = $l,\n Merk = $m,\n Satuan = $n";
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
                    <h4 class="modal-title">Hapus Data Barang</h4>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="txtidh" name="txtidh">
                            <input type="hidden" id="txtkdh" name="txtkdh">
                            <input type="hidden" id="txtnamah" name="txtnamah">
                            <input type="hidden" id="txthargah" name="txthargah">
                            <input type="hidden" id="txtmerkh" name="txtmerkh">
                            <input type="hidden" id="txtsatuanh" name="txtsatuanh">
                            <div class="form-group col-md-12">
                                <p>Anda Yakin Ingin Menghapus Data Barang Ini ?</p>
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
            $l = $_REQUEST["txthargah"];
            $m = $_REQUEST["txtmerkh"];
            $n = $_REQUEST["txtsatuanh"];
            $SQL = "DELETE FROM e_barang WHERE id_barang = '$j'";
            $ProsesSimpan = mysqli_query($koneksi, $SQL);
            if ($ProsesSimpan){
                $isilog = "ID Barang = $j,\n Kode Barang = $kd,\n Nama Barang = $k,\n Harga = $l,\n Merk = $m,\n Satuan = $n";
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
    var aa = $("#txtkey").val();
    $("#cbocari").val(aa);

    function edit(a, b, c, d, e, f){
        $("#txtide").val(a);
        $("#txtkde").val(b);
        $("#txtnamae").val(c);
        $("#txthargae").val(d);
        $("#txtmerke").val(e);
        $("#txtsatuane").val(f);
    }

    function hapus(a, b, c, d, e, f){
        $("#txtidh").val(a);
        $("#txtkdh").val(b);
        $("#txtnamah").val(c);
        $("#txthargah").val(d);
        $("#txtmerkh").val(e);
        $("#txtsatuanh").val(f);
    }
</script>