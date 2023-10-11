<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pasien</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Tanggal Konsultasi</th>
                            <th>Diagnosa</th>
                            <th>Nilai Probabilitas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = mysqli_query($kon, "SELECT * FROM pasien ORDER BY tgl ASC ")
                            or die('Ada kesalahan pada query tampil Data barang: ' . mysqli_error($kon));
                        while ($data = mysqli_fetch_assoc($query)) {
                            $query1 = mysqli_query($kon, "SELECT * FROM hasil inner join penyakit on
                            hasil.idp=penyakit.idp where id_pasien='$data[id_pasien]' ORDER BY proses desc")
                                or die('Ada kesalahan pada query tampil Data barang: ' . mysqli_error($kon));
                            $data1 = mysqli_fetch_assoc($query1);

                        ?>
                            <tr>
                                <td>
                                    <center><?php echo $no ?></center>
                                </td>
                                <td><?php echo $data['nama'] ?></td>
                                <td>
                                    <center><?php echo $data['tgl'] ?></center>
                                </td>
                                <td>
                                    <center><?php echo $data1['nama_p'] ?></center>
                                </td>
                                <td>
                                    <center><?php echo $data1['proses'] ?>%</center>
                                </td>
                                <td>
                                    <center>
                                        <a data-toggle="tooltip" data-placement="top" title="Edit Data" style="margin-right:5px" class="btn btn-primary btn-sm" href="?p=detail&id=<?php echo $data['id_pasien']; ?>">
                                            Detail
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