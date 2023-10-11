<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <?php
                            if (empty($_GET['alert'])) {
                                echo "";
                            } elseif ($_GET['alert'] == 1) { ?>
                                <div class="alert alert-danger beautiful" role="alert"><Strong>
                                        <i class="fa fa-exclamation-triangle"></i></Strong> Username dan Password Salah
                                </div>
                            <?php } elseif ($_GET['alert'] == 2) { ?>
                                <div class="alert alert-success beautiful" role="alert"><Strong>
                                        <i class="fa fa-check-circle"></i></Strong> Anda Berhasil Keluar
                                </div>
                            <?php } elseif ($_GET['alert'] == 3) { ?>
                                <div class="alert alert-success beautiful" role="alert"><Strong>
                                        <i class="fa fa-check-circle"></i></Strong> Anda Belum Melakukan Login Ke Dalam System
                                </div>
                            <?php } ?>
                            <h4>Welcome back Administrator!</h4>
                            <form class="user" method="post" action="">
                                <div class="form-group">
                                    <label for="exampleInputEmail">Username</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-user" name="username" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="my-3">
                                    <button class="btn btn-primary btn-user btn-block" name="login" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 login-half-bg d-flex flex-row">
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2023 Imam Adityo.</p>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="../../vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <!-- endinject -->
</body>

<?php
if (isset($_POST["login"])) {

    $sqla = mysqli_query($kon, "SELECT * from admin where username='$_POST[username]' and password='$_POST[password]'");
    $ra = mysqli_fetch_array($sqla);
    $row = mysqli_num_rows($sqla);
    if ($row > 0) {
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        session_start();
        $_SESSION["useradm"] = $ra["username"];
        $_SESSION["passadm"] = $ra["password"];

        echo "<script>alert('Behasil Login');</script>";
    } else {
        echo "<META HTTP-EQUIV='Refresh' Content='0; URL=index.php?alert=1'>";
    }
    echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?p=home'>";
}
?>