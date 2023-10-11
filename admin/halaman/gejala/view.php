<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Gejala</h1>
    </div>
    <?php
    echo pesan($_GET["alert"]);
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="?p=gejala_form&form=tambah" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </span>
                <span class="text">Tambah Data Gejala</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Gejala</th>
                            <th>Nama Gejala</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = mysqli_query($kon, "SELECT * FROM gejala ORDER BY idg ASC ")
                            or die('Ada kesalahan pada query tampil Data gejala: ' . mysqli_error($kon));
                        while ($data = mysqli_fetch_assoc($query)) {

                        ?>
                            <tr>
                                <td>
                                    <center><?php echo $no ?></center>
                                </td>
                                <td><?php echo $data['kode_g'] ?></td>
                                <td><?php echo $data['nama_g'] ?></td>
                                <td>
                                    <center>
                                        <a data-toggle="tooltip" data-placement="top" title="Edit Data" style="margin-right:5px" class="btn btn-primary btn-sm" href="?p=gejala_form&form=edit&id=<?php echo $data['idg']; ?>">
                                            Edit
                                        </a>

                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $data['idg']; ?>">
                                            Hapus
                                        </button>
                                    </center>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
foreach ($query as $data) {
?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal<?php echo $data['idg']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Ingin Menghapus Data <?php echo $data['nama_g'] . " <b>" . "(" . $data['kode_g'] . ")</b> = " ?>....?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="halaman/gejala/proses.php?proses=hapus&id=<?php echo $data['idg']; ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>