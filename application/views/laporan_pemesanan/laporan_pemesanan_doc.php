<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Laporan_pemesanan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Tanggal</th>
		<th>Id Jadwal</th>
		<th>Tiket Terjual</th>
		
            </tr><?php
            foreach ($laporan_pemesanan_data as $laporan_pemesanan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $laporan_pemesanan->tanggal ?></td>
		      <td><?php echo $laporan_pemesanan->id_jadwal ?></td>
		      <td><?php echo $laporan_pemesanan->tiket_terjual ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>