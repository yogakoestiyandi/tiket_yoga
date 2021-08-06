<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pemesanan Detail</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table">
                    <tr>
                        <td>Id User</td>
                        <td><?php echo $id_user; ?></td>
                    </tr>
                    <tr>
                        <td>Id Jadwal</td>
                        <td><?php echo $id_jadwal; ?></td>
                    </tr>
                    <tr>
                        <td>Status Pemesanan</td>
                        <td><?php echo $status_pemesanan; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Pemesanan</td>
                        <td><?php echo $tanggal_pemesanan; ?></td>
                    </tr>
                    <?php $data = base_url('pemesanan/read/') . $this->uri->segment(3);
                    sf_qr_generate($data); ?>
                    <tr>
                        <td>QR</td>
                        <td><img width="250" src="<?= base_url('assets/qr/qrgenerator.png'); ?>" alt=""></td>
                    </tr>


                    </tr>

                </table>
                <div class="row">
                    <div class="col-md-6">
                        <a href="<?php echo site_url('pemesanan') ?>" class="btn bg-purple">Cancel</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="<?php echo site_url('pembayaran/cetak_tiket_pemesanan/' . $this->uri->segment(3)) ?>" target="_BLANK" class="btn bg-purple">Cetak Tiket</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>