<?php
$sqla = mysqli_query($kon, "SELECT * from admin where username='$_SESSION[useradm]' and password='$_SESSION[passadm]'");
$ra = mysqli_fetch_array($sqla);
?>
<?php
if ($_GET["p"] == "penyakit") {
    include "halaman/penyakit/view.php";
} else if ($_GET["p"] == "penyakit_form") {
    include "halaman/penyakit/form.php";
} elseif ($_GET["p"] == "gejala") {
    include "halaman/gejala/view.php";
} else if ($_GET["p"] == "gejala_form") {
    include "halaman/gejala/form.php";
} elseif ($_GET["p"] == "nilai_p") {
    include "halaman/nilai/view.php";
} else if ($_GET["p"] == "nilai_p_form") {
    include "halaman/nilai/form.php";
} elseif ($_GET["p"] == "pasien") {
    include "halaman/pasien/view.php";
} elseif ($_GET["p"] == "detail") {
    include "halaman/pasien/detail.php";
} elseif ($_GET["p"] == "help") {
    include "halaman/help/view.php";
} elseif ($_GET["p"] == "banyak") {
    include "halaman/banyak/view.php";
} elseif ($_GET["p"] == "hasilbayes") {
    include "halaman/hasilbayes/view.php";
} else {
    include "halaman/home/view.php";
}
?>