<?php 
include "../../system/connection.php";
$id = $_GET['id'];

$delete = $db->delete('siswa',$id);
if($delete){
    echo '
    <script>
    alert("Hapus berhasil");window.location.href="'.base_url("pages/siswa/index.php").'";
    </script>
    ';
}else{
    echo '
    <script>
    alert("Hapus Gagal");window.location.href="'.base_url("pages/siswa/index.php").'";
    </script>
    ';
}
?>