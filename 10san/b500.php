<?php $tabeldata = "Barang"; ?>

<div class="panel">
    <header class="panel-heading">
        <h3 class="panel-title">Data Barang</h3>
    </header>
    <div class="panel-body">
        <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
            <thead>
                <tr>
                    <th style="width: 10%">ID</th>
                    <th style="width: 20%">Nama</th>
                    <th style="width: 10%">Satuan</th>
                    <th style="width: 10%">Harga</th>
                    <th style="width: 10%">isi</th>
                    <th style="width: 25%">Keterangan</th>
                    <th style="width: 10%">Stok</th>
                </tr>
            </thead>
            <tbody>
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
                        echo "<tr>";
                            echo "<td>$id</td>";
                            echo "<td>$nm</td>";
                            echo "<td>$sat</td>";
                            echo "<td>$hrg</td>";
                            echo "<td>$isi</td>";
                            echo "<td>$ket</td>";
                            echo "<td><font size='25px'>$stok</font></td>";
                ?>            
                <?php
                            echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
