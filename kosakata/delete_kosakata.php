<?php
include "koneksi.php";

if (isset($_POST['id'])) {
    $idkosakata = $_POST['id'];
    $query = "Delete from kosakata where idkosakata='$idkosakata'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        echo json_encode(['title' => "Berhasil",'message'=>'Berhasil menghapus Kosa kata','type'=>'success']);
    } else {
        echo json_encode(['title' => "Gagal",'message'=>'Gagal menghapus Kosa kata','type'=>'warning']);
    }
} else {
    die("Error. No Id Selected!");
}
