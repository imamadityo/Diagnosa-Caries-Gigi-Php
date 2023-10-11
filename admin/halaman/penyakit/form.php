<?php if ($_GET['form'] == 'tambah') { ?>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Input Data Penyakit</h1>
        </div>
        <?php
        $query = mysqli_query($kon, "SELECT max(kode_p) as kodeTerbesar FROM penyakit");
        $data = mysqli_fetch_array($query);
        $kodeBarang = $data['kodeTerbesar'];
        $urutan = (int) substr($kodeBarang, 2, 2);
        $urutan++;
        $huruf = "P";
        $kodeBarang = $huruf . sprintf("%02s", $urutan);
        ?>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <form class="user" action="halaman/penyakit/proses.php?proses=tambah" method="POST">
                            <label>Kode Penyakit</label>
                            <div class="form-group">
                                <input type="text" class="form-control " name="kode_p" value="<?php echo $kodeBarang ?>">
                            </div>

                            <label>Nama Penyakit</label>
                            <div class="form-group">
                                <input type="text" class="form-control " name="nama_p">
                            </div>

                            <label>Banyak Pasien Yang Pernah Mengalami</label>
                            <div class="form-group">
                                <input type="text" class="form-control " name="bp_penyakit">
                            </div>

                            <label>Input Solusi</label>
                            <div class="form-group">
                                <input type="text" class="form-control " name="bp_solusi">
                            </div>

                            <div class="form-group">
                                <center>
                                    <input type="submit" class="btn btn-primary btn-user" name="simpan" value="Tambah Data">
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php  } elseif ($_GET['form'] == 'edit') {

    if (isset($_GET['id'])) {
        // fungsi query untuk menampilkan data dari tabel stasiun
        $query = mysqli_query($kon, "SELECT * FROM penyakit WHERE idp='$_GET[id]'")
            or die('Ada kesalahan pada query tampil Data stasiun : ' . mysqli_error($kon));
        $data  = mysqli_fetch_assoc($query);
    }
?>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Data Penyakit</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <form class="user" action="halaman/penyakit/proses.php?proses=edit" method="POST">
                            <input type="hidden" class="form-control " name="idp" value="<?php echo $data['idp'] ?>">
                            <label>Kode Penyakit</label>
                            <div class="form-group">
                                <input type="text" class="form-control " name="kode_p" value="<?php echo $data['kode_p'] ?>" disabled>
                            </div>

                            <label>Nama Penyakit</label>
                            <div class="form-group">
                                <input type="text" class="form-control " name="nama_p" value="<?php echo $data['nama_p'] ?>">
                            </div>

                            <label>Banyak Pasien Yang Pernah Mengalami</label>
                            <div class="form-group">
                                <input type="text" class="form-control " name="bp_penyakit" value="<?php echo $data['bp_penyakit'] ?>">
                            </div>

                            <label>Input Solusi</label>
                            <div class="form-group">
                                <input type="text" class="form-control " name="bp_solusi">
                            </div>

                            <div class="form-group">
                                <center>
                                    <input type="submit" class="btn btn-primary btn-user" name="simpan" value="Edit Data">
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>