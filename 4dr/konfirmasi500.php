<?php $tabeldata = "Konfirmasi"; ?>
<div class="panel">
  <header class="panel-heading">
    <h3 class="panel-title">Konfirmasi Saldo</h3>
  </header>
  <div class="panel-body">
    <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
      <thead>
        <tr>
          <th style="width: 12%">ID</th>
          <th style="width: 12%">ID Santri</th>
          <th style="width: 15%">No.rekening<br>Nominal</th>
          <th style="width: 15%">Atas Nama</th>
          <th style="width: 10%">Jam<br>Tanggal</th>
          <th style="width: 10%">Status Diterima</th>
          <th style="width: 10%">Keterangan</th>
          <th style="width: 15%">Operasi</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $sql = "SELECT * FROM e_konfir ORDER BY id";
            $tampil = mysqli_query($koneksi, $sql);
            while ($z = mysqli_fetch_array($tampil)){
                $id = $z["id"];
                $idsantri = $z["id_santri"];
                $norek = $z["no_rek"];
                $nominal = $z["nominal"];
                $atasnama = $z["atas_nm"];
                $jam = $z["jm_transfer"];
                $tanggal = $z["tgl_transfer"];
                $menerima = $z["status"];
                $ket = $z["keterangan"];
                if($menerima == "DiTerima"){
                    $warna = "success";
                }else{
                    $warna = "danger";
                }
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$idsantri</td>";
                echo "<td>$norek<br>$nominal</td>";
                echo "<td>$atasnama</td>";
                echo "<td>$jam<br>".tgl_in($tanggal)."</td>";
                echo "<td><span class='badge badge-$warna'>$menerima</span></td>";
                echo "<td>$ket</td>";
                echo "<td>";
                  if($menerima == "Proses"){
        ?>
                      <button type="button" data-toggle="modal" data-target="#ModalTerima" 
                          data-id="<?= $id; ?>" onclick="terimasaldo(this)" 
                          class="btn btn-success btn-sm" 
                          style="margin-bottom:5px;">DiTerima
                      </button>
                      <button type="button" data-toggle="modal" data-target="#ModalTolak" 
                          data-id="<?= $id; ?>" onclick="tolaksaldo(this)" 
                          class="btn btn-danger btn-sm" 
                          style="margin-bottom:5px;">DiTolak
                      </button>
        <?php
                  }
                echo "</td>";
            }
        ?>
              
      </tbody>
    </table>
  </div>
  <!--MODAL Terima DATA-->
  <div class="modal fade modal-success" id="ModalTerima" aria-hidden="true" role="dialog" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Terima Data Konfirmasi Saldo</h4>
        </div>
        <form method="post">
          <div class="modal-body">
            <div class="row">
              <input type="hidden" id="txtidh" name="txtidh">
              <div class="form-group col-md-12">
                <p>Anda Yakin Ingin Menerima Data Konfirmasi Saldo Ini ?</p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" name="btnterima">Terima</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--Terima DATA PHP-->
  <?php
  if (isset($_REQUEST["btnterima"])){
  $j = $_REQUEST["txtidh"];
  $SQL = "UPDATE e_konfir SET status = 'DiTerima' WHERE id = '$j'";
  $ProsesSimpan = mysqli_query($koneksi, $SQL);
  if ($ProsesSimpan){
  $isilog = "ID = $j,\n ID Santri = $id,\n Jam = $jam,\n tanggal = $tanggal,\n nominal = $nominal,\n keterangan = $keterangan";
  tambah_log($tabeldata,'Hapus', $isilog, $iduser);
  echo "<script>
  swal({
  title: 'Terima Berhasil',
  text: 'Data Berhasil di Terima',
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
  title: 'Terima Gagal',
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
  <div class="modal fade modal-danger" id="ModalTolak" aria-hidden="true" role="dialog" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tolak Data Konfirmasi Saldo</h4>
        </div>
        <form method="post">
          <div class="modal-body">
            <div class="row">
              <input type="hidden" id="txtidt" name="txtidt">
              <!-- <input type="text" id="txtket" name="txtket" required> -->
              <div class="form-group col-md-12">
                <textarea id="txtket" class="form-control" required placeholder="Tulis Alasan Penolakan"></textarea>
                <p>Anda Yakin Ingin Menolak Data Konfirmasi Saldo Ini ?</p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" name="btntolak">Tolak</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--Toak DATA PHP-->
  <?php
  if (isset($_REQUEST["btntolak"])){
  $j = $_REQUEST["txtidt"];
  $ket = $_REQUEST["txtket"];
  $SQL = "UPDATE e_konfir SET status = 'DiTolak', keterangan = '$ket' WHERE id = '$j'";
  $ProsesSimpan = mysqli_query($koneksi, $SQL);
  if ($ProsesSimpan){
  $isilog = "ID = $j,\n ID Santri = $id,\n Jam = $jam,\n tanggal = $tanggal,\n nominal = $nominal,\n keterangan = $keterangan";
  tambah_log($tabeldata,'Hapus', $isilog, $iduser);
  echo "<script>
  swal({
  title: 'Tolak Berhasil',
  text: 'Data Berhasil di Tolak',
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
  title: 'Tolak Gagal',
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
    function terimasaldo(el){
        var id = $(el).data("id");
        $("#txtidh").val(id);
    }

    function tolaksaldo(el){
        var id = $(el).data("id");
        $("#txtidt").val(id);
    }
</script>