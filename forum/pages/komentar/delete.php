<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $error_message = "No Selected ID";
}

if (isset($_POST['delete']) && isset($_GET['id'])) {
    $query = "Delete from komentar where id='$id'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        $success_message = "Komentar telah berhasil dihapus";
    } else {
        $error_message = "Komentar gagal dihapus";
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
                        <label for=""></label>
                        <input type="submit" name="delete" class="btn btn-danger" value="Hapus Buku Tamu">
                        <?php if (isset($success_message)) : ?>
                            <a href="index.php?pages=komentar/index" class="btn btn-outline-secondary">Back</a>
                        <?php else : ?>
                            <a href="index.php?pages=komentar/update&id=<?php echo $id ?>" class="btn btn-outline-secondary">Back</a>
                        <?php endif ?>
                    </div>
                </form>
            </div>
        </div>