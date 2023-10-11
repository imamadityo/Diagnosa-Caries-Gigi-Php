<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Input Cara Pemakaian WEB</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">

            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <form class="user" action="halaman/help/proses.php?proses=edit" method="POST">
                        <label>Input Data</label>
                        <div class="form-group">
                            <textarea name="help" class="form-control"></textarea>
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
                $query = mysqli_query($kon, "SELECT * from help");
                $help = mysqli_fetch_array($query);
              ?>
            <h2 align="center">Cara Menggunakan Web : <br> <?php echo $help['help']; ?></h2>
        </div>
    </div>
</div>