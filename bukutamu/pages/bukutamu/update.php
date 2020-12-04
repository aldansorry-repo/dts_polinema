<?php

if (isset($_GET['idbukutamu'])) {
    $idbukutamu = $_GET['idbukutamu'];
} else {
    die("Error. No Id Selected!");
}

$query = "select * from bukutamu where idbukutamu='$idbukutamu'";
$sql = mysqli_query($conn, $query);

$hasil = mysqli_fetch_array($sql);

$idbukutamu = $hasil['idbukutamu'];
$nama = stripslashes($hasil['nama']);
$email = stripslashes($hasil['email']);
$isi = stripslashes($hasil['isi']);



$nama_error = "";
$email_error = "";
$isi_error = "";
if (isset($_POST['edit'])) {

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $isi = $_POST['isi'];



    if ($nama == "") {
        $nama_error .= "Nama Harus Diisi |";
    }

    if ($email == "") {
        $email_error .= "Email Harus Diisi |";
    }

    if ($isi == "") {
        $isi_error .= "Isi Harus Diisi |";
    }

    if(ctype_alpha(str_replace(' ', '', $nama)) === false){
        $nama_error .= " Nama Harus diisi huruf dan spasi  |";
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_error .= "Email Tidak Valid |";
    }

    $nama_error = substr($nama_error, 0, -1);
    $email_error = substr($email_error, 0, -1);
    $isi_error = substr($isi_error, 0, -1);

    if ($nama_error == "" && $email_error == "" && $isi_error == "") {
        $nama = addslashes(strip_tags($_POST['nama']));
        $email = addslashes(strip_tags($_POST['email']));
        $isi = addslashes(strip_tags($_POST['isi']));

        $query = "update bukutamu set nama='$nama',email='$email',isi='$isi' where idbukutamu='$idbukutamu'";
        $sql = mysqli_query($conn, $query);

        if ($sql) {
            $success_message = "Buku tamu telah berhasil diubah";
        } else {
            $error_message = "Buku tamu telah gagal diubah";
        }
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
                            <li class="list-inline-item">Edit</li>
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
                <h1 class="title-4">Edit Buku Tamu
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
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Input Nama" value="<?php echo $nama ?>">
                        <?php echo $nama_error; ?>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Input Email" value="<?php echo $email ?>">
                        <?php echo $email_error; ?>
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
                        <a href="index.php?pages=bukutamu/index" class="btn btn-secondary">Back</a>
                        <a href="index.php?pages=bukutamu/delete&idbukutamu=<?php echo $idbukutamu ?>" class="btn btn-danger float-right">Hapus Buku Tamu</a>
                    </div>

                    <p>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>