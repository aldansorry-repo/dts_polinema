<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Toko Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="">aplikasi toko buku</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5" id="container-insert">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Form Tambah Buku</h2>
                        <form action="input.php" method="post" id="form-insert">
                            <div class="form-group">
                                <label for="">Judul buku</label>
                                <input type="text" name="judul" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">penerbit buku</label>
                                <input type="text" name="penerbit" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">harga buku</label>
                                <input type="text" name="harga" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn btn-outline-secondary">Reset</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">List Tambah Buku</h2>
                        <table id="table-data" class="table" style="width:100%"></table>
                    </div>
                </div>
            </div>
            <div class="col-md-5" id="container-update" style="display:none;">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Form Edit Buku</h2>
                        <form action="update.php" method="post" id="form-update">
                            <input type="hidden" name="idtokobuku">
                            <div class="form-group">
                                <label for="">Judul buku</label>
                                <input type="text" name="judul" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">penerbit buku</label>
                                <input type="text" name="penerbit" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">harga buku</label>
                                <input type="text" name="harga" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="button" class="btn btn-outline-secondary" onclick="insert_prompt()">Back to Input</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>
        var table_data;
        var table;
        $(document).ready(function() {
            table = $('#table-data').DataTable({
                ajax: {
                    url: "get.php",
                    "dataSrc": function(data) {
                        table_data = [];
                        data.data.forEach(function(key) {
                            table_data.push(data[key])
                        })
                        return data.data;
                    }
                },
                columns: [{
                        "title": "No",
                        "width": "15px",
                        "data": null,
                        "visible": true,
                        "class": "text-center",
                        render: (data, type, row, meta) => {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        title: 'judul',
                        data: "judul"
                    },
                    {
                        title: 'penerbit',
                        data: "penerbit"
                    },
                    {
                        title: 'harga',
                        data: "harga"
                    },
                    {
                        title: '',
                        width: '120px',
                        sorting: false,
                        data: (data) => {
                            let ret = "";
                            ret += '<button type="button" onclick="update_prompt(this)" data-idtokobuku="' + data.idtokobuku + '" data-judul="' + data.judul + '" data-penerbit="' + data.penerbit + '" data-harga="' + data.harga + '" class="btn btn-sm btn-warning">Edit</button> ';
                            ret += '<button type="button" onclick="delete_prompt(this)" data-idtokobuku="' + data.idtokobuku + '" class="btn btn-sm btn-danger">Hapus</button>';
                            return ret;
                        }
                    }
                ],
            });

            $("form#form-insert").submit(function(e) {
                e.preventDefault();

                let elementForm = $(this);
                let formData = new FormData(this);

                $.ajax({
                    url: elementForm.attr('action'),
                    type: 'POST',
                    data: formData,
                    dataType: 'JSON',
                    success: function(data) {
                        if (data.code == '1') {
                            Swal.fire(
                                "success",
                                data.message,
                                "success"
                            );
                            table.ajax.reload(null, false);
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });
            $("form#form-update").submit(function(e) {
                e.preventDefault();

                let elementForm = $(this);
                let formData = new FormData(this);

                $.ajax({
                    url: elementForm.attr('action'),
                    type: 'POST',
                    data: formData,
                    dataType: 'JSON',
                    success: function(data) {
                        if (data.code == '1') {
                            Swal.fire(
                                "success",
                                data.message,
                                "success"
                            );
                            table.ajax.reload(null, false);
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });
        })

        var insert_prompt = () => {
            $('#container-update').slideUp('fast', function() {
                $('#container-insert').slideDown('fast');
            });
        }

        var update_prompt = (buttonObject) => {
            let idtokobuku = $(buttonObject).data('idtokobuku');
            let judul = $(buttonObject).data('judul');
            let penerbit = $(buttonObject).data('penerbit');
            let harga = $(buttonObject).data('harga');
            $('#form-update').find('[name="idtokobuku"]').val(idtokobuku);
            $('#form-update').find('[name="judul"]').val(judul);
            $('#form-update').find('[name="penerbit"]').val(penerbit);
            $('#form-update').find('[name="harga"]').val(harga);

            $('#container-insert').slideUp('fast', function() {
                $('#container-update').slideDown('fast');
            });
        }

        var delete_prompt = (buttonObject) => {
            let idtokobuku = $(buttonObject).data('idtokobuku');
            $.ajax({
                url: 'delete.php',
                type: "POST",
                data: {
                    idtokobuku: idtokobuku,
                },
                dataType : 'JSON',
                success: (data) => {
                    Swal.fire(
                        (data.code == 1 ? "success" : "error"),
                        data.message,
                        (data.code == 1 ? "success" : "error")
                    );
                    table.ajax.reload(null, false);
                }
            })
        }
    </script>
</body>

</html>