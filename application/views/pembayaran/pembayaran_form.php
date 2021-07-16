<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button; ?> Pembayaran</h3>
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
                        <!-- <label for="int">Id Pemesanan <?php echo form_error('id_pemesanan') ?></label> -->
                        <input type="hidden" class="form-control" name="id_pemesanan" id="id_pemesanan" placeholder="Id Pemesanan" value="<?php echo $id_pemesanan; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Asal Keberangkatan : <?= $asal; ?></label><br>
                        <label for="varchar">Tujuan Keberangkatan : <?= $tujuan; ?></label><br>
                        <label for="varchar">Total Tagihan Anda : <?= rupiah($harga_tiket); ?></label>
                    </div>
                    <div class="form-group">
                        <label for="varchar">Metode Pembayaran<?php echo form_error('metode') ?></label>
                        <!-- <input type="text" class="form-control" name="metode" id="metode" placeholder="Metode" value="<?php echo $metode; ?>" /> -->
                        <select name="metode" id="metode" class="form-select form-control">
                            <option value="0">Silahkan Pilih Metode Pembayaran</option>
                            <option value="CASH">CASH</option>
                            <option value="OVO">OVO</option>
                            <option value="DANA">DANA</option>
                            <option value="GOPAY">GOPAY</option>
                            <option value="BRI">BRI</option>
                            <option value="BCA">BCA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- <label for="date">Tanggal Bayar <?php echo form_error('tanggal_bayar') ?></label> -->
                        <input type="hidden" class="form-control" name="tanggal_bayar" id="tanggal_bayar" placeholder="Tanggal Bayar" value="<?php echo $tanggal_bayar; ?>" />
                    </div>
                    <div class="form-group">
                        <!-- <label for="varchar">Status Bayar <?php echo form_error('status_bayar') ?></label> -->
                        <input type="hidden" class="form-control" name="status_bayar" id="status_bayar" placeholder="Status Bayar" value="<?php echo $status_bayar; ?>" />
                    </div>
                    <input type="hidden" name="id_pembayaran" value="<?php echo $id_pembayaran; ?>" />
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('pembayaran') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>