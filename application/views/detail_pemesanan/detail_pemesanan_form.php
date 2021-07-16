<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Detail_pemesanan</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus"></i></button>
                     <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
              <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Jadwal <?php echo form_error('id_jadwal') ?></label>
            <input type="text" class="form-control" name="id_jadwal" id="id_jadwal" placeholder="Id Jadwal" value="<?php echo $id_jadwal; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Oemesanan <?php echo form_error('id_oemesanan') ?></label>
            <input type="text" class="form-control" name="id_oemesanan" id="id_oemesanan" placeholder="Id Oemesanan" value="<?php echo $id_oemesanan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nomor Hp <?php echo form_error('nomor_hp') ?></label>
            <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" placeholder="Nomor Hp" value="<?php echo $nomor_hp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
            <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="<?php echo $jenis_kelamin; ?>" />
        </div>
	    <input type="hidden" name="id_detail_pemesanan" value="<?php echo $id_detail_pemesanan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('detail_pemesanan') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>