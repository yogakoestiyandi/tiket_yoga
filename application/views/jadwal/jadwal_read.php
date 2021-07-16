<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Jadwal Detail</h3>
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
        <table class="table">
	    <tr><td>Asal</td><td><?php echo $asal; ?></td></tr>
	    <tr><td>Tujuan</td><td><?php echo $tujuan; ?></td></tr>
	    <tr><td>Tanggal Keberangkatan</td><td><?php echo $tanggal_keberangkatan; ?></td></tr>
	    <tr><td>Tanggal Sampai</td><td><?php echo $tanggal_sampai; ?></td></tr>
	    <tr><td>Harga Tiket</td><td><?php echo $harga_tiket; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('jadwal') ?>" class="btn bg-purple">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
</div>