<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Penyakit</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="?p=penyakit_form&form=tambah" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </span>
                <span class="text">Tambah Data Penyakit</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Penyakit</th>
                            <th>Nama Penyakit</th>
                            <th>Banyak Pasien</th>
                            <th>Probalitas</th>
                            <th>Solusi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = mysqli_query($kon, "SELECT * FROM penyakit ORDER BY kode_p ASC ")
                            or die('Ada kesalahan pada query tampil Data barang: ' . mysqli_error($kon));
                        while ($data = mysqli_fetch_assoc($query)) {

                        ?>
                            <tr>
                                <td>
                                    <center><?php echo $no ?></center>
                                </td>
                                <td><?php echo $data['kode_p'] ?></td>
                                <td><?php echo $data['nama_p'] ?></td>
                                <td>
                                    <center><?php echo $data['bp_penyakit'] ?> Orang</center>
                                </td>
                                <td>
                                    <center><?php echo $data['nilai_p'] ?></center>
                                </td>
                                <td>
                                    <center><?php echo $data['bp_solusi'] ?></center>
                                </td>
                                <td>
                                    <center>
                                        <a data-toggle="tooltip" data-placement="top" title="Edit Data" style="margin-right:5px" class="btn btn-primary btn-sm" href="?p=penyakit_form&form=edit&id=<?php echo $data['idp']; ?>">
                                            Edit
                                        </a>

                                        <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="halaman/penyakit/proses.php?proses=hapus&id=<?php echo $data['idp']; ?>" onclick="return confirm('Anda yakin ingin menghapus Data <?php echo $data['nama_p']; ?> ?');">
                                            Hapus
                                        </a>
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