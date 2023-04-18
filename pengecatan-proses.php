<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses pengecatan</title>
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
    <?php
        $tanggal =$_POST['tanggal'];
        $bulan =$_POST['bulan'];
        $tahun =$_POST['tahun'];
        $panjang =trim($_POST['panjang']);
        $lebar =trim($_POST['lebar']);
        $tinggi =trim($_POST['tinggi']);
        $bayar =$_POST['bayar'];


        if(empty($panjang) or empty($lebar) or empty($tinggi)) {
            echo '<h1>gagal divalidasi</h1>';
            echo '<p>silahkan isi semua dengan benar !</p>';
            echo '<p><a href="pengecatan-input.php" class="button">kembali</a></p>';
            die();
        };

        if(!is_numeric($panjang) or !is_numeric($lebar) or !is_numeric($tinggi)
             or $panjang <0 or $lebar <0 or $tinggi <0) {
            echo '<h1>gagal divalidasi</h1>';
            echo '<p>silahkan isi semua dengan benar !</p>';
            echo '<p><a href="pengecatan-input.php" class="button">kembali</a></p>';
            die();
        };

        $luasTembokPanjang = 2 * $panjang * $tinggi;
        $luasTembokPendek = 2 * $lebar * $tinggi;
        $luasLangit = $lebar * $panjang;
        $luasTotalArea = $luasTembokPanjang + $luasTembokPendek + $luasLangit;
        $biayaCat = $luasTotalArea /150 * 200000;
        $biayaTenagaKerja = $luasTotalArea /30 * 20000;
        $totalBiaya = $biayaCat + $biayaTenagaKerja;
        $record = $tanggal ."#". $bulan ."#". $tahun ."#". $panjang ."#". $lebar ."#". 
        $tinggi ."#". $bayar ."#". $biayaCat ."#". $biayaTenagaKerja ."#". $totalBiaya ."\n";

        $file = 'pengecatan.txt';
        $bukaFile = fopen($file, "a", true);
        $tulisFile = fputs($bukaFile, $record);

        if(fclose($bukaFile)) {
        ?>
        <h1>Catatan Berhasil disimpan</h1>
        <p>terima kasih !</p>
        <p>
            <a href="pengecatan-input.php" class="button">tambah lagi</a>
            <a href="pengecatan-tampil.php" class="button">lihat catatan</a>
        </p>
        <?php } else { ?>
        <h1>Catatan Gagal disimpan</h1>
        <p>eror !</p>
        <p>
            <a href="pengecatan-input.php" class="button">ulangi lagi</a>
            <a href="pengecatan-tampil.php" class="button">lihat catatan</a>
        </p>
        
<?php } ?>
</body>
</html>