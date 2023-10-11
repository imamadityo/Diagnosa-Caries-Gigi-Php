<?php
session_start();
include "../../../db/koneksi.php";
$sqla = mysqli_query($kon, "SELECT * from admin where username='$_SESSION[useradm]' and password='$_SESSION[passadm]'");
$ra = mysqli_fetch_array($sqla);

if ($_GET['proses'] == 'tambah') {
    if (isset($_POST['simpan'])) {
        $kode_g  = mysqli_real_escape_string($kon, trim($_POST['kode_g']));
        $nama_g  = mysqli_real_escape_string($kon, trim($_POST['nama_g']));
        $idadmin = $ra['idadmin'];

        $query = mysqli_query($kon, "INSERT INTO gejala  (idadmin,kode_g, nama_g) VALUES('$idadmin','$kode_g','$nama_g')")
            or die('Ada kesalahan pada query update : ' . mysqli_error($kon));
        if ($query) {
            header("location: ../../index.php?p=gejala&alert=1");
        }
    }
} elseif ($_GET['proses'] == 'edit') {
    if (isset($_POST['simpan'])) {
        if (isset($_POST['idg'])) {
            $idg  = mysqli_real_escape_string($kon, trim($_POST['idg']));
            $nama_g  = mysqli_real_escape_string($kon, trim($_POST['nama_g']));
            $idadmin = $ra['idadmin'];

            $query = mysqli_query($kon, "UPDATE gejala SET 
                                                                nama_g = '$nama_g'
                                                                WHERE idg  = '$idg'")
                or die('Ada kesalahan pada query update : ' . mysqli_error($kon));
            if ($query) {
                header("location: ../../index.php?p=gejala&alert=2");
            }
        }
    }
} elseif ($_GET['proses'] == 'hapus') {
    if (isset($_GET['id'])) {
        $idg = $_GET['id'];

        $query = mysqli_query($kon, "DELETE FROM gejala WHERE idg='$idg'")
            or die('Ada kesalahan pada query delete : ' . mysqli_error($kon));
        $data = mysqli_fetch_assoc($query);

        if ($query) {
            header("location: ../../index.php?p=gejala&alert=3");
        }
    }
}
