<?php
    $sql = "SELECT SUM(saldo) AS jumlah FROM saldo_santri";
    $tampil = mysqli_query($koneksi, $sql);
    while ($z = mysqli_fetch_array($tampil)){ 
        $jmlss = $z["jumlah"];
    }
?>
<div class="row" data-plugin="matchHeight" data-by-row="true">
	<div class='col-lg-3'>
        <div class='row'>
            <div class='col-lg-12'>
                <div class="panel">
                    <div class="panel">
                    <div class='example'>
                        <div class="ribbon ribbon-clip ribbon-primary">
                            <span class="ribbon-inner">Cek Saldo Santri</span>
                        </div>
                        <div class="clearfix" style="margin-top:50px;">
                            <label class="floating-label">Masukkan Kode e-money</label>
                            <input type="text" class="form-control" id="txtsaldo" onkeyup="saldo()" required maxlength="10">  
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class='col-lg-12'>
                <div class="panel">
                    <div class='example'>
                        <div class="ribbon ribbon-clip ribbon-primary">
                            <span class="ribbon-inner">Saldo Santri</span>
                        </div>
                        <div class="clearfix" style="margin-top:50px;">
                            <div class="grey-800 float-left py-10" style="margin-left: 25px;">
                                <i class="icon ti-wallet grey-600 font-size-24 vertical-align-bottom mr-5"></i>
                            </div>
                            <span class="float-right grey-700 font-size-30" style="margin-right: 25px;">Rp. <?= number_format($jmlss,0,",","."); ?></span>
                        </div>
                        <p style="margin-left: 25px;">Saldo Semua Santri per <?= tgl_in(date("Y-m-d"))."<br>Jam ".date("H:i:s"); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div> 
	<div class='col-lg-9'>
		<div class="panel">
			<div class="panel-body" id="grafik-bar"></div>
		</div>
	</div>
</div>

<script>
    function saldo(){
        var tempel = $("#txtsaldo").val();
        var jmlsaldo;
        if(tempel.length == 10){
            $.getJSON("../api/get_saldo.php", {tempel: tempel}, function(result){
                $.each(result, function(i, kolom){
                    jmlsaldo = kolom.saldo;
                });
                swal({
                    title: 'Saldo Anda',
                    text: ' Rp. ' + jmlsaldo,
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonClass: 'btn-success',
                    confirmButtonText: 'OK',
                    closeOnConfirm: true
                }, function(){$("#txtsaldo").val("");});
            });
        }
    }
    Highcharts.chart('grafik-bar', {
        chart: {type: 'column'},
        title: {text: 'Grafik Saldo Santri Bulan Ini'},
        subtitle: {text: 'Berdasarkan Jenis Produk'},
        xAxis: {
            categories: [
                <?php
                    $Query = "SELECT a.nama AS produk, IF((SELECT SUM(c.jumlah) FROM transaksi AS b JOIN detail AS c ON b.id = c.id_transaksi WHERE c.id_barang = a.id AND MONTH(b.tgl) = MONTH(now()) AND YEAR(b.tgl) = YEAR(now()) GROUP BY c.id_barang) IS NULL,0,(SELECT SUM(c.jumlah) FROM transaksi AS b JOIN detail AS c ON b.id = c.id_transaksi WHERE c.id_barang = a.id AND MONTH(b.tgl) = MONTH(now()) AND YEAR(b.tgl) = YEAR(now()) GROUP BY c.id_barang)) AS jumlah FROM barang AS a ORDER BY a.nama;";
                    $SQL = mysqli_query($koneksi, $Query);
                    while ($x = mysqli_fetch_array($SQL)){
                        $data = $x["produk"];
                        echo "'$data',";
                    }
                ?>
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {text: 'Jumlah'}
        },
        tooltip: {
            headerFormat: '<span style="font-size:12px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.0f} Buah</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [
            {
                name: 'Jumlah',
                data: [
                    <?php
                        $SQL = mysqli_query($koneksi, $Query);
                        while ($x = mysqli_fetch_array($SQL)){
                            $jumlah = $x["jumlah"];
                           echo "$jumlah,";
                        }
                    ?>
                ]
            }
        ]
    });
</script>