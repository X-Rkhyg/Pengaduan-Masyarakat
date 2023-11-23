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

    <?php
    // jika hari = Tuesday maka hari = selasa
    $hari = date('l');
    if ($hari == "Tuesday") {
        $hari = "SELASA";
    } elseif ($hari == "Wednesday") {
        $hari = "RABU";
    } elseif ($hari == "Thursday") {
        $hari = "KAMIS";
    } elseif ($hari == "Friday") {
        $hari = "JUMAT";
    } elseif ($hari == "Saturday") {
        $hari = "SABTU";
    } elseif ($hari == "Sunday") {
        $hari = "MINGGU";
    } else {
        $hari = "SENIN";
    }
    ?>

<?php
    $bulan = date('m');
    if ($bulan == "1") {
        $bulan = "JANUARI";
    } elseif ($bulan == "2") {
        $bulan = "FEBRUARI";
    } elseif ($bulan == "3") {
        $bulan = "MARET";
    } elseif ($bulan == "4") {
        $bulan = "APRIL";
    } elseif ($bulan == "5") {
        $bulan = "MEI";
    } elseif ($bulan == "6") {
        $bulan = "JUNI";
    } elseif ($bulan == "7") {
        $bulan = "JULI";
    } elseif ($bulan == "8") {
        $bulan = "AGUSTUS";
    } elseif ($bulan == "9") {
        $bulan = "SEPTEMBER";
    } elseif ($bulan == "10") {
        $bulan = "OKTOBER";
    } elseif ($bulan == "11") {
        $bulan = "NOVEMBER";
    } else {
        $bulan = "DESEMBER";
    }

    ?>


    <center>
        <div class="row">
            <div class="col-12">
                <h1>LAPORAN PENGADUAN MASYARAKAT</h1>
                <h1>
                    <?php
                    if ($waktu == "hari") {
                        echo ($hari . ' ' . $tanggal . ' ' . $bulan . ' ' . $tahun);
                    } elseif ($waktu == "bulan") {
                        echo ($bulan . ' ' . $tahun);
                    } elseif ($waktu == "tahun") {
                        echo ('TAHUN ' . $tahun);
                    } elseif ($waktu == "keseluruhan") {
                    }
                    ?>
                </h1>

                <h1>
                    <?php
                    if ($status == "0") {
                        echo ('BELUM DIVALIDASI');
                    } elseif ($status == "1") {
                        echo ('SUDAH DIVALIDASI');
                    } elseif ($status == "2") {
                        echo ('SUDAH DITANGGAPI');
                    } elseif ($status == "ditolak") {
                        echo ('DITOLAK');
                    } elseif ($status == "keseluruhan") {
                        echo ('KESELURUHAN');
                    }
                    ?>
                    <hr />
                </h1>

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
            <td>
                <p style="width: 100px; word-wrap:break-word;"><?= $p['judul']; ?></p>
            </td>
            <td>
                <p style="width: 200px; word-wrap:break-word;"><?= $p['isi_laporan']; ?></p>
            </td>
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