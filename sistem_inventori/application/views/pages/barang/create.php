<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Tambah </strong> Barang
            </div>
            <div class="card-body card-block">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" id="form-create">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="nama" class=" form-control-label">Nama</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="nama" name="nama" placeholder="Nama" class="form-control" value="<?php echo set_value('nama') ?>">
                            <?php echo form_error('nama', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="harga" class=" form-control-label">Harga</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" id="harga" name="harga" placeholder="Harga" class="form-control" value="<?php echo set_value('harga') ?>">
                            <?php echo form_error('harga', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="stok" class=" form-control-label">Stok</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" id="stok" name="stok" placeholder="Stok" class="form-control" value="<?php echo set_value('stok') ?>">
                            <?php echo form_error('stok', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="select" class=" form-control-label">Supplier</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="fk_supplier" id="select" class="form-control">
                                <option disabled selected>Pilih salah satu</option>
                                <?php foreach ($combo_supplier as $key => $value) : ?>
                                    <option value="<?php echo $value->id ?>"><?php echo $value->nama ?></option>
                                <?php endforeach ?>
                            </select>
                            <?php if (set_value('fk_supplier') != null) : ?>
                                <script>
                                    $('[name=fk_supplier]').val("<?php echo set_value('fk_supplier') ?>")
                                </script>
                            <?php endif ?>
                            <?php echo form_error('fk_supplier', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="select" class=" form-control-label">Kategori</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="fk_kategori" id="select" class="form-control">
                                <option disabled selected value="">Please select</option>
                                <?php foreach ($combo_kategori as $key => $value) : ?>
                                    <option value="<?php echo $value->id ?>"><?php echo $value->nama ?></option>
                                <?php endforeach ?>
                            </select>
                            <?php if (set_value('fk_kategori') != null) : ?>
                                <script>
                                    $('[name=fk_kategori]').val("<?php echo set_value('fk_kategori') ?>")
                                </script>
                            <?php endif ?>
                            <?php echo form_error('fk_kategori', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm" form="form-create">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>

    </div>
</div>
<?php if(isset($data_barang) && !isset($_POST['nama'])): ?>
<script>
    $('[name="nama"]').val(<?php echo $data_barang->nama ?>);    
    $('[name="harga"]').val(<?php echo $data_barang->harga ?>);    
    $('[name="stok"]').val(<?php echo $data_barang->stok ?>);    
    $('[name="fk_kategori"]').val(<?php echo $data_barang->fk_kategori ?>);    
    $('[name="fk_supplier"]').val(<?php echo $data_barang->fk_supplier ?>);    
</script>
<?php endif ?>