<?php
session_start();
include "../../../db/koneksi.php";
$sqla = mysqli_query($kon, "SELECT * from admin where username='$_SESSION[useradm]' and password='$_SESSION[passadm]'");
$ra = mysqli_fetch_array($sqla);

if ($_GET['proses'] == 'tambah') {
    if (isset($_POST['simpan'])) {
        $idp  = mysqli_real_escape_string($kon, trim($_POST['idp']));
        $idg  = mysqli_real_escape_string($kon, trim($_POST['idg']));
        $bg_penyakit  = mysqli_real_escape_string($kon, trim($_POST['bg_penyakit']));
        $idadmin = $ra['idadmin'];

        $query1 = mysqli_query($kon, "SELECT * FROM penyakit where kode_p = '$_POST[idp]'");
        $data1 = mysqli_fetch_assoc($query1);

        $nilai = $_POST['bg_penyakit'] / $data1['bp_penyakit'];
        $query = mysqli_query($kon, "INSERT INTO nilai_probabilitas  (idadmin,idp, idg,bg_penyakit, nilai) VALUES('$idadmin','$idp','$idg','$bg_penyakit','$nilai')")
            or die('Ada kesalahan pada query update : ' . mysqli_error($kon));
        if ($query) {
            header("location: ../../index.php?p=nilai_p&alert=1");
        }
    }
} elseif ($_GET['proses'] == 'edit') {
    if (isset($_POST['simpan'])) {
        if (isset($_POST['id_pro'])) {
            $id_pro  = mysqli_real_escape_string($kon, trim($_POST['id_pro']));
            $idp  = mysqli_real_escape_string($kon, trim($_POST['idp']));
            $idg  = mysqli_real_escape_string($kon, trim($_POST['idg']));
            $bg_penyakit  = mysqli_real_escape_string($kon, trim($_POST['bg_penyakit']));
            $idadmin = $ra['idadmin'];

            $query1 = mysqli_query($kon, "SELECT * FROM penyakit where kode_p = '$_POST[idp]'");
            $data1 = mysqli_fetch_assoc($query1);
            $nilai = $_POST['bg_penyakit'] / $data1['bp_penyakit'];
            $query = mysqli_query($kon, "UPDATE nilai_probabilitas SET 
                                                                idp = '$idp',
                                                                idg = '$idg',
                                                                bg_penyakit = '$bg_penyakit',
                                                                nilai = '$nilai'
                                                                WHERE id_pro  = '$id_pro'")
                or die('Ada kesalahan pada query update : ' . mysqli_error($kon));
            if ($query) {
                header("location: ../../index.php?p=nilai_p&alert=2");
            }
        }
    }
} elseif ($_GET['proses'] == 'hapus') {
    if (isset($_GET['id'])) {
        $id_pro = $_GET['id'];

        $query = mysqli_query($kon, "DELETE FROM nilai_probabilitas WHERE id_pro='$id_pro'")
            or die('Ada kesalahan pada query delete : ' . mysqli_error($kon));
        $data = mysqli_fetch_assoc($query);

        if ($query) {
            header("location: ../../index.php?p=nilai_p&alert=3");
        }
    }
}
