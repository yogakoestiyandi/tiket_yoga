-- view laporan jumlah surat bulanan
CREATE OR REPLACE
    VIEW laporan_penjualan
    AS
(
SELECT
        substring(tanggal_pemesanan,1,10) as tanggal,
        COUNT(id_pemesanan) AS tiket_terjual
    FROM
       pemesanan
    GROUP BY
         substring(tanggal_pemesanan,1,10)
    ORDER BY
         substring(tanggal_pemesanan,1,10)
    DESC
);