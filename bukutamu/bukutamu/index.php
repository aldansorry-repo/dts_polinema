<?php
include "koneksi.php";
?>
<html>
<head>
    <title>Index Buku Tamu</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <a href="index.php">Halaman Depan</a> |
    <a href="input_bukutamu.php">Input Buku Tamu</a>
    <br><br>
    <h2>Halaman Depan ~ Buku Tamu</h2>
    <?php 
    $query = "select * from bukutamu order by tanggal desc";
    $sql = mysqli_query($conn,$query);

    while($hasil = mysqli_fetch_array($sql)){
        $idbukutamu = $hasil['idbukutamu'];
        $tanggal = $hasil['tanggal'];
        $nama = stripslashes($hasil['nama']);
        $email = stripslashes($hasil['email']);
        $isi = stripslashes($hasil['isi']);

        echo "<p>";
        echo "<b>$nama</b>, $email <br>";
        echo "<small>Dikirimkan pada : $tanggal</small><br>";
        echo "$isi<br>";
        echo "<small>Action : <a href='delete_bukutamu.php?idbukutamu=$idbukutamu'>Hapus</a> | <a href='edit_bukutamu.php?idbukutamu=$idbukutamu'>Ubah</a></small>";
        echo "</p>";
        echo "<hr>"; 
    }
    ?>
</body>

</html>