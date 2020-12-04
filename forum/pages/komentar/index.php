<div class="row">

    <div class="col-md-12">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                <?php
                $query = "select komentar.*,user.nama,user.email,user.alamat from komentar join user on komentar.fk_user=user.id order by tanggal desc";
                $sql = mysqli_query($conn, $query);
                $tab_number = 1;
                $i = 1;
                while ($hasil = mysqli_fetch_array($sql)) {
                    $id = $hasil['id'];
                    $tanggal = $hasil['tanggal'];
                    $nama = stripslashes($hasil['nama']);
                    $email = stripslashes($hasil['email']);
                    $isi = stripslashes($hasil['isi']);

                    ?>
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-muted float-right">Tanggal : <?php echo $tanggal ?></h6>
                            <h4><?php echo $nama ?></h4>

                            <p>
                                <?php echo $isi ?>
                            </p>
                            <button onclick="window.location.href='index.php?pages=komentar/update&id=<?php echo $id ?>'" class="role member float-right">Edit Data</button>

                        </div>
                    </div>

                    <?php
                        if ($i % 5 == 0) {
                            ?>
            </div>
            <div class="tab-pane fade" id="pills-tab-<?php echo $tab_number ?>" role="tabpanel" aria-labelledby="pills-profile-tab">
        <?php
                $tab_number++;
            }
            $i++;
        }
        ?>
            </div>
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
<?php 
include "pages/komentar/input.php";
?>