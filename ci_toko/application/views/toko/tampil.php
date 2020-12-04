<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toko</title>
</head>
<body>
    <h3>Tampil Barang</h3>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Merek</th>
                <th>Warna</th>
                <th>Jumlah</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Deleted</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data_barang as $key => $value): ?>
                <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $value->nama_merek ?></td>
                    <td><?php echo $value->warna ?></td>
                    <td><?php echo $value->jumlah ?></td>
                    <td><?php echo $value->date_created ?></td>
                    <td><?php echo $value->date_updated ?></td>
                    <td><?php echo $value->is_deleted ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>