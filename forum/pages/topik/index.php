<?php

$id = $_GET['topik'];
$query = "select *,(select nama from kategori where id=topik.fk_kategori) as kategori,(select nama from user where id=topik.fk_user) as nama_user from topik where id='$id'";
$sql = mysqli_query($conn, $query);

$hasil = mysqli_fetch_array($sql);
if (isset($_POST['komentar'])) {
    $isi = $_POST['isi'];
    $id_user = $_SESSION['id'];
    $query = "insert into komentar (fk_topik,fk_user,tanggal,isi) values ($id,$id_user,NOW(),'$isi')";
    $sql = mysqli_query($conn, $query);
}
?>
<div class="row">
    <div class="col-lg-12">
        <div class="recent-report3 m-b-40">
            <h5 class="float-right text-muted">Tanggal : <?php echo $hasil['tanggal'] ?></h5>
            <div class="title-wrap">
                <h3 class="title-3"><?php echo $hasil['judul'] ?></h3>
            </div>

            <span class="badge badge-primary"><?php echo $hasil['kategori'] ?></span>


            <p>by <?php echo $hasil['nama_user'] ?></p>

            <div class="au-task-list js-scrollbar2" style="margin-top:50px;">
                <?php
                $query = "select komentar.*,user.nama,user.email,user.alamat from komentar join user on komentar.fk_user=user.id where fk_topik='$id' order by tanggal asc";
                $sql = mysqli_query($conn, $query);
                $tab_number = 1;
                $i = 1;
                while ($hasil = mysqli_fetch_array($sql)) {
                    $i++;
                    $id = $hasil['id'];
                    $tanggal = $hasil['tanggal'];
                    $nama = stripslashes($hasil['nama']);
                    $email = stripslashes($hasil['email']);
                    $isi = stripslashes($hasil['isi']);
                    switch ($i % 4) {
                        case 0:
                            $class = "danger";
                            break;
                        case 1:
                            $class = "warning";
                            break;
                        case 2:
                            $class = "primary";
                            break;
                        case 3:
                            $class = "success";
                            break;
                    }
                    ?>
                        <div class="au-task__item au-task__item--<?php echo $class ?>">
                            <div class="au-task__item-inner">
                                <h5 class="task">
                                    <a href="#"><?php echo $isi ?></a>
                                </h5>
                                <p>by <?php echo $nama ?></p>
                                <span class="time">at <?php echo $tanggal ?></span>
                                <button onclick="window.location.href='index.php?pages=komentar/update&id=<?php echo $id ?>'" class="role member float-right">Edit Data</button>
                            </div>
                        </div>
                    <?php } ?>
            </div>
            <h4 class="mb-3 mt-5">Tambah Komentar</h4>
            <form action="" method="post">

                <textarea name="isi" id="" cols="10" rows="5" class="form-control"></textarea>
                <input type="submit" name="komentar" class="btn btn-primary mt-2" value="Komen">
            </form>
        </div>
    </div>
</div>
<?php if (isset($_GET['view'])) : ?>
    <?php include "pages/topik/" . $_GET['view'] . ".php"; ?>
<?php else : ?>

    <?php include "pages/topik/input.php"; ?>
<?php endif ?>