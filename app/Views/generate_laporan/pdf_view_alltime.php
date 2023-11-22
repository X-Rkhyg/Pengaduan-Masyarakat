<!DOCTYPE html>
<html>

<head>
    <style>
        .mt-3 {
            margin-top: 3rem;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>


    <center>
        <div class="row">
            <div class="col-12">
                <h1>LAPORAN PENGADUAN MASYARAKAT</h1>
                <hr />
            </div>
        </div>
    </center>

    <table id="customers" class="mt-3">
        <tr>
            <th>NO</th>
            <th>Tanggal</th>
            <th>Judul Laporan</th>
            <th>Isi Laporan</th>
            <th>Status</th>
        </tr>
        <tr>
            <?php $i = 1; ?>
            <?php foreach ($pengaduan as $p) : ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= date('d F Y', strtotime($p['tanggal_pengaduan'])); ?></td>
            <td><p style="width: 100px; word-wrap:break-word;"><?= $p['judul']; ?></p></td>
            <td><p style="width: 200px; word-wrap:break-word;"><?= $p['isi_laporan']; ?></p></td>
            <td>
                <?php if ($p['status'] == "0") : ?>
                    Pending
                <?php elseif ($p['status'] == "1") : ?>
                    Proses
                <?php elseif ($p['status'] == "2") : ?>
                    Selesai
                <?php elseif ($p['status'] == "3") : ?>
                    Ditolak
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tr>
    </table>

</body>

</html>