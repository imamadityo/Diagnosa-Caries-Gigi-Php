<?php
session_start();
include "../../../db/koneksi.php";
    if ($_GET['proses'] == 'edit') {
        if (isset($_POST['simpan'])) {    
                $detail = nl2br($_POST['help']);
                $query = mysqli_query($kon, "UPDATE help SET   help = '$detail'
                                                                 WHERE idadmin  = '1'")
                    or die('Ada kesalahan pada query update : ' . mysqli_error($kon));
                if ($query) {
                    header("location: ../../index.php?p=help");
                }
             }   
            
        }

?>