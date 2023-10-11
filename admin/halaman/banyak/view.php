<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Banyak Pasien Yang Pernah Mengalami</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">

            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <form class="user" action="halaman/banyak/proses.php?proses=edit" method="POST">
                        <label>Input Banyak Pasien Yang Pernah Mengalami</label>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="banyak" placeholder="Example : 100 Orang">
                        </div>
                        <div class="form-group">
                            <center>
                             <input type="submit" class="btn btn-primary btn-user" name="simpan" value="Tambah Data">
                            </center>
                        </div>
                    </form>
                </div>
            </div>

            <hr>
            <?php
                $query = mysqli_query($kon, "SELECT * from banyak");
                $banyak = mysqli_fetch_array($query);
              ?>
            <h2 align="center">Banyak Pasien Yang Pernah Di Mengalami "<?php echo $banyak['banyak']; ?>" Orang</h2>
        </div>
    </div>
</div>