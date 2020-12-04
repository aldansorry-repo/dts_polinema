<?php 
include "koneksi.php";
$idtokobuku = $_POST['idtokobuku'];

$query = "DELETE FROM toko_buku where idtokobuku='$idtokobuku'";
$insert = mysqli_query($conn,$query);

if($insert){
    echo json_encode([
        'code' => 1,
        'message' => 'Delete Berhasil'
    ]);
}else{
    echo json_encode([
        'code' => 2,
        'message' => 'Delete Gagal'
    ]);
}
?>