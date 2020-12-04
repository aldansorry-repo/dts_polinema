<?php include "system/connection.php" ?>
<?php include "includes/header.php" ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card border-success">
                    <div class="card-body">
                        <h4 class="card-title">Pendaftaran baru</h4>
                        <p>
                            Untuk siswa baru diharapkan untuk mengisi biodatanya pada form pendaftaran
                        </p>
                        <a href="<?php echo base_url(); ?>pages/siswa/tambah.php" class="btn btn-sm btn-success">Form Pendaftaran</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-primary">
                    <div class="card-body">
                        <h4 class="card-title">Lihat Pendaftar</h4>
                        <p>
                            Untuk melihat jumlah pendaftar pada sekolah musik sampai dengan bulan ini
                        </p>
                        <a href="<?php echo base_url(); ?>pages/siswa/index.php" class="btn btn-sm btn-primary">Lihat Pendaftar</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
    </div>

    <?php include "includes/footer.php" ?>