<?php
include "koneksi.php";
$id_pengkelasan  = "";
if (isset($_GET['edit'])) {
    $id_pengkelasan = $_GET['edit'];
    $query      = "SELECT * FROM tblpengkelasan WHERE id_pengkelasan = '$id_pengkelasan';";
    $sql        = mysqli_query($conn, $query);
    $result     = mysqli_fetch_assoc($sql);
    $id_pengkelasan = $result['id_pengkelasan'];
}
$querykelas = "SELECT * FROM tblkelas;";
$sqlkelas   = mysqli_query($conn, $querykelas);

$querynisn  = "SELECT * FROM tblsiswa;";
$sqlnisn    = mysqli_query($conn, $querynisn);
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
                        <a class="nav-link" href="data_siswa.php">Data Siswa</a>
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
                        <a class="nav-link active" aria-current="page" href="data_pengkelasan.php">Data Pengkelasan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar end -->
    <!-- content start -->
    <div class="container">
        <div class="mt-3">
            <h2>Input Data Pengkelasan</h2>
            <hr>
            <div class="container">
                <form action="proses_pengkelasan.php" method="POST">
                    <div class="col-sm-8">
                        <input hidden type="text" id="id_pengkelasan" name="id_pengkelasan" class="form-control" value="<?php echo $id_pengkelasan; ?>" />
                    </div>
                    <div class="mb-3 row">
                        <label for="kd_kelas" class="col-sm-2 col-form-label">Kode Kelas</label>
                        <?php
                        if (isset($_GET['edit'])) {
                        ?>
                            <div class="col-sm-8">
                                <select id="kd_kelas" name="kd_kelas" class="form-select">
                                    <?php
                                    while ($resultkelas = mysqli_fetch_assoc($sqlkelas)) {
                                    ?>
                                        <option value="<?php echo $resultkelas['kode_kelas']; ?>"><?php echo $resultkelas['kode_kelas']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="col-sm-8">
                                <select id="kd_kelas" name="kd_kelas" class="form-select">
                                    <?php
                                    while ($resultkelas = mysqli_fetch_assoc($sqlkelas)) {
                                    ?>
                                        <option value="<?php echo $resultkelas['kode_kelas']; ?>"><?php echo $resultkelas['kode_kelas']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="mb-3 row">
                        <label for="nisn" class="col-sm-2 col-form-label">NIS</label>
                        <div class="col-sm-8">
                            <select id="nisn" name="nisn" class="form-select">
                                <?php
                                while ($resultnisn = mysqli_fetch_assoc($sqlnisn)) {
                                ?>
                                    <option value="<?php echo $resultnisn['nis']; ?>"><?php echo $resultnisn['nis']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-10">
                        <?php
                        if (isset($_GET['edit'])) {
                        ?>
                            <button name="aksi" value="update" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Update</button>
                        <?php
                        } else {
                        ?>
                            <button name="aksi" value="simpan" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Simpan</button>
                        <?php
                        }
                        ?>
                        <a href="data_pengkelasan.php" class="btn btn-danger"><i class="fa-regular fa-reply"></i> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- content end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>