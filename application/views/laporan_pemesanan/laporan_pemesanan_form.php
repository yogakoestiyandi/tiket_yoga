<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Laporan_pemesanan</h3>
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
            <label for="varchar">Tanggal <?php echo form_error('tanggal') ?></label>
            <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Jadwal <?php echo form_error('id_jadwal') ?></label>
            <input type="text" class="form-control" name="id_jadwal" id="id_jadwal" placeholder="Id Jadwal" value="<?php echo $id_jadwal; ?>" />
        </div>
	    <div class="form-group">
            <label for="bigint">Tiket Terjual <?php echo form_error('tiket_terjual') ?></label>
            <input type="text" class="form-control" name="tiket_terjual" id="tiket_terjual" placeholder="Tiket Terjual" value="<?php echo $tiket_terjual; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('laporan_pemesanan') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>