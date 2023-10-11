<?php
session_start();
include "../../../db/koneksi.php";
    if ($_GET['proses'] == 'edit') {
        if (isset($_POST['simpan'])) {    
                $banyak  = mysqli_real_escape_string($kon, trim($_POST['banyak']));
                $query = mysqli_query($kon, "UPDATE banyak SET   banyak = '$banyak'
                                                                 WHERE idadmin  = '1'")
                    or die('Ada kesalahan pada query update : ' . mysqli_error($kon));
                if ($query) {
                    header("location: ../../index.php?p=banyak");
                }
             }   
            
        }

?>