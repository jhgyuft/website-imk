<?php
include 'koneksi.php';

$id_pendaftaran = isset($_GET['id']) ? $_GET['id'] : '';

if (!empty($id_pendaftaran)) {
    $query = "SELECT * FROM tb_pendaftaran 
        WHERE id_pendaftaran = '$id_pendaftaran'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $kode_pendaftaran = $row['id_pendaftaran'];
    } else {
        $kode_pendaftaran = "Data tidak ditemukan";
    }
} else {
    $kode_pendaftaran = "ID Pendaftaran tidak valid";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Calon Siswa</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>

    <section class="box_formulir">
        <h2>Pendaftaran Berhasil</h2>

        <div class="box">
            <h4>Kode pendaftaran Anda adalah <?php echo $kode_pendaftaran; ?></h4>
            <a href="cetak-bukti.php?id=<?php echo $id_pendaftaran; ?>" target="_blank" class="btn-cetak">Cetak Bukti Daftar</a>
        </div>

    </section>
</body>

</html>