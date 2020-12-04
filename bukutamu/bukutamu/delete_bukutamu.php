<?php 
include "koneksi.php";

if(isset($_GET['idbukutamu'])){
    $idbukutamu = $_GET['idbukutamu'];
}else{
    die("Error. No Id Selected!");
}
?>
<html>
    <head>
        <title>Input Berita</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <a href="index.php">Halaman Depan</a>
        <a href="input_bukutamu.php">Input Buku Tamu</a>
        <br>
        <br>

        <?php 
        if(!empty($idbukutamu) && $idbukutamu != ""){
            $query = "Delete from bukutamu where idbukutamu='$idbukutamu'";
            $sql = mysqli_query($conn,$query);
            if($sql){
                echo "<h2><font color='blue'>Buku Tamu telah berhasil dihapus</font></h2>";
            }else{
                echo "<h2><font color='red'>Buku Tamu gagal dihapus</font></h2>";    
            }

            echo "Klik <a href='index.php'>Di sini</a> untuk kembali ke halaman buku tamu";
        }else{
            die("Access Denied!");
        } 
        ?>
    </body>
</html>