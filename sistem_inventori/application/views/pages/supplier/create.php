<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Basic Form</strong> Elements
            </div>
            <div class="card-body card-block">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" id="form-create">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Nama</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="nama" placeholder="Nama" class="form-control" value="<?php echo set_value('nama') ?>">
                            <?php echo form_error('nama','<small class="form-text text-danger">','</small>') ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="textarea-input" class=" form-control-label">Alamat</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="alamat" id="textarea-input" rows="9" placeholder="Alamat" class="form-control"><?php echo set_value('alamat') ?></textarea>
                            <?php echo form_error('alamat','<small class="form-text text-danger">','</small>') ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Telepon</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="telepon" placeholder="Telepon" class="form-control" value="<?php echo set_value('nama') ?>">
                            <?php echo form_error('telepon','<small class="form-text text-danger">','</small>') ?>
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