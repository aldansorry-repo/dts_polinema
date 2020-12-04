<?php
include "databasehelper.php";

$nik = "";
$nik_error = "";
$nama = "";
$nama_error = "";
$message = "";

//jika tombol submit di tekan
if (isset($_POST['submit'])) {
    //get nik dan nama
    $nik = addslashes(strip_tags($_POST['nik']));
    $nama = addslashes(strip_tags($_POST['nama']));

    //validasi input
    if ($nik == "") {
        $nik_error .= "<p class='text-danger'>Nik Harus Diisi<br></p>";
    }
    if ($nama == "") {
        $nama_error .= "<p class='text-danger'>nama Harus Diisi<br></p>";
    }
    if (!is_numeric($nik)) {
        $nik_error .= "<p class='text-danger'>Nik harus diisi angka</p>";
    }
    if (ctype_alpha(str_replace(' ', '', $nama)) === false && $nama_error == "") {
        $nama_error .= "<p class='text-danger'>Nama hanya huruf dan spasi</p>";
    }
    if (!$db->check_unique('karyawan', 'nik', $nik)) {
        $nik_error .= "<p class='text-danger'>Nik sudah digunakan</p>";
    }

    if ($nik_error == "" && $nama_error == "") {
        $set = [
            'nik' => $nik,
            'nama' => $nama
        ];
        //memanggil fungsi insert
        $insert = $db->insert('karyawan', $set);
        if ($insert) {
            $nik = "";
            $nama = "";
            $message = "Data berhasil diinput";
        } else {
            $message = "Data gagal diinput";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h1 class="mb-5">Ujian CRUD Karyawan</h1>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">nik</label>
                        <input type="text" name="nik" class="form-control" placeholder="nik" value="<?php echo $nik ?>">
                        <?php echo $nik_error ?>
                    </div>
                    <div class="form-group">
                        <label for="">nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="nama" value="<?php echo $nama ?>">
                        <?php echo $nama_error ?>
                    </div>
                    <input type="submit" value="Tambah" name="submit" class="btn btn-primary">
                    <a href="index.php" class="btn btn-outline-secondary">Back</a>
                    <br>
                    <b><?php echo $message ?></b>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>