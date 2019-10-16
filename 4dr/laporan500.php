<?php 
$tabeldata = "laporan"; 
?>
<div class="panel">
<header class="panel-heading">
<div class="panel-actions">
</div>
<h4 class="panel-title">
<form method="post" action="cetaktransaksi">
<div class="row">
  <div class="form-group col-md-3">
    <label>Jenis Transaksi</label>
    <select class="form-control" name="cbokategori" required>
      <option value="ts">Seluruh Transaksi (Masuk & Keluar)</option>
      <option value="tm">Hanya Transaksi Masuk</option>
      <option value="tk">Hanya Transaksi Keluar</option>
    </select>
  </div>
  <div class="form-group col-md-3">
  <label>Keyword</label>
  <input type="text" class="form-control" name="txtkeyword" placeholder="Nama Santri">
  </div>
    <div class="form-group col-md-2">
        <label>Dari Tanggal</label>
        <input type="date" class="form-control" name="tgl1" placeholder="" required>
    </div>
    <div class="form-group col-md-2">
        <label>Sampai Tanggal</label>
        <input type="date" class="form-control" name="tgl2" placeholder="" required>
    </div>
    <div class="form-group col-md-2">
        <button type="submit" style="margin-top: 27px;" class="btn btn-info" name="btncetak">Cetak</button>
    </div>
</div>
</form>
</h4>
</header>
</div>
