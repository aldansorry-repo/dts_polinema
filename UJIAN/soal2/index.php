<?php
include 'databasehelper.php';

// memanggil fungsi select 
$data_karyawan = $db->select('karyawan');
$word = "";

//jika fungsi search di panggil
if(isset($_POST['search'])){
    //ambil kata dari input word
    $word = $_POST['word'];

    //memanggil fungsi search
    $data_karyawan = $db->select_search('karyawan',['nik','nama'],$word);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Karyawan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h1>Ujian CRUD Karyawan</h1>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="word" class="form-control" placeholder="Input Kata" value="<?php echo $word ?>">
                        <div class="input-group-append">
                            <input type="submit" name="search" value="Search" class="btn btn-outline-primary">
                        </div>
                    </div>
                </form>

                <a href="tambah.php" class="btn btn-primary float-right mb-3">Tambah</a>
                <table class="table table-bordered table-hover" style="width:100%">
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th></th>
                    </tr>

                    <?php foreach ($data_karyawan as $key => $value) : ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $value['nik'] ?></td>
                            <td><?php echo $value['nama'] ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $value['id'] ?>" class="btn btn-outline-warning btn-sm">edit</a>
                                <a href="hapus.php?id=<?php echo $value['id'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('apakah anda yakin ingin menghapus data dengan nama : <?php echo $value['nama'] ?>')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>