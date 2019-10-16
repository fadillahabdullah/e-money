<?php 
    include "../../setting/koneksi.php";
    include "../../setting/mpdf60/mpdf.php";
    $mpdf = new mpdf("utf8", array(210,330),"","3","5","5","5","5","","","P");
    $tema = file_get_contents("../../tema/lap.css");
    $mpdf->WriteHTML($tema,1);
    session_start();
    $tahun_p =  $_SESSION["aa77"];
    $iddesa =  $_SESSION["dd77"];
    $sql = "SELECT * FROM desa WHERE id = '$iddesa'";
    $db = mysqli_query($koneksi, $sql);
    while($dt = mysqli_fetch_array($db)){$nmdesa = $dt["nama"];}
    ob_start();
?>

<h2 class="tengah">
    Laporan Anggaran Tahun <?php if($tahun_p == ""){echo "-";}else{echo $tahun_p;} ?><br>
    Desa <?php echo $nmdesa; ?> Kecamatan Tembelang
</h2>
<table border="1">
    <tr style='background-color:maroon; color:white;'>
        <td class="putih tengah" width="100px"><b>Kode</b></td>
        <td class="putih tengah" width="500px"><b>Nama Rekening</b></td>
        <td class="putih tengah" width="200px"><b>Nominal</b></td>
        <td class="putih tengah" width="200px"><b>Selisih</b></td>
        <td class="putih tengah" width="100px"><b>Status</b></td>
    </tr>
    <?php
        $sql = "SELECT * FROM rek_induk2 WHERE SUBSTRING(kode,1,4) = '$tahun_p' ORDER BY kode";
        $tampil = mysqli_query($koneksi, $sql);
        while ($z = mysqli_fetch_array($tampil)){ 
            $a = $z["kode"];
            $b = $z["nama"];
            $c = $z["keterangan"];
            echo "<tr style='background-color:#1BA39C; color:white;'>";
                echo "<td style='color:white; font-size:18px;'>".substr($a,-1)."</td>";
                echo "<td style='color:white; font-size:18px;'>$b</td>";
                echo "<td style='text-align:right; color:white; font-size:18px;'>";
                    //JUMLAH NOMINAL PADA REKENING INDUK-----------------------------------
                    $query = "SELECT SUM(pagu_anggaran) AS jumlah FROM rek_subinduk2 WHERE SUBSTRING(kode,1,6) = '$a' ORDER BY kode";
                    $show = mysqli_query($koneksi, $query);
                    while ($y = mysqli_fetch_array($show)){echo number_format($y["jumlah"],2,',','.');}
                    //------------------------------------
                echo "</td>";
                echo "<td></td>";
                echo "<td></td>";
            echo "</tr>";
            $sql2 = "SELECT * FROM rek_subinduk2 WHERE SUBSTRING(kode,1,6) = '$a' ORDER BY kode";
            $tampil2 = mysqli_query($koneksi, $sql2);
            while ($z2 = mysqli_fetch_array($tampil2)){ 
                $d = $z2["kode"];
                $e = $z2["nama"];
                $f = $z2["keterangan"];
                $g = $z2["pagu_anggaran"];
                echo "<tr>";
                    echo "<td style='font-size:18px;'>".substr($d,-3)."</td>";
                    echo "<td style='font-size:18px;'>$e</td>";
                    echo "<td style='text-align:right; font-size:18px;'>".number_format($g,2,',','.')."</td>";
                    echo "<td style='text-align:right; font-size:18px;'>";
                        //JUMLAH NOMINAL TERPAKAI
                        $nom_pakai = 0;
                        $query = "SELECT SUM(nominal) AS jumlah FROM anggaran_desa WHERE SUBSTRING(kode,1,8) = '$d' AND SUBSTRING(kode,17,2) = '$iddesa' ORDER BY kode";
                        $show = mysqli_query($koneksi, $query);
                        while ($y = mysqli_fetch_array($show)){$nom_pakai = $y["jumlah"];}
                        $selisih = $g-$nom_pakai;
                        echo number_format($selisih,2,',','.');
                        //------------------------------------
                    echo "</td>";
                    echo "<td style='text-align: center;'>";
                        if($selisih == 0 && $g != 0){echo "Pas";}
                        if($selisih == 0 && $g == 0){echo "?";}
                        if($selisih < 0){echo "Defisit";}
                        if($selisih > 0){echo "Surplus";}
                    echo "</td>";
                echo "</tr>";
                $sql3 = "SELECT * FROM rek_program2 WHERE SUBSTRING(kode,1,8) = '$d' ORDER BY kode";
                $tampil3 = mysqli_query($koneksi, $sql3);
                while ($z3 = mysqli_fetch_array($tampil3)){ 
                    $h = $z3["kode"];
                    $i = $z3["nama"];
                    $j = $z3["keterangan"];
                    echo "<tr>";
                        echo "<td style='font-size:18px;'>".substr($h,-5)."</td>";
                        echo "<td style='font-size:18px;'>$i</td>";
                        echo "<td style='text-align:right; font-size:18px;'>";
                            //JUMLAH NOMINAL PADA REKENING PROGRAM
                            $query = "SELECT SUM(nominal) AS jumlah FROM anggaran_desa WHERE SUBSTRING(kode,1,10) = '$h' AND SUBSTRING(kode,17,2) = '$iddesa' ORDER BY kode";
                            $show = mysqli_query($koneksi, $query);
                            while ($y = mysqli_fetch_array($show)){echo number_format($y["jumlah"],2,',','.');}
                            //------------------------------------
                        echo "</td>";
                        echo "<td></td>";
                        echo "<td></td>";
                    echo "</tr>";
                    $sql4 = "SELECT * FROM rek_kegiatan2 WHERE SUBSTRING(kode,1,10) = '$h' ORDER BY kode";
                    $tampil4 = mysqli_query($koneksi, $sql4);
                    while ($z4 = mysqli_fetch_array($tampil4)){ 
                        $k = $z4["kode"];
                        $l = $z4["nama"];
                        $m = $z4["keterangan"];
                        echo "<tr>";
                            echo "<td style='font-size:18px;'>".substr($k,-7)."</td>";
                            echo "<td style='font-size:18px;'>$l</td>";
                            echo "<td style='text-align:right; font-size:18px;'>";
                             //JUMLAH NOMINAL PADA REKENING KEGIATAN
                            $query = "SELECT SUM(nominal) AS jumlah FROM anggaran_desa WHERE SUBSTRING(kode,1,12) = '$k' AND SUBSTRING(kode,17,2) = '$iddesa' ORDER BY kode";
                            $show = mysqli_query($koneksi, $query);
                            while ($y = mysqli_fetch_array($show)){echo number_format($y["jumlah"],2,',','.');}
                            //------------------------------------
                            echo "</td>";
                            echo "<td></td>";
                            echo "<td></td>";
                        echo "</tr>";
                        $sql5 = "SELECT a.kode, a.nama, b.nominal, b.keterangan, b.kode AS kodel FROM rek_kegiatandetail2 AS a LEFT JOIN anggaran_desa AS b ON a.kode = SUBSTRING(b.kode,1,15) WHERE SUBSTRING(b.kode,1,12) = '$k' AND SUBSTRING(b.kode,17,2) = '$iddesa' ORDER BY b.kode";
                        $tampil5 = mysqli_query($koneksi, $sql5);
                        while ($z5 = mysqli_fetch_array($tampil5)){ 
                            $n = $z5["kode"];
                            $o = $z5["nama"];
                            $p = $z5["keterangan"];
                            $q = $z5["nominal"];
                            $r = $z5["kodel"];
                            echo "<tr>";
                                echo "<td style='font-size:18px;'>".substr($n,-10)."</td>";
                                echo "<td style='font-size:18px;'>$o</td>";
                                echo "<td style='text-align:right; font-size:18px;'>".number_format($q,2,',','.')."</td>";
                                echo "<td></td>";
                                echo "<td></td>";
                            echo "</tr>";
                        }
                    }
                }
            }
        }
    ?>
</table>

<?php
    $isi = ob_get_contents();   
    ob_end_clean();     
    $mpdf->writeHTML(utf8_encode($isi));
    $mpdf->output("Data.pdf","I");
    exit;
?>