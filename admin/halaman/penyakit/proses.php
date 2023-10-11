<?php
session_start();
include "../../../db/koneksi.php";
$sqla = mysqli_query($kon, "SELECT * from admin where username='$_SESSION[useradm]' and password='$_SESSION[passadm]'");
$ra = mysqli_fetch_array($sqla);

if ($_GET['proses'] == 'tambah') {
    if (isset($_POST['simpan'])) {
        $kode_p  = mysqli_real_escape_string($kon, trim($_POST['kode_p']));
        $nama_p  = mysqli_real_escape_string($kon, trim($_POST['nama_p']));
        $bp_penyakit = mysqli_real_escape_string($kon, trim($_POST['bp_penyakit']));
        $bp_solusi = mysqli_real_escape_string($kon, trim($_POST['bp_solusi']));
        $idadmin = $ra['idadmin'];

        $penyakit = mysqli_query($kon, "SELECT * from banyak where idadmin='$idadmin'");
        $banyak = mysqli_fetch_array($penyakit);
        $probabilitas = $bp_penyakit / $banyak['banyak'];

        $query = mysqli_query($kon, "INSERT INTO penyakit  (idadmin,kode_p, nama_p, bp_penyakit, bp_solusi, nilai_p) VALUES('$idadmin','$kode_p','$nama_p','$bp_penyakit','$bp_solusi','$probabilitas')")
            or die('Ada kesalahan pada query update : ' . mysqli_error($kon));
        if ($query) {
            header("location: ../../index.php?p=penyakit");
        }
    }
} elseif ($_GET['proses'] == 'edit') {
    if (isset($_POST['simpan'])) {
        if (isset($_POST['idp'])) {
            $idp  = mysqli_real_escape_string($kon, trim($_POST['idp']));
            $nama_p  = mysqli_real_escape_string($kon, trim($_POST['nama_p']));
            $bp_penyakit = mysqli_real_escape_string($kon, trim($_POST['bp_penyakit']));
            $bp_solusi = mysqli_real_escape_string($kon, trim($_POST['bp_solusi']));
            $idadmin = $ra['idadmin'];

            $penyakit = mysqli_query($kon, "SELECT * from banyak where idadmin='$idadmin'");
            $banyak = mysqli_fetch_array($penyakit);
            $probabilitas = $bp_penyakit / $banyak['banyak'];

            $query = mysqli_query($kon, "UPDATE penyakit SET 
                                                                nama_p = '$nama_p',
                                                                bp_penyakit= '$bp_penyakit',
                                                                bp_solusi= '$bp_solusi',
                                                                nilai_p= '$probabilitas'
                                                                WHERE idp  = '$idp'")
                or die('Ada kesalahan pada query update : ' . mysqli_error($kon));
            if ($query) {
                header("location: ../../index.php?p=penyakit");
            }
        }
    }
} elseif ($_GET['proses'] == 'hapus') {
    if (isset($_GET['id'])) {
        $idp = $_GET['id'];

        $query = mysqli_query($kon, "DELETE FROM penyakit WHERE idp='$idp'")
            or die('Ada kesalahan pada query delete : ' . mysqli_error($kon));
        $data = mysqli_fetch_assoc($query);

        if ($query) {
            header("location: ../../index.php?p=penyakit");
        }
    }
}
