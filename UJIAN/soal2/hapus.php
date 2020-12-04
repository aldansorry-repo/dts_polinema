<?php
include "databasehelper.php";

//mengambil get id
$id = $_GET['id'];

//jika id kosong maka kembali ke halaman index.php
if($id == ""){
    header('location:index.php');
}

//memanggil fungsi delete
$db->delete("karyawan",$id);

//pindah halaman ke index.php
header("location:index.php");