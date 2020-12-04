<?php 
include "koneksi.php";
$judul = $_POST['judul'];
$penerbit = $_POST['penerbit'];
$harga = $_POST['harga'];

$query = "insert into toko_buku (judul,penerbit,harga) values ('$judul','$penerbit','$harga')";
$insert = mysqli_query($conn,$query);

if($insert){
    echo json_encode([
        'code' => 1,
        'message' => 'Input Berhasil'
    ]);
}else{
    echo json_encode([
        'code' => 2,
        'message' => 'Input Gagal'
    ]);
}
?>