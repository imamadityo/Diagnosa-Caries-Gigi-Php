<div class="container py-4 py-xl-5">
    <div class="col-md-12 col-md-offset-2">
        <form class="form-horizontal custom-form" method="post" action="">
            <h1>Input Data Identitas</h1>
            <div class="form-group">
                <div class="col-sm-4 label-column">
                    <label class="control-label" for="name-input-field">Input Nama Pasien </label>
                </div>
                <div class="col-sm-12 input-column"><input class="form-control" type="text" name="nama"></div>
            </div>

            <div class="form-group">
                <div class="col-sm-4 label-column">
                    <label class="control-label" for="name-input-field">Input Tanggal Lahir Pasien </label>
                </div>
                <div class="col-sm-12 input-column"><input class="form-control" type="date" name="tanggal"></div>
            </div>
            <div class="form-group">
                <div class="col-sm-4 label-column">
                    <label class="control-label" for="name-input-field">Input Alamat Pasien </label>
                </div>
                <div class="col-sm-12 input-column"><textarea class="form-control" name="alamat"></textarea></div>
            </div>
            <div class="form-group">
                <div class="col-sm-4 label-column">
                    <label class="control-label" for="name-input-field">Input Nomor HP Pasien </label>
                </div>
                <div class="col-sm-12 input-column"><input class="form-control" type="text" name="nohp"></div>
            </div>

            <h1>Input Gejala Yang Dirasakan</h1>
            <?php
            $no = 1;
            $query = mysqli_query($kon, "SELECT * FROM gejala ORDER BY idg ASC ")
                or die('Ada kesalahan pada query tampil Data barang: ' . mysqli_error($kon));
            while ($data = mysqli_fetch_assoc($query)) {
            ?>
                <div class="form-group">
                    <div class="col-sm-12 label-column">
                        <label class="control-label" for="name-input-field">
                            <?php echo $no . ". Apakah Anda Pernah Merasakan Gejala ( " . $data['nama_g'] . " ) ?" ?>
                        </label>
                    </div>
                    <div class="col-sm-12 input-column">
                        <select class="form-control" name="kode_g[]">
                            <option>--Jawab Pertanyaan--</option>
                            <option value="<?php echo $data['kode_g'] ?>">Ya Pernah Mengalami</option>
                            <option value="">Tidak Pernah Mengalami</option>
                        </select>
                    </div>
                </div>
            <?php $no++;
            } ?>
            <center>
                <input class="btn btn-primary submit-button" type="submit" name="simpan" value="Input Data">
            </center>
        </form>
        <?php
        if ($_POST["simpan"]) {

            $sqlag = mysqli_query($kon, "INSERT into pasien (nama, tanggal, alamat, nohp, tgl) values ('$_POST[nama]', '$_POST[tanggal]', '$_POST[alamat]', '$_POST[nohp]', NOW())");
            $id_pasien = mysqli_insert_id($kon);

            $kode_g = $_POST['kode_g'];
            $jumlah_dipilih = count($kode_g);
            for ($i = 0; $i < $jumlah_dipilih; $i++) {
                mysqli_query($kon, "INSERT into diagnosa (id_pasien,pilih) values ('$id_pasien','$kode_g[$i]')");
                echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=proses&id_pasien=$id_pasien'>";
            }
        }
        ?>
    </div>
</div>
<br>