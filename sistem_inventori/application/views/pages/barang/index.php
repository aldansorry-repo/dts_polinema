<div class="row">
    <div class="col-lg-12">
        <h2 class="title-1 m-b-25">Data Supplier
            <a href="<?php echo base_url('Barang/create') ?>" class="float-right">Create</a></h2>
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Kategori</th>
                        <th>Supplier</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($barang as $key => $value) : ?>

                        <tr>
                            <td><?php echo $key+1 ?></td>
                            <td><?php echo $value->nama ?></td>
                            <td><?php echo $value->harga ?></td>
                            <td><?php echo $value->stok ?></td>
                            <td><?php echo $value->nama_kategori ?></td>
                            <td><?php echo $value->nama_supplier ?></td>
                            <td>
                                <a href="<?php echo base_url('Barang/update/'.$value->id) ?>" class="text-warning mr-3"><i class="fa fa-pencil-alt"></i></a>
                                <a href="<?php echo base_url('Barang/delete/'.$value->id) ?>" class="text-danger" onclick="return confirm('Apakah anda yakin?');"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
    </div>
</div>