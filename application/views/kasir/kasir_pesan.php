<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button; ?> Penumpang</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="<?php echo $action; ?>" method="post">
                    <div class="form-group">
                        <!-- <label for="int">Id User <?php echo form_error('id_user') ?></label> -->
                        <input type="hidden" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Jens Kelamin <?php echo form_error('jenis_kelamin') ?></label>
                        <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jens Kelamin" />
                    </div>
                    <div class="form-group">
                        <label for="int">Nomor Hp <?php echo form_error('nomor_hp') ?></label>
                        <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" placeholder="Nomor Hp" />
                    </div>
                    <input type="hidden" name="id_jadwal" value="<?php echo $id_jadwal; ?>" />
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('penumpang') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>