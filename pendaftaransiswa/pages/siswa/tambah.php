<?php include "../../system/connection.php" ?>
<?php include "../../includes/header.php" ?>

<?php 

$message = null;
if(isset($_POST['tambah'])){
    $set = [
        'nama' => $_POST['nama'],
        'alamat' => $_POST['alamat'],
        'jeniskelamin' => $_POST['jeniskelamin'],
        'agama' => $_POST['agama'],
        'asal' => $_POST['asal'],
    ];

    $insert = $db->insert('siswa',$set);
    if($insert){
        $message = [
            "type" => "success",
            'message' => "Tambah Siswa Berhasil"
        ];
    }else{
        $message = [
            "type" => "danger",
            'message' => "Tambah Siswa Berhasil"
        ];
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 px-5">
            <h3>Tambah Siswa</h3>
            <?php if($message != null): ?>
                <div class="alert alert-<?= $message['type'] ?>"><?= $message['message'] ?></div>
            <?php endif ?>
            <form action="" method="post">
                <div class="form-group row">
                    <label for="" class="col-form-label col-md-2">Nama</label>
                    <div class="col-md-10">
                        <input type="text" name="nama" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-form-label col-md-2">Alamat</label>
                    <div class="col-md-10">
                        <textarea name="alamat" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-form-label col-md-2">Jenis Kelamin</label>
                    <div class="col-md-10 col-form-label">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="jeniskelamin1" name="jeniskelamin" class="custom-control-input" value="Laki-laki" checked>
                            <label class="custom-control-label" for="jeniskelamin1">Laki - laki</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="jeniskelamin2" name="jeniskelamin" class="custom-control-input" value="Perempuan">
                            <label class="custom-control-label" for="jeniskelamin2">Perempuan</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-form-label col-md-2">Agama</label>
                    <div class="col-md-10">
                        <select name="agama" class="form-control">
                            <option disabled selected>Pilih salah satu</option>
                            <option>Islam</option>
                            <option>Kristen</option>
                            <option>Katolig</option>
                            <option>Hindu</option>
                            <option>Budha</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-form-label col-md-2">Sekolah Asal</label>
                    <div class="col-md-10">
                        <input type="text" name="asal" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <label for="" class="col-form-label col-md-2"></label>
                    <div class="col-md-10">
                        <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                        <input type="reset" class="btn btn-secondary" value="Reset">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "../../includes/footer.php" ?>