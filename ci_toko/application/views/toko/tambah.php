<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toko</title>
</head>
<body>
    <h3>Input Barang</h3>
    <form action="" method="post">
        Nama Merk:<br>
        <input type="text" name="nama_merek" value="<?php echo set_value('nama_merek') ?>"><br>
        <?php echo form_error('nama_merek','<small>','</small><br>') ?>

        Warna:<br>
        <input type="text" name="warna" value="<?php echo set_value('warna') ?>"><br>
        <?php echo form_error('warna','<small>','</small><br>') ?>

        Jumlah:<br>
        <input type="text" name="jumlah" value="<?php echo set_value('jumlah') ?>"><br>
        <?php echo form_error('jumlah','<small>','</small><br>') ?>

        <br>
        <input type="submit" value="submit">
    </form>

</body>
</html>