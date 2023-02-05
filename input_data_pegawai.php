<!DOCTYPE html>

<?php
include "koneksi.php";

$id_nip         = '';
$nip            = '';
$password       = '';
$nama_pegawai   = '';
$jabatan        = '';
$jenis_kelamin  = '';
$tempat_lahir   = '';
$tgl_lahir      = '';
$alamat         = '';
$kota           = '';

if (isset($_GET['edit'])) {
    $id_nip    = $_GET['edit'];

    $query          = "SELECT * FROM tblpegawai WHERE id_nip='$id_nip';";
    $sql            = mysqli_query($conn, $query);
    $result         = mysqli_fetch_assoc($sql);
    
    $id_nip         = $result['id_nip'];
    $nip            = $result['nip'];
    $password       = $result['password'];
    $nama_pegawai   = $result['nama_pegawai'];
    $jabatan        = $result['jabatan'];
    $jenis_kelamin  = $result['jenis_kelamin'];
    $tempat_lahir   = $result['tempat_lahir'];
    $tgl_lahir      = $result['tgl_lahir'];
    $alamat         = $result['alamat'];
    $kota           = $result['kota'];
}
?>

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
                        <a class="nav-link active" aria-current="page" href="data_pegawai.php">Data Pegawai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data_siswa.php">Data Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data_pelajaran.php">Data Pelajaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data_kelas.php">Data Kelas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data_jadwal.html">Data Jadwal</a>
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
            <h2>Input Data Pegawai</h2>
            <hr>
            <div class="container">
                <form action="proses_pegawai.php" method="POST">
                <div class="mb-3 row"><div class="col-sm-8">
                            <input hidden type="text" id="id_nip" name="id_nip" class="form-control" value="<?php echo $id_nip; ?>" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                        <?php
                        if (isset($_GET['edit'])) {
                        ?>
                            <div class="col-sm-8">
                                <input disabled type="text" id="nip" name="nip" class="form-control" placeholder="ex: 20200131 1 001" value="<?php echo $nip; ?>" />
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="col-sm-8">
                                <input type="text" id="nip" name="nip" class="form-control" placeholder="ex: 20200131 1 001" value="<?php echo $nip; ?>" />
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
                        <label for="nama_pegawai" class="col-sm-2 col-form-label">Nama Pegawai</label>
                        <div class="col-sm-8">
                            <input type="text" id="nama_pegawai" name="nama_pegawai" class="form-control" placeholder="ex: Aris Rusliana" value="<?php echo $nama_pegawai; ?>" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-8">
                            <input type="text" id="jabatan" name="jabatan" class="form-control" placeholder="ex: Guru" value="<?php echo $jabatan; ?>" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-select">
                                <option <?php if ($jenis_kelamin == 'Laki-laki') {
                                            echo 'selected';
                                        } ?>>Laki-laki</option>
                                <option <?php if ($jenis_kelamin == 'Perempuan') {
                                            echo 'selected';
                                        } ?>>Perempuan</option>
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
                            <input type="text" id="tanggal_lahir" name="tanggal_lahir" class="form-control" placeholder="format: dd-mm-yyyy" value="<?php echo $tgl_lahir; ?>" />
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
                            <input type="text" id="kota" name="kota" class="form-control" value="<?php echo $kota; ?>" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                            <?php
                            if (isset($_GET['edit'])) {
                            ?>
                                <button type="submit" name="aksi" value="update" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Update</button>
                            <?php
                            } else {
                            ?>
                                <button type="submit" name="aksi" value="simpan" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Simpan</button>
                            <?php
                            }
                            ?>
                            <a href="data_pegawai.php" type="button" class="btn btn-danger"><i class="fa-regular fa-reply"></i> Batal</a>
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