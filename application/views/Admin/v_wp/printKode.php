<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Pasar</title>
    <style type="text/css">
        body {
            font-family: 'Times New Roman', serif;
            background-color: #fff;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 100%;
            margin: 0 auto;
        }
        .rangkasurat {
            width: 100%;
            margin: 0 0 20px 0;
            background-color: #fff;
            padding: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        h4 {
            text-align: center;
            margin: 0 0 20px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="rangkasurat">
            <h4><b><u>LAPORAN DATA PASAR</u></b></h4>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Kode Pasar</th>
                        <th>Nama Pasar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datapasar as $key): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($key->id_pasar); ?></td>
                            <td><?php echo htmlspecialchars($key->nama_pasar); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
