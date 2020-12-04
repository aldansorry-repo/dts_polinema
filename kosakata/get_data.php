<?php
include "koneksi.php";
if (isset($_GET['idkosakata'])) {
    $idkosakata = $_GET['idkosakata'];
    $query = "select * from kosakata where idkosakata='$idkosakata'";
    $sql = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($sql);
    echo json_encode($data);
} else {

    $query = "select * from kosakata order by indonesia desc";
    $sql = mysqli_query($conn, $query);

    while ($hasil = mysqli_fetch_array($sql)) {
        $idkosakata = $hasil['idkosakata'];
        $inggris = stripslashes($hasil['inggris']);
        $indonesia = stripslashes($hasil['indonesia']);
        $deskripsi = stripslashes($hasil['deskripsi']);
        ?>
        <div class="col-md-12 mb-2 kosakata-data" data-indonesia="<?= lcfirst($indonesia) ?>">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title"><?= $indonesia ?> = <?= $inggris ?></h3>
                    <p><?= $deskripsi ?></p>
                    <div class="button-group float-right">
                        <button type="button" onclick="update_prompt(<?= $idkosakata ?>)" class="btn btn-sm btn-outline-warning">Ubah</button>
                        <button type="button" onclick="delete_prompt(<?= $idkosakata ?>)" class="btn btn-sm btn-outline-danger">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
        if (mysqli_num_rows($sql) == 0) {
            ?>
        <div class="col-md-12 mb-2">
            <div class="alert alert-danger">Kosakata tidak ditemukan</div>
        </div>
<?php
    }
}
?>