<form action="<?= $action; ?>">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Pembayaran Detail</h3>
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
                            <td>Nama</td>
                            <td><?php echo $nama; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td><?php echo $jenis_kelamin; ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Handphone</td>
                            <td><?php echo $nomor_hp; ?></td>
                        </tr>
                        <tr>
                            <td>Harga Tiket</td>
                            <td><?php echo $harga_tiket; ?></td>
                        </tr>
                        <tr>
                            <td>tanggal_keberangkatan</td>
                            <td><?php echo $tanggal_keberangkatan; ?></td>
                        </tr>
                        <?php $data =
                            base_url('pemesanan/read/') . $this->uri->segment(3)
                            . "\n\n" .
                            'Nama : ' . $nama
                            . "\n" .
                            'Jenis Kelamin : ' . $jenis_kelamin
                            . "\n" .
                            'Nomor Handphone : ' . $nomor_hp
                            . "\n" .
                            'Asal - Tujuan : ' . $jadwal
                            . "\n" .
                            'Tanggal Berangkat :' . $tanggal_keberangkatan
                            . "\n" .
                            'Tanggal pesan :' . $tanggal_pemesanan
                            . "\n";
                        sf_qr_generate($data); ?>
                        <tr>
                            <td>QR</td>
                            <td><img width="250 px" src="<?= base_url('assets/qr/qrgenerator.png'); ?>" alt=""></td>
                        </tr>
                        <tr class="text-right">
                            <td colspan="2"><button type="submit" target="_BLANK" class="btn bg-purple">Cetak Tiket</button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>