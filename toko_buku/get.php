<?php 
include "koneksi.php";

$result = [];
$query = "select * from toko_buku";
$sql = mysqli_query($conn,$query);
while($value = mysqli_fetch_assoc($sql)){
    array_push($result,$value);
}
$data['data'] = $result;
echo json_encode($data);
?>