<?php 
include "koneksi.php";
$idtokobuku = $_POST['idtokobuku'];
$judul = $_POST['judul'];
$penerbit = $_POST['penerbit'];
$harga = $_POST['harga'];

$query = "update toko_buku set judul='$judul',penerbit='$penerbit',harga='$harga' where idtokobuku='$idtokobuku'";
$insert = mysqli_query($conn,$query);

if($insert){
    echo json_encode([
        'code' => 1,
        'message' => 'Update Berhasil'
    ]);
}else{
    echo json_encode([
        'code' => 2,
        'message' => 'Update Gagal'
    ]);
}
?>