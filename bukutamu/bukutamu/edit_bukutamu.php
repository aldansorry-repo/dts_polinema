<?php 
include "koneksi.php";

if(isset($_GET['idbukutamu'])){
    $idbukutamu = $_GET['idbukutamu'];
}else{
    die("Error. No Id Selected!");
}

$query = "select * from bukutamu where idbukutamu='$idbukutamu'";
$sql = mysqli_query($conn,$query);

$hasil = mysqli_fetch_array($sql);

$idbukutamu = $hasil['idbukutamu'];
$nama = stripslashes($hasil['nama']);
$email = stripslashes($hasil['email']);
$isi = stripslashes($hasil['isi']);


if(isset($_POST['edit'])){

    $idbukutamu = $_POST['idbukutamu'];
    $nama = addslashes(strip_tags($_POST['nama']));
    $email = addslashes(strip_tags($_POST['email']));
    $isi = addslashes(strip_tags($_POST['isi']));

    $query = "update bukutamu set nama='$nama',email='$email',isi='$isi' where idbukutamu='$idbukutamu'";
    $sql = mysqli_query($conn,$query);

    if($sql){
        echo "<h2><font color='blue'>Buku tamu telah berhasil ditambahkan</font></h2>";
    }else{
        echo "<h2><font color='red'>Buku tamu telah gagal ditambahkan</font></h2>";
    }
}
?>
<html>
    <head>
        <title>Edit Berita</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <a href="index.php">Halaman Depan</a>
        <a href="input_bukutamu.php">Edit Buku Tamu</a>
        <br>
        <br>

        <form action="" method="POST" name="edit">
            <h2>Input Buku Tamu</h2>
            <p>
                Nama<br>
                <input type="text" name="nama" size="30" value="<?php echo $nama ?>">
            </p>
            <p>
                Email<br>
                <input type="text" name="email" size="50" value="<?php echo $email ?>">
            </p>
            <p>
                Isi<br>
                <textarea name="isi" cols="50" rows="10"><?php echo $isi ?></textarea>
            </p>
            <p>
                <input type="hidden" name="idbukutamu" value="<?php echo $idbukutamu ?>">
                <input type="submit" name="edit" value="Edit Buku Tamu">
                <input type="reset" name="reset" value="Cancel">
            </p>
        </form>
    </body>
</html>