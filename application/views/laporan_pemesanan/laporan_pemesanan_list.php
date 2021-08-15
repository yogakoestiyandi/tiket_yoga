<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Laporan_pemesanan</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>

            <div class="box-body">
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">

                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                        <?php echo anchor(site_url('laporan_pemesanan/printdoc'), '<i class="fa fa-print"></i> Print Preview', 'class="btn bg-maroon"'); ?>
                        <?php echo anchor(site_url('laporan_pemesanan/excel'), '<i class="fa fa-file-excel"></i> Excel', 'class="btn btn-success"'); ?>
                        <?php echo anchor(site_url('laporan_pemesanan/word'), '<i class="fa fa-file-word"></i> Word', 'class="btn btn-primary"'); ?><form action="<?php echo site_url('laporan_pemesanan/index'); ?>" class="form-inline" method="get" style="margin-top:10px">
                            <div class="input-group">

                            </div>
                        </form>
                    </div>
                </div>
                <div style="margin-bottom: 10px;margin-left:10px;margin-top:60px"><label for="filter">Filter Tanggal:</label></div>
                <div class="row" style="margin-bottom: 10px;margin-left:10px">
                    <form action="<?php echo base_url('laporan_pemesanan/tanggal'); ?>" class="form-inline" method="post">
                        <div class="col input-group">
                            <!-- <label><b>Filter :</b></label> -->
                            <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-calendar"></i></button></span>
                            <input type="text" class="form-control formdate2" name="dari" id="DariTanggal" required="true" placeholder="Dari Tanggal">
                        </div>
                        <div class="col input-group">
                            <span class="input-group-addon" id="sizing-addon1">
                                <i class="fas fa-chevron-right"></i></span>
                            <input type="text" class="form-control formdate2" name="sampai" id="SampaiTanggal" required="true" placeholder="Sampai Tanggal">
                        </div>
                        <div class="col input-group">
                            <button type="submit" class="btn btn-primary"> <i class="fas fa-check-circle"></i> Submit</button>
                        </div>
                    </form>
                </div>
                <div style="margin-bottom: 10px;margin-left:10px;margin-top:60px"><label for="filter">Filter Tujuan:</label></div>
                <div class="row" style="margin-bottom: 10px;margin-left:10px">
                    <form action="<?php echo base_url('laporan_pemesanan/tujuan'); ?>" class="form-inline" method="post">
                        <div class="form-group">
                            <div class="col input-group">
                                <select class="selectpicker" name="id_jadwal" id="id_jadwal" data-placeholder="Select a Parent" data-live-search="true" style="width: 100%;">
                                    <option value="0">-- Pilih jadwal -- </option>
                                    <?php
                                    foreach ($jadwal_keberangkatan as $key => $value) {
                                        echo "<option value='" . $value->id_jadwal . "'>" . $value->asal . ' - ' . $value->tujuan . " (" . dateina($value->tanggal_keberangkatan) . ")" . "</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>

                        <div class="col input-group">
                            <button type="submit" class="btn btn-primary"> <i class="fas fa-check-circle"></i> Submit</button>
                        </div>
                    </form>
                </div>
                <form method="post" action="<?= site_url('laporan_pemesanan/deletebulk'); ?>" id="formbulk">
                    <table class="table table-bordered" style="margin-bottom: 10px" style="width:100%">
                        <tr>
                            <!-- <th style="width: 10px;"><input type="checkbox" name="selectall" /></th> -->
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Tujuan</th>
                            <th>Tiket Terjual</th>

                        </tr><?php
                                foreach ($laporan_pemesanan_data as $laporan_pemesanan) {
                                ?>
                            <tr>

                                <?php
                                    $jadwal = $this->db->query("SELECT asal,tujuan from jadwal where id_jadwal=$laporan_pemesanan->id_jadwal")->row();
                                    $jadwal = $jadwal->asal . ' - ' . $jadwal->tujuan;


                                ?>

                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $laporan_pemesanan->tanggal ?></td>
                                <td><?php echo $jadwal ?></td>
                                <td><?php echo $laporan_pemesanan->tiket_terjual ?></td>

                            </tr>
                        <?php
                                }
                        ?>
                    </table>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-12">
                            <a href="#" class="btn bg-yellow">Total Record : <?php echo $total_rows ?></a>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6 text-right">
                        <?php echo $pagination ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmdelete(linkdelete) {
        alertify.confirm("Apakah anda yakin akan  menghapus data tersebut?", function() {
            location.href = linkdelete;
        }, function() {
            alertify.error("Penghapusan data dibatalkan.");
        });
        $(".ajs-header").html("Konfirmasi");
        return false;
    }
    $(':checkbox[name=selectall]').click(function() {
        $(':checkbox[name=id]').prop('checked', this.checked);
    });

    $("#formbulk").on("submit", function() {
        var rowsel = [];
        $.each($("input[name='id']:checked"), function() {
            rowsel.push($(this).val());
        });
        if (rowsel.join(",") == "") {
            alertify.alert('', 'Tidak ada data terpilih!', function() {});

        } else {
            var prompt = alertify.confirm('Apakah anda yakin akan menghapus data tersebut?',
                'Apakah anda yakin akan menghapus data tersebut?').set('labels', {
                ok: 'Yakin',
                cancel: 'Batal!'
            }).set('onok', function(closeEvent) {

                $.ajax({
                    url: "laporan_pemesanan/deletebulk",
                    type: "post",
                    data: "msg = " + rowsel.join(","),
                    success: function(response) {
                        if (response == true) {
                            location.reload();
                        }
                        //console.log(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });

            });
            $(".ajs-header").html("Konfirmasi");
        }
        return false;
    });
</script>