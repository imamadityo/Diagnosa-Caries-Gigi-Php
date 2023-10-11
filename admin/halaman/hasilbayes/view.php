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
                            <th>Tanggal</th>
                            <th>Caries Superficialis</th>
                            <th>Caries Madian</th>
                            <th>Caries Profunda</th>
                            <th>Caries Pulpilis</th>
                            <th>Caries Mati</th>
                            <th>Gingivitis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <style>
                            .highest {
                                background-color: yellow;
                            }
                        </style>

                        <?php
                        $no = 1;
                        $query = mysqli_query($kon, "SELECT * FROM pasien ORDER BY tgl ASC ")
                            or die('Ada kesalahan pada query tampil Data barang: ' . mysqli_error($kon));
                        while ($data = mysqli_fetch_assoc($query)) {
                            $query1 = mysqli_query($kon, "SELECT * FROM hasil INNER JOIN penyakit ON
                            hasil.idp = penyakit.idp WHERE id_pasien = '$data[id_pasien]'")
                                or die('Ada kesalahan pada query tampil Data barang: ' . mysqli_error($kon));
                            $data1 = mysqli_fetch_assoc($query1);
                            $data2 = mysqli_fetch_assoc($query1);
                            $data3 = mysqli_fetch_assoc($query1);
                            $data4 = mysqli_fetch_assoc($query1);
                            $data5 = mysqli_fetch_assoc($query1);
                            $data6 = mysqli_fetch_assoc($query1);

                            // Find the highest value among $data1 to $data6
                            $highestValue = max($data1['proses'], $data2['proses'], $data3['proses'], $data4['proses'], $data5['proses'], $data6['proses']);

                        ?>
                            <tr>
                                <td>
                                    <center><?php echo $no ?></center>
                                </td>
                                <td><?php echo $data['nama'] ?></td>
                                <td>
                                    <center><?php echo $data['tgl'] ?></center>
                                </td>
                                <td <?php if ($data1['proses'] == $highestValue) echo 'class="highest"'; ?>>
                                    <center><?php echo round($data1['proses'], 0) ?>%</center>
                                </td>
                                <td <?php if ($data2['proses'] == $highestValue) echo 'class="highest"'; ?>>
                                    <center><?php echo round($data2['proses'], 0) ?>%</center>
                                </td>
                                <td <?php if ($data3['proses'] == $highestValue) echo 'class="highest"'; ?>>
                                    <center><?php echo round($data3['proses'], 0) ?>%</center>
                                </td>
                                <td <?php if ($data4['proses'] == $highestValue) echo 'class="highest"'; ?>>
                                    <center><?php echo round($data4['proses'], 0) ?>%</center>
                                </td>
                                <td <?php if ($data5['proses'] == $highestValue) echo 'class="highest"'; ?>>
                                    <center><?php echo round($data5['proses'], 0) ?>%</center>
                                </td>
                                <td <?php if ($data6['proses'] == $highestValue) echo 'class="highest"'; ?>>
                                    <center><?php echo round($data6['proses'], 0) ?>%</center>
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