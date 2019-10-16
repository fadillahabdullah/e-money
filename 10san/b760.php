<div class="row" data-plugin="matchHeight" data-by-row="true">
	<div class='col-lg-6'>
		<div class="row">
		 	<?php
	            $sql = "SELECT *, (jumlah_masuk - jumlah_keluar) AS stok FROM v1";
	            $tampil = mysqli_query($koneksi, $sql);
	            while ($z = mysqli_fetch_array($tampil)){ 
	                $id = $z["id"];
	                $nm = $z["nama"];
	                $hrg = $z["harga"];
	                $isi = $z["isi"];
	                $sat = $z["satuan"];
	                $ket = $z["keterangan"];
	                $stok = $z["stok"];
	        ?>
	        	<div class='col-lg-5 panel' style="margin-left:40px;">
	        		<div class='example'>
			        	<div class="ribbon ribbon-clip ribbon-primary">
			        		<span class="ribbon-inner"><?= $nm; ?></span>
			        	</div>
			        	<div class="clearfix" style="margin-top:25px;">
			        		<div class="grey-800 float-left py-10">
			        			<i class="icon ti-wallet grey-600 font-size-24 vertical-align-bottom mr-5"></i>
			        		</div>
			        		<span class="float-right grey-700 font-size-30"><?= number_format($hrg,0,',','.'); ?></span>
			        	</div>
			        	<div class="clearfix">
			        		<div class="grey-800 float-left py-10">
			        			<i class="icon ti-package grey-600 font-size-24 vertical-align-bottom mr-5"></i>
			        		</div>
			        		<span class="float-right grey-700 font-size-30"><?= number_format($stok,0,',','.'); ?></span>
			        	</div>
			        	<p>Satuan <?= $sat; ?> dengan isi <?= $isi; ?> Pcs</p>
		        	</div>
	        	</div>
	        <?php
	            }
	        ?>
	    </div>
	</div>
	<div class='col-lg-6'>
		<div class="panel">
			<div class="panel-body" id="grafik-bar"></div>
		</div>
	</div>
</div>

<script>
    Highcharts.chart('grafik-bar', {
        chart: {type: 'column'},
        title: {text: 'Grafik Barang Masuk Bulan Ini'},
        subtitle: {text: 'Berdasarkan Jenis Produk'},
        xAxis: {
            categories: [
                <?php
                    $Query = "SELECT a.nama AS produk, IF((SELECT SUM(jumlah) FROM barang_masuk WHERE id_barang = a.id AND MONTH(tgl) = MONTH(now()) AND YEAR(tgl) = YEAR(now())) IS NULL,0,(SELECT SUM(jumlah) FROM barang_masuk WHERE id_barang = a.id AND MONTH(tgl) = MONTH(now()) AND YEAR(tgl) = YEAR(now()))) AS jumlah FROM barang AS a ORDER BY a.nama;";
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