<!DOCTYPE html>
<html>

<head>
    <title style='text-align: center;'>prediksiBrown_pdf</title>
</head>

<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            margin: 10px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 10px 10px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }

        .tengah {
            text-align: center;
        }
    </style>
    <h3 style='text-align: center;'>Hasil Peramalan Jumlah Siswa Metode Brown's DES</h3>
    <table>
        <tr>
            <th>Periode</th>
            <th>Tahun</th>
            <th>Jumlah Siswa</th>
        </tr>
        <?php
        // koneksi database
        $koneksi = mysqli_connect("localhost", "root", "", "db_des");

        // menampilkan data ramalan
        $data = mysqli_query($koneksi, "select * from hitung_brown");
        while ($dt = mysqli_fetch_array($data)) {
        ?>
            <tr style='text-align: center;'>
                <td><?php echo $dt['periode'] ?></td>
                <td><?php echo $dt['tahun']; ?></td>
                <td><?php echo $dt['nilai_ramal']; ?></td>

            </tr>
        <?php
        }
        ?>
    </table>

    <script>
        window.print();
    </script>
</body>

</html>