<!DOCTYPE html>
<html>
<head>
    <title>Tittle</title>
    <style type="text/css" media="print">
    @page {
        margin: 0;  /* this affects the margin in the printer settings */
    }
      table{
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
      }
      table th{
          -webkit-print-color-adjust:exact;
        border: 1px solid;

                padding-top: 11px;
    padding-bottom: 11px;
    background-color: #a29bfe;
      }
   table td{
        border: 1px solid;

   }
        </style>
</head>
<body>
    <h3 align="center">DATA Detail Pemesanan</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
    <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Jadwal</th>
		<th>Id Oemesanan</th>
		<th>Nama</th>
		<th>Nomor Hp</th>
		<th>Jenis Kelamin</th>
		
            </tr><?php
            foreach ($detail_pemesanan_data as $detail_pemesanan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $detail_pemesanan->id_jadwal ?></td>
		      <td><?php echo $detail_pemesanan->id_oemesanan ?></td>
		      <td><?php echo $detail_pemesanan->nama ?></td>
		      <td><?php echo $detail_pemesanan->nomor_hp ?></td>
		      <td><?php echo $detail_pemesanan->jenis_kelamin ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
</body>
<script type="text/javascript">
      window.print()
    </script>
</html>