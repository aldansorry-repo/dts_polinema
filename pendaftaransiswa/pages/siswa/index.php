<?php include "../../system/connection.php" ?>
<?php include "../../includes/header.php" ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 px-5">
            <h3>Daftar Siswa</h3>
            
            <a href="<?php echo base_url(); ?>pages/siswa/tambah.php" class="btn btn-sm btn-success">Tambah</a>
            <table class="table table-bordered table-stripped table-hover mt-3" style="width:100%">
                <thead>
                    <tr class="alert-primary">
                        <th>#</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Asal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($db->select('siswa') as $key => $value): ?>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $value['nama'] ?></td>
                            <td><?php echo $value['alamat'] ?></td>
                            <td><?php echo $value['jeniskelamin'] ?></td>
                            <td><?php echo $value['agama'] ?></td>
                            <td><?php echo $value['asal'] ?></td>
                            <td>
                                <a href="<?php echo base_url('pages/siswa/edit.php?id='.$value['id']) ?>" class="btn btn-sm btn-success">Edit</a>
                                <a href="<?php echo base_url('pages/siswa/hapus.php?id='.$value['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include "../../includes/footer.php" ?>