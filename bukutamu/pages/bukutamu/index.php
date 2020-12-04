<section class="au-breadcrumb2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="au-breadcrumb-content">
                    <div class="au-breadcrumb-left">
                        <span class="au-breadcrumb-span">You are here:</span>
                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                            <li class="list-inline-item active">
                                <a href="index.php?pages=bukutamu/index">Bukutamu</a>
                            </li>
                            <li class="list-inline-item seprate">
                                <span>/</span>
                            </li>
                            <li class="list-inline-item">Daftar</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="welcome p-t-10">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="index.php?pages=bukutamu/input" class="btn btn-primary float-right">Tambah</a>
                <h1 class="title-4">Daftar Buku Tamu
                </h1>
                <hr class="line-seprate">
            </div>
        </div>
    </div>
</section>
<section class="welcome p-t-10">
    <div class="container">
        <div class="row">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                    <?php
                    $query = "select * from bukutamu order by tanggal desc";
                    $sql = mysqli_query($conn, $query);
                    $tab_number = 1;
                    $i = 1;
                    while ($hasil = mysqli_fetch_array($sql)) {
                        $idbukutamu = $hasil['idbukutamu'];
                        $tanggal = $hasil['tanggal'];
                        $nama = stripslashes($hasil['nama']);
                        $email = stripslashes($hasil['email']);
                        $isi = stripslashes($hasil['isi']);

                        ?>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="text-muted float-right">Tanggal : <?php echo $tanggal ?></h6>
                                    <h4><?php echo $nama ?></h4>

                                    <p>
                                        <?php echo $isi ?>
                                    </p>
                                    <button onclick="window.location.href='index.php?pages=bukutamu/update&idbukutamu=<?php echo $idbukutamu ?>'" class="role member float-right">Edit Data</button>

                                </div>
                            </div>
                        </div>
                        <?php
                            if ($i % 5 == 0) {
                                ?>
                </div>
                <div class="tab-pane fade" id="pills-tab-<?php echo $tab_number ?>" role="tabpanel" aria-labelledby="pills-profile-tab">
            <?php
            $tab_number ++;
                }
                $i++;
            }
            ?>
                </div>
            </div>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                </li>
                <?php
                for ($i = 1; $i < $tab_number; $i++) {

                    ?>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-tab-<?php echo $i ?>" role="tab" aria-controls="pills-profile" aria-selected="false">Tab <?php echo $i ?></a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</section>