<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Stok Barang</title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="<?= base_url ?>/dist/js/normalize.min.css">
    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="<?= base_url ?>/dist/css/paper.css">
    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style type="text/css" media="print">
        @page {
            size: auto;
            /* auto is the initial value */
            margin: 0mm;
            /* this affects the margin in the printer settings */
        }
    </style>
    <style>
        body {
            font-family: Calibri, sans-serif;
        }

        .sheet {
            padding: 15mm;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 18px;
            text-decoration: underline;
            margin-top: 20px;
        }

        .table {
            border: solid 1px #DDEEEE;
            border-collapse: collapse;
            border-spacing: 0;
            font: normal 13px Arial, sans-serif;
            width: 100%;
            margin-top: 20px;
        }

        .table thead th {
            background-color: #DDEFEF;
            border: solid 1px #DDEEEE;
            color: #336B6B;
            padding: 10px;
            text-align: left;
            text-shadow: 1px 1px 1px #fff;
        }

        .table tbody td {
            border: solid 1px #DDEEEE;
            color: #333;
            padding: 10px;
            text-shadow: 1px 1px 1px #fff;
        }
    </style>
</head>

<body class="A4 potrait">
    <section class="sheet">
        <!-- Header/Kop Surat -->
        <div class="header">
            <img src="<?= base_url ?>" alt="" style="width: 300px; height: auto;">
            <h2><b>MANAJEMEN DATA BARANG</b></h2>
            <h2><b>BARANG PLUS</b></h2>
        </div>

        <h1 style="text-align: center;">Laporan Stok Barang</h1>
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 10px">No</th>
                    <th>Id Stok Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Petugas</th>
                    <th>Supplier</th>
                    <th>Tanggal Masuk</th>
                    <th>Jumlah Barang</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data['stok_barang'] as $row) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row['id_stok']; ?></td>
                        <td><?= $row['id_barang']; ?></td>
                        <td><?= $row['id_kategori']; ?></td>
                        <td><?= $row['id_petugas']; ?></td>
                        <td><?= $row['id_supplier']; ?></td>
                        <td><?= $row['tgl_masuk']; ?></td>
                        <td><?= $row['jumlah_barang']; ?></td>
                    </tr>
                <?php $no++;
                endforeach; ?>
            </tbody>
        </table>
    </section>
    <script type="text/javascript">
        window.print();
        //window.onafterprint = window.close;
    </script>
</body>

</html>