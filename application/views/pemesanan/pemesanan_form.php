<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Pemesanan</h3>
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
            <label for="int">Id User <?php echo form_error('id_user') ?></label>
            <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Jadwal <?php echo form_error('id_jadwal') ?></label>
            <input type="text" class="form-control" name="id_jadwal" id="id_jadwal" placeholder="Id Jadwal" value="<?php echo $id_jadwal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status Pemesanan <?php echo form_error('status_pemesanan') ?></label>
            <input type="text" class="form-control" name="status_pemesanan" id="status_pemesanan" placeholder="Status Pemesanan" value="<?php echo $status_pemesanan; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Pemesanan <?php echo form_error('tanggal_pemesanan') ?></label>
            <input type="text" class="form-control" name="tanggal_pemesanan" id="tanggal_pemesanan" placeholder="Tanggal Pemesanan" value="<?php echo $tanggal_pemesanan; ?>" />
        </div>
	    <input type="hidden" name="id_pemesanan" value="<?php echo $id_pemesanan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pemesanan') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>