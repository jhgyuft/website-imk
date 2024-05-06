<?php
session_start();
include 'koneksi.php';
if($_SESSION['stat_login'] != true){
    echo '<script>window.location="login.php"</script>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSB Online | Administrator</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <h1><a href="beranda.php">Admin PSB</a></h1>
        <ul>
            <li><a href="beranda.php">Beranda</a></li>
            <li><a href="data-peserta.php">Data Peserta</a></li>
            <li><a href="keluar.php">Keluar</a></li>
        </ul>
    </header>
    <section class="content">
        <h2>Data Peserta</h2>
        <div class="box">
            <a href="cetak_peserta.php" target="_blank" class="btn-cetak">Print</a>
            <table class="table" border="1">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Id Pendaftaran</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        $list_peserta =mysqli_query($conn, "SELECT * FROM tb_pendaftaran");
                        while($row = mysqli_fetch_array($list_peserta)){

                        
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['id_pendaftaran']?></td>
                        <td><?php echo $row['nm_peserta']?></td>
                        <td><?php echo $row['jk']?></td>
                        <td>
                            <a href="detail-peserta.php?id=<?php echo $row['id_pendaftaran']?>">Detail</a> ||
                            <a href="hapus-peserta.php?id=<?php echo $row['id_pendaftaran']?> "onclick="return confirm('yakin hapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>