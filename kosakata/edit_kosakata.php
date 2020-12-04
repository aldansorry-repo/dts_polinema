<?php
include "koneksi.php";
$idkosakata = $_POST['idkosakata'];
$indonesia = addslashes(strip_tags($_POST['indonesia']));
$inggris = addslashes(strip_tags($_POST['inggris']));
$deskripsi = addslashes(strip_tags($_POST['deskripsi']));

$query = "update kosakata set indonesia='$indonesia',inggris='$inggris',deskripsi='$deskripsi' where idkosakata='$idkosakata'";
$sql = mysqli_query($conn, $query);

if ($sql) {
    echo json_encode(['code' => 1, 'message' => "Berhasil Mengubah Kosakata"]);
} else {
    echo json_encode(['code' => 2, 'message' => "Gagal Mengubah Kosakata"]);
}