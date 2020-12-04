<div class="row">
    <div class="col-lg-9">
        <h2 class="title-1 m-b-25">Data Supplier
            <a href="<?php echo base_url('Supplier/create') ?>" class="float-right">Create</a></h2>
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th class="text-right">telepon</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($supplier as $key => $value) : ?>

                        <tr>
                            <td><?php echo $key+1 ?></td>
                            <td><?php echo $value->nama ?></td>
                            <td><?php echo $value->alamat ?></td>
                            <td class="text-right"><?php echo $value->telepon ?></td>
                            <td>
                                <a href="<?php echo base_url('Supplier/delete/'.$value->id) ?>" class="text-danger" onclick="return confirm('Apakah anda yakin?');"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
    </div>
</div>