<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Nilai Probabilita Gejala</h1>
    </div>
    <?php
    echo pesan($_GET["alert"]);
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="?p=nilai_p_form&form=tambah" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </span>
                <span class="text">Tambah Nilai Probabilita Gejala</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama & Kode Gejala</th>
                            <th>Nama & Kode Penyakit</th>
                            <th>Nilai Probabilitas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = mysqli_query($kon, "SELECT * FROM nilai_probabilitas inner join
                            penyakit on nilai_probabilitas.idp=penyakit.kode_p inner join
                            gejala on nilai_probabilitas.idg=gejala.kode_g ORDER BY id_pro ASC ")
                            or die('Ada kesalahan pada query tampil Data barang: ' . mysqli_error($kon));
                        foreach ($query as $data) {
                            $probabilitas = $data['bg_penyakit'] / $data['bp_penyakit'];

                        ?>
                            <tr>
                                <td>
                                    <center><?php echo $no ?></center>
                                </td>
                                <td><?php echo $data['nama_g'] . " <b>" . "(" . $data['kode_g'] . ")</b> = " . $data['bg_penyakit'] . " Orang" ?></td>
                                <td><?php echo $data['nama_p'] . " <b>" . "(" . $data['kode_p'] . ")</b> = " . $data['bp_penyakit'] . " Orang" ?></td>
                                <td>
                                    <center><?php echo round($data['nilai'], 3) ?></center>
                                </td>
                                <td>
                                    <center>
                                        <a data-toggle="tooltip" data-placement="top" title="Edit Data" style="margin-right:5px" class="btn btn-primary btn-sm" href="?p=nilai_p_form&form=edit&id=<?php echo $data['id_pro']; ?>">
                                            Edit
                                        </a>

                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $data['id_pro']; ?>">
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
    <div class="modal fade" id="exampleModal<?php echo $data['id_pro']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Ingin Menghapus Data <?php echo $data['nama_g'] . " <b>" . "(" . $data['kode_g'] . ")</b> = " . $data['bg_penyakit'] . " Orang" ?>....?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="halaman/nilai/proses.php?proses=hapus&id=<?php echo $data['id_pro']; ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>