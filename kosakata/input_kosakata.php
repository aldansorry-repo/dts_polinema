<?php
include "koneksi.php";

$indonesia = addslashes(strip_tags($_POST['indonesia']));
$inggris = addslashes(strip_tags($_POST['inggris']));
$deskripsi = addslashes(strip_tags($_POST['deskripsi']));

$query = "Insert into kosakata (indonesia,inggris,deskripsi) values ('$indonesia','$inggris','$deskripsi')";
$sql = mysqli_query($conn, $query);

if ($sql) {
    echo json_encode(['code' => 1, 'message' => "Berhasil Menambahkan Kosakata"]);
} else {
    echo json_encode(['code' => 2, 'message' => "Gagal Menambahkan Kosakata"]);
}
