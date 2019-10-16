<?php 
  $tabeldata = "Pencairan"; 
  $tgl1 = $_SESSION["tgl1_p"];
  $tgl2 = $_SESSION["tgl2_p"];
?>

<div class="panel">
    <div class="page-header">
    <h1 class="page-title">Pencairan Saldo <strong></strong> | Kantin</h1>
  </div>
<header class="panel-heading">
<div class="panel-actions">
</div>
<h4 class="panel-title">
<form method="post" action="">
<div class="row">
    <div class="form-group col-md-4">
        <label>Dari Tanggal</label>
        <input type="date" class="form-control" name="tgl1" value="<?= $tgl1; ?>" required>
    </div>
    <div class="form-group col-md-4">
        <label>Sampai Tanggal</label>
        <input type="date" class="form-control" name="tgl2" value="<?= $tgl2; ?>" required>
    </div>
    <div class="form-group col-md-3">
        <button type="submit" style="margin-top: 27px;" class="btn btn-success" name="btnfilter">Filter</button>
    </div>
</div>
</form>
</h4>
</header>
</div>
<?php
    if (isset($_REQUEST["btnfilter"])){
?>
        <div class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <button type="submit" data-toggle="modal" data-target="#Modalsaldo" class="btn btn-round btn-success btn-sm" onclick="refresh()">Cairkan
                    </button>
                </div>
                <h3 class="panel-title">Data Pencairan Saldo</h3>
            </header>

            <div class="panel-body">
                <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
                    <thead>
                      <tr>
                        <th style="width: 12%">ID</th>
                        <th style="width: 10%">ID Santri</th>
                        <th style="width: 10%">Kode barang</th>
                        <th style="width: 13%">jumlah</th>
                        <th style="width: 13%">harga</th>
                        <th style="width: 12%">jam<br>tanggal</th>
                        <th style="width: 13%">Tanggal Cair</th>
                        <th style="width: 13%">Keterangan</th>
                        <th style="width: 13%">Diterima</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tgl1 = $_REQUEST["tgl1"];
                        $tgl2 = $_REQUEST["tgl2"];
                        $_SESSION["tgl1_p"] = $tgl1;
                        $_SESSION["tgl2_p"] = $tgl2;
                         $sql = "SELECT * FROM e_trans_keluar WHERE diterima = 'Tidak' AND tanggal BETWEEN '$tgl1' AND '$tgl2' ORDER BY id";
                        $totalharga=0;
                        $tampil = mysqli_query($koneksi, $sql);
                        while ($z = mysqli_fetch_array($tampil)){
                        $id = $z["id"];
                        $idsantri = $z["id_santri"];
                        $barang = $z["kd_brg"];
                        $jumlah = $z["jml"];
                        $harga = $z["harga"];
                        $jam = $z["jam"];
                        $tanggal = $z["tanggal"];
                        $x = $z["tgl_cair"];
                        $keterangan = $z["keterangan"];
                        $terima = $z["diterima"];
                        $totalharga+=$z["harga"];
                        echo "<tr>";
                          echo "<td>$id</td>";
                          echo "<td>$idsantri</td>";
                          echo "<td>$barang</td>";
                          echo "<td>$jumlah</td>";
                          echo "<td>$harga</td>";
                          echo "<td>$jam<br>".tgl_in($tanggal)."</td>";
                          echo "<td>$x</td>";
                          echo "<td>$keterangan</td>";
                          echo "<td>$terima</td>";
                            ?>
                            <?php
                          echo "</td>";
                        echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
<?php
    }
?>
<div class="modal fade modal-danger" id="Modalsaldo" aria-hidden="true" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pencairan Saldo</h4>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <p>Saldo yang dapat dicairkan: Rp. <?= number_format($totalharga,0,",","."); ?><br>
                                Anda Yakin Ingin Mencairkan Saldo ?</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="btnsaldo">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>  
        <?php
        if (isset($_REQUEST["btnsaldo"])){
            $tglskr = date("Y-m-d H:i:s");
            $SQL = "UPDATE e_trans_keluar SET tgl_cair = '$tglskr', diterima = 'Ya' WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'";
            //$SQL = "INSERT INTO e_santri VALUES ('$j','$kd','$k','$pin','$kln','$pas','$l','$m','$n','$o','$q')";
            
            $ProsesSimpan = mysqli_query($koneksi, $SQL);
            if ($ProsesSimpan){
                //$isilog = "ID Santri = $j,\n Kode e-money = $kd,\n Nama Santri = $k,\n PIN = $pin,\n Jenis kelamin = $kln,\n Kelahiran = $l,\n Tanggal Lahir = $m,\n Telepon = $n,\n Alamat = $o,\n Status = Tidak Aktif";
                //tambah_log($tabeldata,'Tambah', $isilog, $iduser);
                echo "<script>
                  swal({
                      title: 'Simpan Berhasil',
                      text: 'Saldo Berhasil di Cairkan',
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
  </div>
<script>
  function simpandata(){
    var id = $("#txtidsantri").val();
    var m = $("#txtnominal").val();
    var ket = $("#txtketerangan").val();
    var pin = $("#txtpin").val();
    var pin2 = $("#txtpin2").val();
      if(id == "" || pin2 == "" || m == "" || m == 0){
        swal({
          title: 'Simpan Gagal',
          text: 'Ada Isian yang Belum diisi',
          type: 'error',
          showCancelButton: false,
          confirmButtonClass: 'btn-success',
          confirmButtonText: 'OK',
          closeOnConfirm: false
        });
      return;
        }
      if(pin != pin2){
        swal({
          title: 'Simpan Gagal',
          text: 'PIN tidak Sesuai',
          type: 'error',
          showCancelButton: false,
          confirmButtonClass: 'btn-success',
          confirmButtonText: 'OK',
          closeOnConfirm: false
        });
      return;
        }
      $.ajax({
        url: "ajax/1111.php",
        method: "POST",
        data: {id: id, m: m, ket: ket},
        cache: false,
      success: function(x){
    if(x == 1){
      swal({
        title: 'Simpan Berhasil',
        text: 'Data Berhasil di Tambahkan',
        type: 'success',
        showCancelButton: false,
        confirmButtonClass: 'btn-success',
        confirmButtonText: 'OK',
        closeOnConfirm: false
        }, function(){
        window.location = '';
        });
        }else{
      swal({
        title: 'Simpan Gagal',
        text: 'Penambahan Saldo Gagal',
        type: 'error',
        showCancelButton: false,
        confirmButtonClass: 'btn-success',
        confirmButtonText: 'OK',
        closeOnConfirm: false
        });
       }
      }
    })
  }
  function carisantri(){
    var a = $("#txtkd").val();
    $.ajax({
      url: "ajax/4700.php",
      method: "POST",
      data: {a: a},
      cache: false,
    success: function(x){
    var r = x.split("|");
      $("#txtidsantri").val(r[0]);
      $("#txtnama").val(r[1]);
      $("#txtsaldo").val(r[2]);
      $("#txtpin").val(r[3]);
      }
    })
  }
</script>