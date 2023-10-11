<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

function pesan($alert)
{ ?>
    <div class="col-md-12">
        <?php
        if (empty($_GET['alert'])) {
            echo "";
        } elseif ($_GET['alert'] == 1) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat</strong> Data Berhasil Ditambah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } elseif ($_GET['alert'] == 2) { ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Selamat</strong> Data Berhasil Diubah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } elseif ($_GET['alert'] == 3) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Selamat</strong> Data Berhasil Dihapus
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
    </div>
<?php } ?>