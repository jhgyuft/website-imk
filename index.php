<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    // ambil id terbesar di kolom id pendaftaran
    $getMaxId = mysqli_query($conn, "SELECT MAX(RIGHT(id_pendaftaran, 5)) AS id FROM tb_pendaftaran");
    $d = mysqli_fetch_object($getMaxId);
    $generateId = 'p' . date('Y') . sprintf("%05s", $d->id + 1);

    $insert = mysqli_query($conn, "INSERT INTO tb_pendaftaran VALUES (
            '" . $generateId . "',
            '" . date('Y-m-d') . "',
            '" . $_POST['th_ajaran'] . "',
            '" . $_POST['jurusan'] . "',
            '" . $_POST['nm'] . "',
            '" . $_POST['tmp_lahir'] . "',
            '" . $_POST['tgl_lahir'] . "',
            '" . $_POST['jk'] . "',
            '" . $_POST['agama'] . "',
            '" . $_POST['almt_peserta'] . "'
        )");

    if ($insert) {
        $newId = mysqli_insert_id($conn);
        echo '<script>window.location="berhasil.php?id=' . $newId . '"</script>';
    } else {
        echo 'huft ' . mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pendaftaran calon siswa</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>

    <section class="box_formulir">
        <h2>Formulir Pendaftaran Siswa Baru</h2>

        <form action="" method="post">
            <div class="box">
                <table border="0" class="tabel_form">
                    <tr>
                        <td>Tahun Ajaran</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="th_ajaran" class="input-control" value="2020/2021" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td>:</td>
                        <td>
                            <select class="input-control" name="jurusan">
                                <option value="">--Pilih--</option>
                                <option value="Teknik Otomotif">Teknik Otomotif</option>
                                <option value="Teknik Las">Teknik Las</option>
                            </select>

                        </td>
                    </tr>
                </table>
            </div>
            <h3>Data Diri Calon Siswa</h3>
            <div class="box">
                <table border="0" class="tabel_form">
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="nm" class="input-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="tmp_lahir" class="input-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td>
                            <input type="date" name="tgl_lahir" class="input-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>
                            <input type="radio" name="jk" class="input-control" value="Laki-laki">Laki-laki &nbsp;
                            &nbsp; &nbsp;
                            <input type="radio" name="jk" class="input-control" value="Perempuan">Perempuan
                        </td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td>
                            <select class="input-control" name="agama">
                                <option value="">--Pilih--</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Konghuchu">Konghuchu</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>
                            <textarea class="input-control" name="almt_peserta"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>:</td>
                        <td>
                            <input type="submit" name="submit" class="btn-daftar" value="daftar sekarang">
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </section>
</body>

</html>