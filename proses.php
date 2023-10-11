<div class="container py-4 py-xl-5">
    <div class="col-md-12 col-md-offset-2">
        <h2>Berikut Hasil Diagnosa Sistem :</h2>
        <?php
        $query = mysqli_query($kon, "SELECT * FROM pasien where id_pasien = '$_GET[id_pasien]'")
            or die('Ada kesalahan pada query tampil Data barang: ' . mysqli_error($kon));
        $data = mysqli_fetch_assoc($query);
        ?>
        <table width="100%" style="font-size: 18px; font-weight: bold;">
            <tr>
                <td width="17%">Nama Pasien</td>
                <td width="1%">:</td>
                <td><?php echo $data['nama'] ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir Pasien</td>
                <td>:</td>
                <td><?php echo $data['tanggal'] ?></td>
            </tr>
            <tr>
                <td>Alamat Pasien</td>
                <td>:</td>
                <td><?php echo $data['alamat'] ?></td>
            </tr>
            <tr>
                <td>Nomot Hp Pasien</td>
                <td>:</td>
                <td><?php echo $data['nohp'] ?></td>
            </tr>
        </table>
        <center>
            <h3>Tabel Gejala Yang Dirasakan</h3>
            <table width="60%" border="1px">
                <thead>
                    <tr style="font-weight: bold; background-color: gray;">
                        <td align="center">No</td>
                        <td align="center">Kode Gejala</td>
                        <td align="center">Nama Gejala</td>
                        <td align="center">Keterangan</td>
                    </tr>
                </thead>
                <?php
                $noo = 1;
                $sqlp = mysqli_query($kon, "SELECT * FROM gejala ");
                while ($p = mysqli_fetch_assoc($sqlp)) {
                    $diag = mysqli_query($kon, "SELECT * FROM diagnosa where id_pasien='$_GET[id_pasien]' and pilih='$p[kode_g]'");
                    $d = mysqli_fetch_assoc($diag);
                    if ($d['pilih'] == $p['kode_g']) {
                        $ket = "<b style='color:green;'>" . "Ya" . "</b>";
                    } else {
                        $ket = "<b style='color:red;'>" . "Tidak" . "</b>";
                    }
                ?>
                    <tr>
                        <td align="center"><?php echo $noo;  ?></td>
                        <td align="center"><?php echo $p['kode_g'];  ?></td>
                        <td><?php echo $p['nama_g'];  ?></td>
                        <td align="center"><?php echo $ket;  ?></td>
                    </tr>
                <?php $noo++;
                } ?>
            </table>
            <br><br>
            <?php
            $sqlp = mysqli_query($kon, "SELECT * from penyakit");
            $rowp = mysqli_num_rows($sqlp);
            while ($rp = mysqli_fetch_array($sqlp)) {
                $kode_p[] = $rp['nilai_p'];
                $idp[] = $rp['kode_p'];
                $nama[] = $rp['nama_p'];
                $idpenyakit[] = $rp['idp'];
            }
            for ($i = 0; $i < $rowp; $i++) {
                $tot[$i] = 1;
                $penyakit = mysqli_query($kon, "SELECT * FROM diagnosa where id_pasien='$_GET[id_pasien]' and pilih IS NOT NULL AND pilih != ' '")
                    or die('Ada kesalahan pada query tampil Data barang: ' . mysqli_error($kon));
                while ($data = mysqli_fetch_assoc($penyakit)) {

                    $gejala[$i] = mysqli_query($kon, "SELECT * FROM nilai_probabilitas where idg='$data[pilih]' and idp='$idp[$i]' ")
                        or die('Ada kesalahan pada query tampil Data barang: ' . mysqli_error($kon));
                    while ($row[$i] = mysqli_fetch_row($gejala[$i])) {
                        $tot[$i] =  ($tot[$i]  * $row[$i][5]);
                    }
                }

                $total = $tot[$i] * $kode_p[$i];
                $semua[] = $total;
            }
            $tambah = array_sum($semua);
            $banyak = count($semua);

            for ($i = 0; $i < $banyak; $i++) {
                $proses = ($semua[$i] / $tambah) * 100;
                mysqli_query($kon, "INSERT into hasil (id_pasien, idp, proses) values ('$_GET[id_pasien]','$idpenyakit[$i]', '$proses')");
            }
            ?>


            <?php
            $hasil = mysqli_query($kon, "SELECT * FROM hasil inner join penyakit
					on hasil.idp=penyakit.idp
				 	where id_pasien='$_GET[id_pasien]' order by proses desc limit 1");
            while ($proses = mysqli_fetch_assoc($hasil)) {
                echo "<h4> Dari Proses Perhitungan Diata Nilai Tertinggi Adalah : <br>" . "Nilai Probabilitas Penyakit (" . $proses['nama_p'] . ") = " . $proses['proses'] . "%" . "</h4>";
                echo "<h4></h4>Solusi : <br>" . $proses['bp_solusi'] . "</h4>";
            }
            ?>
        </center>
        <center>
            <a data-toggle="tooltip" data-placement="top" title="Edit Data" style="margin-right:5px" class="btn btn-primary btn-sm" href="?p=detail&id=<?php echo $_GET['id_pasien']; ?>">
                Detail
            </a>
        </center>
    </div>
</div>