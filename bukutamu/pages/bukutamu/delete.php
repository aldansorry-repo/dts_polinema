<?php

if (isset($_GET['idbukutamu'])) {
    $idbukutamu = $_GET['idbukutamu'];
} else {
    $error_message = "No Selected ID";
}

if (isset($_POST['delete']) && isset($_GET['idbukutamu'])) {
    $query = "Delete from bukutamu where idbukutamu='$idbukutamu'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        $success_message = "Buku Tamu telah berhasil dihapus";
    } else {
        $error_message = "Buku Tamu gagal dihapus";
    }
}
?>




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
                            <li class="list-inline-item">Delete</li>
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
                <h1 class="title-4">Hapus Buku Tamu
                </h1>
                <hr class="line-seprate">
            </div>
        </div>
    </div>
</section>
<section class="welcome p-t-10">
    <div class="container">
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
                            <a href="index.php?pages=bukutamu/index" class="btn btn-outline-secondary">Back</a>
                        <?php else : ?>
                            <a href="index.php?pages=bukutamu/update&idbukutamu=<?php echo $idbukutamu ?>" class="btn btn-outline-secondary">Back</a>
                        <?php endif ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>