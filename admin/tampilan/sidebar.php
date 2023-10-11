<?php
$sqla = mysqli_query($kon, "SELECT * from admin where username='$_SESSION[useradm]' and password='$_SESSION[passadm]'");
$ra = mysqli_fetch_array($sqla);
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="user-profile">
        <div class="user-image">
            <img src="assets/images/avatar.png">
        </div>
        <div class="user-name">
            <b style="color: white;">Welcome : <?php echo $ra['namalengkap'] ?></b>
        </div>
    </div>
    <ul class="nav">
        <!-- Dashboard -->
        <?php if ($_GET["p"] == "home") { ?>
            <li class="nav-item active">
                <a class="nav-link" href="?p=home">
                    <i class="icon-box menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
        <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link" href="?p=home">
                    <i class="icon-box menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
        <?php } ?>
        <!-- Banyak Pasien -->
        <?php if ($_GET["p"] == "banyak") { ?>
            <li class="nav-item active">
                <a class="nav-link" href="?p=banyak">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">Banyak Pasien</span>
                </a>
            </li>
        <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link" href="?p=banyak">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">Banyak Pasien</span>
                </a>
            </li>
        <?php } ?>
        <!-- Data Penyakit -->
        <?php if ($_GET["p"] == "penyakit" || $_GET["p"] == "penyakit_form") { ?>
            <li class="nav-item active">
                <a class="nav-link" href="?p=penyakit">
                    <i class="icon-file menu-icon"></i>
                    <span class="menu-title">Data Penyakit</span>
                </a>
            </li>
        <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link" href="?p=penyakit">
                    <i class="icon-file menu-icon"></i>
                    <span class="menu-title">Data Penyakit</span>
                </a>
            </li>
        <?php } ?>
        <!-- Data Gejala -->
        <?php if ($_GET["p"] == "gejala" || $_GET["p"] == "gejala_form") { ?>
            <li class="nav-item active">
                <a class="nav-link" href="?p=gejala">
                    <i class="icon-pie-graph menu-icon"></i>
                    <span class="menu-title">Data Gejala</span>
                </a>
            </li>
        <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link" href="?p=gejala">
                    <i class="icon-pie-graph menu-icon"></i>
                    <span class="menu-title">Data Gejala</span>
                </a>
            </li>
        <?php } ?>
        <!-- Data Nilai Probabilitas -->
        <?php if ($_GET["p"] == "nilai_p" || $_GET["p"] == "nilai_p_form") { ?>
            <li class="nav-item active">
                <a class="nav-link" href="?p=nilai_p">
                    <i class="icon-command menu-icon"></i>
                    <span class="menu-title">Nilai Probabilitas</span>
                </a>
            </li>
        <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link" href="?p=nilai_p">
                    <i class="icon-command menu-icon"></i>
                    <span class="menu-title">Nilai Probabilitas</span>
                </a>
            </li>
        <?php } ?>
        <!-- Data Pasien -->
        <?php if ($_GET["p"] == "pasien" || $_GET["p"] == "detail") { ?>
            <li class="nav-item active">
                <a class="nav-link" href="?p=pasien">
                    <i class="icon-help menu-icon"></i>
                    <span class="menu-title">Data Pasien</span>
                </a>
            </li>
        <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link" href="?p=pasien">
                    <i class="icon-help menu-icon"></i>
                    <span class="menu-title">Data Pasien</span>
                </a>
            </li>
        <?php } ?>
        <!-- Data Pasien -->
        <?php if ($_GET["p"] == "hasilbayes" || $_GET["p"] == "detail") { ?>
            <li class="nav-item active">
                <a class="nav-link" href="?p=hasilbayes">
                    <i class="icon-help menu-icon"></i>
                    <span class="menu-title">Data Hasil</span>
                </a>
            </li>
        <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link" href="?p=hasilbayes">
                    <i class="icon-help menu-icon"></i>
                    <span class="menu-title">Data Hasil</span>
                </a>
            </li>
        <?php } ?>
    </ul>

</nav>