<?php

$arr_count = [];
$angka = '';

if (isset($_POST['process'])) {
    $angka = $_POST['angka'];

    //split string
    $arr_angka = str_split($angka);

    //jumlah array
    $arr_count = array_count_values($arr_angka);

    //mengurutkan kata
    ksort($arr_count);


    //menampilkan text dan di export ke file txt
    $str_text = "";
    $str_text .= "Hasil export text\n";
    foreach($arr_count as $key => $value){
        $str_text .= "Angka $key berjumlah $value \n";
    }
    file_put_contents('export.txt', print_r($str_text, TRUE));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soal 1</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h1 class="mb-5">Ujian ALGORITMA</h1>
                <form action="" method="post">
                    <div class="input-group">

                        <input type="number" name="angka" class="form-control" placeholder="Input Angka" value="<?php echo $angka ?>">
                        <div class="input-group-append">
                            <input type="submit" name="process" value="Process" class="btn btn-primary">
                        </div>
                    </div>
                </form>

                <?php if (count($arr_count) != 0) : ?>
                    <p>Angka yang diinputkan <?php echo $angka ?><br>Hasil;</p>

                    <table class="table table-striped table-sm table-bordered" style="width: 1px;">
                        <tr>
                            <td>Angka</td>
                            <td>Jumlah</td>
                        </tr>
                        <?php foreach ($arr_count as $key => $value) : ?>
                            <tr>
                                <td><?php echo $key ?></td>
                                <td><?php echo $value ?></td>
                            </tr>
                        <?php endforeach ?>

                    </table>
                    <br>
                    DOWNLOAD FILE ;<br>
                    <a href="export.txt" target="_BLANK" download="export_file" class="btn btn-success">Download</a>
                <?php endif ?>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>