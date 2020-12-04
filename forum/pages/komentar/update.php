<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die("Error. No Id Selected!");
}

$query = "select * from komentar where id='$id'";
$sql = mysqli_query($conn, $query);

$hasil = mysqli_fetch_array($sql);

$id = $hasil['id'];
$fk_user = $hasil['fk_user'];
$isi = stripslashes($hasil['isi']);



$isi_error = "";
if (isset($_POST['edit'])) {

    $isi = $_POST['isi'];




    if ($isi == "") {
        $isi_error .= "Isi Harus Diisi |";
    }

    $isi_error = substr($isi_error, 0, -1);

    if ($isi_error == "") {
        $fk_user = $_POST['fk_user'];
        $isi = addslashes(strip_tags($_POST['isi']));

        $query = "update komentar set fk_user='$fk_user',isi='$isi' where id='$id'";
        $sql = mysqli_query($conn, $query);

        if ($sql) {
            $success_message = "Komentar telah berhasil diubah";
        } else {
            $error_message = "Komentar telah gagal diubah";
        }
    }
}
?>
<div class="row">
            <div class="col-md-12">
                <?php if (isset($success_message)) : ?>
                    <div class="alert alert-success">
                        <?php echo $success_message ?>
                    </div>
                <?php endif ?>
                <?php if (isset($error_message)) : ?>
                    <div class="alert alert-danger">
                        <?php echo $error_message ?>
                    </div>
                <?php endif ?>
                <form action="" method="POST" name="input">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <select name="fk_user" class="form-control">
                            <?php
                            $query = "select * from user";
                            $sql = mysqli_query($conn, $query);

                            while ($hasil = mysqli_fetch_array($sql)) {
                                echo '<option value="' . $hasil['id'] . '">' . $hasil['nama'] . '</option>';
                            }
                            ?>
                        </select>
                        <script>$('[name="fk_user"]').val("<?php echo $fk_user ?>")</script>
                    </div>
                    <div class="form-group">
                        <label for="">Isi</label>
                        <textarea type="text" name="isi" class="form-control" cols="50" rows="10"><?php echo $isi ?></textarea>
                        <?php echo $isi_error; ?>
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="submit" name="edit" class="btn btn-success" value="Edit Buku Tamu">
                        <input type="reset" name="reset" class="btn btn-outline-secondary" value="Cancel">
                        <a href="index.php?pages=komentar/index" class="btn btn-secondary">Back</a>
                        <a href="index.php?pages=komentar/delete&id=<?php echo $id ?>" class="btn btn-danger float-right">Hapus Buku Tamu</a>
                    </div>

                    <p>
                    </p>
                </form>
            </div>
        </div>