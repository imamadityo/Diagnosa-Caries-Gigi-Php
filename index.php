<?php
session_start();
include "db/koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Sistem_Pakar</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Articles-Cards.css">
    <link rel="stylesheet" href="assets/css/dh-row-text-image-right-responsive.css">
    <link rel="stylesheet" href="assets/css/Features-Centered-Icons.css">
    <link rel="stylesheet" href="assets/css/gradient-navbar-1.css">
    <link rel="stylesheet" href="assets/css/gradient-navbar.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="icon" href="assets/images/fevicon.png" type="image/gif" />
    <link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

</head>

<body>
    <?php include "navbar.php";
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    if ($_GET["p"] == "diagnosa") {
        include "diagnosa.php";
    } elseif ($_GET["p"] == "proses") {
        include "proses.php";
    } elseif ($_GET["p"] == "informasi") {
        include "informasi.php";
    } elseif ($_GET["p"] == "help") {
        include "help.php";
    } elseif ($_GET["p"] == "detail") {
        include "detail.php";
    } elseif ($_GET["p"] == "dokter") {
        include "dokter.php";
    } elseif ($_GET["p"] == "developer") {
        include "developer.php";
    } elseif ($_GET["p"] == "about") {
        include "about.php";
    } elseif ($_GET["p"] == "dokterinfo") {
        include "dokterinfo.php";
    } else {
        include "home.php";
    }
    ?>
    <!-- copyright section start -->
    <div class="copyright_section">
        <div class="container">
            <p class="copyright">2023 Sistem Pakar by Imam Adityo</p>
        </div>
    </div>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery-3.0.0.min.js"></script>
    <script src="assets/js/plugin.js"></script>
    <!-- sidebar -->
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- javascript -->
    <script src="assets/js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>


</html>