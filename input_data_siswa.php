<?php
include "koneksi.php";

$id_nis         = "";
$nis           = "";
$password       = "";
$nama_siswa     = "";
$jenis_kelamin  = "";
$tempat_lahir   = "";
$tanggal_lahir  = "";
$alamat         = "";
$kota           = "";
$nama_ayah      = "";
$pekerjaan_ayah = "";
$nama_ibu       = "";
$pekerjaan_ibu  = "";
$alamat_ortu    = "";

if (isset($_GET['edit'])) {
    $id_nis           = $_GET['edit'];
    $query          = "SELECT * FROM tblsiswa WHERE id_nis = '$id_nis';";
    $sql            = mysqli_query($conn, $query);
    $result         = mysqli_fetch_assoc($sql);
    $id_nis         = $result['id_nis'];
    $nis            = $result['nis'];
    $password       = $result['password'];
    $nama_siswa     = $result['nama_siswa'];
    $jenis_kelamin  = $result['jk'];
    $tempat_lahir   = $result['tempat_lahir'];
    $tanggal_lahir  = $result['tgl_lahir'];
    $alamat         = $result['alamat_siswa'];
    $kota           = $result['kota'];
    $nama_ayah      = $result['nama_ayah'];
    $pekerjaan_ayah = $result['pekerjaan_ayah'];
    $nama_ibu       = $result['nama_ibu'];
    $pekerjaan_ibu  = $result['pekerjaan_ibu'];
    $alamat_ortu    = $result['alamat_ortu'];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Nilai Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- our project just needs Font Awesome Solid + Brands -->
    <link href="../fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../fontawesome/css/brands.css" rel="stylesheet">
    <link href="../fontawesome/css/solid.css" rel="stylesheet">
</head>

<body>
    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <img src="smanra.png" width="3%" height="3%" />
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="data_pegawai.php">Data Pegawai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="data_siswa.php">Data Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data_pelajaran.php">Data Pelajaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data_kelas.php">Data Kelas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data_jadwal.php">Data Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data_pengkelasan.php">Data Pengkelasan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar end -->
    <!-- content start -->
    <div class="container">
        <div class="mt-3">
            <h2>Input Data Siswa</h2>
            <hr>
            <div class="container">
                <form action="proses_siswa.php" method="POST">
                    <div class="col-sm-1">
                        <input hidden type="text" id="id_nis" name="id_nis" class="form-control" placeholder="" value="<?php echo $id_nis; ?>" />
                    </div>
                    <div class="mb-3 row">
                        <label for="nisn" class="col-sm-2 col-form-label">NIS</label>
                        <?php
                        if (isset($_GET['edit'])) {
                        ?>
                            <div class="col-sm-8">
                                <input disabled type="text" id="nis" name="nis" class="form-control" placeholder="ex: 202206011" value="<?php echo $nis; ?>" />
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="col-sm-8">
                                <input type="text" id="nis" name="nis" class="form-control" placeholder="ex: 202206011" value="<?php echo $nis; ?>" />
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="text" id="password" name="password" class="form-control" placeholder="ex: 123456" value="<?php echo $password; ?>" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_siswa" class="col-sm-2 col-form-label">Nama Siswa</label>
                        <div class="col-sm-8">
                            <input type="text" id="nama_siswa" name="nama_siswa" class="form-control" placeholder="Azka Khairy Arfa" value="<?php echo $nama_siswa; ?>" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-select">
                                <option <?php if ($jenis_kelamin == 'Laki-laki') {
                                            echo 'selected';
                                        } ?>value="Laki-laki">Laki-laki</option>
                                <option <?php if ($jenis_kelamin == 'Perempuan') {
                                            echo 'selected';
                                        } ?> value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-8">
                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="ex: Majalengka" value="<?php echo $tempat_lahir; ?>" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-8">
                            <input type="text" id="tanggal_lahir" name="tanggal_lahir" class="form-control" placeholder="format: dd-mm-yyyy" value="<?php echo $tanggal_lahir; ?>" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo $alamat; ?></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                        <div class="col-sm-8">
                            <input type="text" id="kota" name="kota" class="form-control" placeholder="Majalengka" value="<?php echo $kota; ?>" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_ayah" class="col-sm-2 col-form-label">Nama Ayah</label>
                        <div class="col-sm-8">
                            <input type="text" id="nama_ayah" name="nama_ayah" class="form-control" placeholder="ex: Aris Rusliana" value="<?php echo $nama_ayah; ?>" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pekerjaan_ayah" class="col-sm-2 col-form-label">Pekerjaan Ayah</label>
                        <div class="col-sm-8">
                            <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" class="form-control" placeholder="Web Developer" value="<?php echo $pekerjaan_ayah; ?>" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_ibu" class="col-sm-2 col-form-label">Nama Ibu</label>
                        <div class="col-sm-8">
                            <input type="text" id="nama_ibu" name="nama_ibu" class="form-control" placeholder="ex: Fani Rizki Novita" value="<?php echo $nama_ibu; ?>" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pekerjaan_ibu" class="col-sm-2 col-form-label">Pekerjaan Ibu</label>
                        <div class="col-sm-8">
                            <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" class="form-control" placeholder="Mengurus Rumah Tangga" value="<?php echo $pekerjaan_ibu; ?>" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat_ortu" class="col-sm-2 col-form-label">Alamat Orang Tua</label>
                        <div class="col-sm-8">
                            <textarea id="alamat_ortu" name="alamat_ortu" class="form-control" rows="3"><?php echo $alamat_ortu; ?></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                            <?php
                            if (isset($_GET['edit'])) {
                            ?>
                                <button type="submit" name="aksi" value="edit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Update</button>
                            <?php
                            } else {
                            ?>
                                <button type="submit" name="aksi" value="simpan" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                            <?php
                            }
                            ?>
                            <a href="data_siswa.php" type="button" class="btn btn-danger"><i class="fa-regular fa-reply"></i> Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- content end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>