<?php  if ($_GET['form'] == 'tambah') { ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Input Data Gejala</h1>
    </div>
    <?php
        $query = mysqli_query($kon, "SELECT max(kode_g) as kodeTerbesar FROM gejala");
        $data = mysqli_fetch_array($query);
        $kodeBarang = $data['kodeTerbesar'];
        $urutan = (int) substr($kodeBarang, 1, 2);
        $urutan++;
        $huruf = "G";
        $kodeBarang = $huruf . sprintf("%02s", $urutan);
      ?>


    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <form class="user" action="halaman/gejala/proses.php?proses=tambah" method="POST">
                        <label>Kode Gejala</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="kode_g" value="<?php echo $kodeBarang ?>">
                        </div>

                        <label>Nama Gejala</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nama_g">
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
    $query = mysqli_query($kon, "SELECT * FROM gejala WHERE idg='$_GET[id]'")
      or die('Ada kesalahan pada query tampil Data stasiun : ' . mysqli_error($kon));
    $data  = mysqli_fetch_assoc($query);
  }
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Gejala</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <form class="user" action="halaman/gejala/proses.php?proses=edit" method="POST">
                        <input type="hidden" class="form-control" name="idg" value="<?php echo $data['idg'] ?>">
                        <label>Kode Penyakit</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="kode_g" value="<?php echo $data['kode_g'] ?>" disabled> 
                        </div>

                        <label>Nama Penyakit</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nama_g" value="<?php echo $data['nama_g'] ?>">
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