<?php

$judul = "";
$fk_kategori = "";
$judul_error = "";
$fk_kategori_error = "";
if (isset($_POST['input'])) {
    $judul = $_POST['judul'];
    $fk_kategori = $_POST['fk_kategori'];

    if($judul == ""){
        $judul_error .= " judul Harus Diisi |";
    }

    if($fk_kategori == ""){
        $fk_kategori_error .= " fk_kategori Harus Diisi |";
    }

    $judul_error = substr($judul_error,0,-1);
    $fk_kategori_error = substr($fk_kategori_error,0,-1);

    if($judul_error == "" && $fk_kategori_error == ""){
        $judul = addslashes(strip_tags($_POST['judul']));
        $fk_kategori = addslashes(strip_tags($_POST['fk_kategori']));
        $fk_user = $_SESSION['id'];
        $query = "Insert into topik (tanggal,judul,fk_kategori,fk_user) values (NOW(),'$judul','$fk_kategori','$fk_user')";
        $sql = mysqli_query($conn, $query);
    
        if ($sql) {
            $success_message = "Topik telah berhasil ditambahkan";
            $id_topik = mysqli_insert_id($conn);
            echo "<script>window.location.href='index.php?topik=".$id_topik."'</script>";
        } else {
            $error_message = "Topik telah gagal ditambahkan";
        }
    }
}
?>

<div class="row">
    <div class="col-lg-12">
        <div class="recent-report3 m-b-40">
            <div class="title-wrap">
                <h3 class="title-3">Tambah Topik</h3>
            </div>
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
                        <label for="">judul</label>
                        <input type="text" name="judul" class="form-control" placeholder="Input judul" value="<?php echo $judul ?>">
                        <?php echo $judul_error; ?>
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                       <select name="fk_kategori" id="" class="form-control">
                       <?php 
                        $query = "select * from kategori";
                        $sql = mysqli_query($conn,$query);
                        while($hasil = mysqli_fetch_assoc($sql)){
                            echo '<option value="'.$hasil['id'].'">'.$hasil['nama'].'</option>';
                        }
                        ?>
                       </select>
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="submit" name="input" class="btn btn-primary" value="Input Buku Tamu">
                        <input type="reset" name="reset" class="btn btn-outline-secondary" value="Cancel">
                        
                        <a href="index.php?pages=bukutamu/index" class="btn btn-secondary">Back</a>
                    </div>

                    <p>
                    </p>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>