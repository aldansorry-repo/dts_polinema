<?php
include "koneksi.php";
?>
<html>

<head>
    <title>Index Buku Tamu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            padding-right: 0 !important;
        }
        .kosakata-selected .card{
            border-color: blue;
        }
    </style>
</head>
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdateLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-update" action="edit_kosakata.php" method="post">
                    <input type="hidden" name="idkosakata">
                    <div class="form-group row">
                        <label for="" class="col-form-label col-md-3">Indonesia</label>
                        <div class="col-md-9">
                            <input type="text" name="indonesia" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-form-label col-md-3">Inggris</label>
                        <div class="col-md-9">
                            <input type="text" name="inggris" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-form-label col-md-3">Deskripsi</label>
                        <div class="col-md-9">
                            <textarea type="text" name="deskripsi" class="form-control"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="form-update">Save changes</button>
            </div>
        </div>
    </div>
</div>

<body>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Kamus Indonesia -> Inggriss</h1>
            <hr class="my-4">
            <div class="container">
                <form action="" id="form-search">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" id="search-input">
                        <button type="submit" class="btn btn-primary" id="btn-search">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row" id="container-isi" style="display:none;">

        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">Tambah Kosa Kata Baru</div>
                    <div class="card-body">
                        <form id="form-input" action="input_kosakata.php" method="post">
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-3">Indonesia</label>
                                <div class="col-md-9">
                                    <input type="text" name="indonesia" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-3">Inggris</label>
                                <div class="col-md-9">
                                    <input type="text" name="inggris" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-3">Deskripsi</label>
                                <div class="col-md-9">
                                    <textarea type="text" name="deskripsi" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-3"></label>
                                <div class="col-md-9">
                                    <input type="submit" class="btn btn-primary">
                                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>
        $(document).ready(function() {
            get_data();

            $('#form-search').submit(function(e) {
                e.preventDefault();
                let val = $('#search-input').val();
                // if (val != "") {
                //     $('.kosakata-data').fadeOut('fast');
                //     $('[data-indonesia*="' + val + '"]').fadeIn("fast");
                // } else {
                //     $('.kosakata-data').fadeIn('fast');
                // }

                $('.kosakata-data').removeClass('kosakata-selected');
                $('[data-indonesia*="' + val + '"]').addClass('kosakata-selected');
            });

            $('#form-input').submit(function(e) {
                e.preventDefault();
                let elementForm = $(this);
                let formData = new FormData(this);

                $.ajax({
                    url: elementForm.attr('action'),
                    type: 'POST',
                    data: formData,
                    dataType: 'JSON',
                    success: function(data) {
                        if (data.code == 1) {
                            Swal.fire('Berhasil', data.message, 'success');
                        } else {
                            Swal.fire('Gagal', data.message, 'warning');
                        }
                        get_data();
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            })

            $('#form-update').submit(function(e) {
                e.preventDefault();
                let elementForm = $(this);
                let formData = new FormData(this);

                $.ajax({
                    url: elementForm.attr('action'),
                    type: 'POST',
                    data: formData,
                    dataType: 'JSON',
                    success: function(data) {
                        if (data.code == 1) {
                            Swal.fire('Berhasil', data.message, 'success');
                        } else {
                            Swal.fire('Gagal', data.message, 'warning');
                        }
                        get_data();
                        $('#modalUpdate').modal('hide');
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            })
        });

        var get_data = () => {
            $.ajax({
                url: "get_data.php",
                type: "POST",
                success: (data) => {
                    $('#container-isi').html(data);
                    $('#container-isi').fadeIn('slow');
                },
            })
        }

        var update_prompt = (id) => {
            $.ajax({
                url: "get_data.php?idkosakata=" + id,
                type: "POST",
                dataType: "JSON",
                success: (data) => {
                    $('#modalUpdate').find('[name="idkosakata"]').val(data.idkosakata);
                    $('#modalUpdate').find('[name="indonesia"]').val(data.indonesia);
                    $('#modalUpdate').find('[name="inggris"]').val(data.inggris);
                    $('#modalUpdate').find('[name="deskripsi"]').val(data.deskripsi);



                    $('#modalUpdate').modal("show");
                },
            })
        }

        var delete_prompt = (id) => {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Kosakata akan dihapus secara permanent",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Tidak, Jangan!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "delete_kosakata.php",
                        type: 'POST',
                        data: {
                            id: id
                        },
                        dataType: 'JSON',
                        success: (data) => {
                            Swal.fire(
                                data.title,
                                data.message,
                                data.type
                            );
                            get_data();
                        }
                    });
                }
            })
        }
    </script>
</body>

</html>