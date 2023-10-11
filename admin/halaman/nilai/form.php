<?php  if ($_GET['form'] == 'tambah') { ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Input Nilai Probabilitas Data Gejala</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <form class="user" action="halaman/nilai/proses.php?proses=tambah" method="POST">

                        <label>Pilih Penyakit</label>
                        <div class="form-group">
                            <select class="form-control" name="idp">
                                <option class="form-control">---Pilih Penyakit---</option>
                                <?php 
                                    $query = mysqli_query($kon, "SELECT * FROM penyakit ORDER BY kode_p ASC ")
                                        or die('Ada kesalahan pada query tampil Data barang: ' . mysqli_error($kon));
                                    while ($data = mysqli_fetch_assoc($query)) {
                                ?>
                                <option value="<?php echo $data['kode_p'] ?>"><?php echo $data['nama_p'] ?> 
                                (<?php echo $data['kode_p'] ?>)</option>
                                <?php } ?>
                            </select>
                        </div>

                        <label>Pilih Gejala</label>
                        <div class="form-group">
                            <select class="form-control" name="idg">
                                <option class="form-control">---Pilih Gejala---</option>
                                <?php 
                                    $query1 = mysqli_query($kon, "SELECT * FROM gejala ORDER BY kode_g ASC ")
                                        or die('Ada kesalahan pada query tampil Data barang: ' . mysqli_error($kon));
                                    while ($data1 = mysqli_fetch_assoc($query1)) {
                                ?>
                                <option value="<?php echo $data1['kode_g'] ?>"><?php echo $data1['nama_g'] ?>
                                    (<?php echo $data1['kode_g'] ?>)
                                </option>
                                <?php } ?>
                            </select>
                        </div>

                        <label>Banyak Pasien Yang Pernah Mengalami</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="bg_penyakit" > 
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
<?php  } 


elseif ($_GET['form'] == 'edit') { 

    if (isset($_GET['id'])) {
    // fungsi query untuk menampilkan data dari tabel stasiun
    $query = mysqli_query($kon, "SELECT * FROM nilai_probabilitas inner join
                            penyakit on nilai_probabilitas.idp=penyakit.kode_p inner join
                            gejala on nilai_probabilitas.idg=gejala.kode_g WHERE id_pro='$_GET[id]'")
      or die('Ada kesalahan pada query tampil Data stasiun : ' . mysqli_error($kon));
    $data  = mysqli_fetch_assoc($query);
  }
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Nilai Probabilitas Data Gejala</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <form class="user" action="halaman/nilai/proses.php?proses=edit" method="POST">
                        <input type="hidden" class="form-control" name="id_pro" value="<?php echo $data['id_pro'] ?>">
                        <label>Pilih Penyakit</label>
                        <div class="form-group">
                            <select class="form-control" name="idp">
                                <option value="<?php echo $data['kode_p'] ?>"><?php echo $data['nama_p'] ?> 
                                (<?php echo $data['kode_p'] ?>)</option>
                                <?php 
                                    $query2 = mysqli_query($kon, "SELECT * FROM penyakit ORDER BY kode_p ASC ")
                                        or die('Ada kesalahan pada query tampil Data barang: ' . mysqli_error($kon));
                                    while ($data2 = mysqli_fetch_assoc($query2)) {
                                ?>
                                <option value="<?php echo $data2['kode_p'] ?>"><?php echo $data2['nama_p'] ?> 
                                (<?php echo $data2['kode_p'] ?>)</option>
                                <?php } ?>
                            </select>
                        </div>

                        <label>Pilih Gejala</label>
                        <div class="form-group">
                            <select class="form-control" name="idg">
                                <option value="<?php echo $data['kode_g'] ?>"><?php echo $data['nama_g'] ?> 
                                (<?php echo $data['kode_g'] ?>)</option>
                                <?php 
                                    $query1 = mysqli_query($kon, "SELECT * FROM gejala ORDER BY kode_g ASC ")
                                        or die('Ada kesalahan pada query tampil Data barang: ' . mysqli_error($kon));
                                    while ($data1 = mysqli_fetch_assoc($query1)) {
                                ?>
                                <option value="<?php echo $data1['kode_g'] ?>"><?php echo $data1['nama_g'] ?>
                                    (<?php echo $data1['kode_g'] ?>)
                                </option>
                                <?php } ?>
                            </select>
                        </div>

                        <label>Banyak Pasien Yang Pernah Mengalami</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="bg_penyakit" value="<?php echo $data['bg_penyakit'] ?>"> 
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