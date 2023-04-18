<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>daftar catatan</title>
    <style>
        .button {
            background-color: green;
            color: white;
            text-decoration: none;
            font-size: 14px;
            line-height: 1;
            border: none;
            border-radius: 8px;
            border-style: solid;
            border-color: black;
            padding: 8px 16px;
            margin: 8px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>daftar catatan pengecatan</h1>
    <table border="1px solid black">
        <tr>
            <th>tanggal</th>
            <th>panjang</th>
            <th>lebar</th>
            <th>tinggi</th>
            <th>pembayaran</th>
            <th>biaya cat</th>
            <th>biaya tk</th>
            <th>total</th>
        </tr>
        <?php
            $file = 'pengecatan.txt';
            $bukaFile = fopen($file, 'r');
            $tampilFile = fgets($bukaFile);
            
            while(!feof($bukaFile)) {
                list($tanggal, $bulan, $tahun, $panjang, $lebar, $tinggi, 
                $bayar, $biayaCat, $biayaTenagaKerja, $totalBiaya) = 
                explode("#", $tampilFile); ?>

            <tr>
                <td><?= $tanggal ?><?= $bulan ?><?= $tahun ?></td>
                <td><?= $panjang ?></td>
                <td><?= $lebar ?></td>
                <td><?= $tinggi ?></td>
                <td><?= $bayar ?></td>
                <td><?= $biayaCat ?></td>
                <td><?= $biayaTenagaKerja ?></td>
                <td><?= $totalBiaya ?></td>
            </tr>





            <?php
                $tampilFile = fgets($bukaFile);
                };
                fclose($bukaFile); 
            ?>
    </table>
    <p><a href="pengecatan-input.php" class="button">tambah pengecatan</a></p>
</body>
</html>