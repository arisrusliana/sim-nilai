<?php
include 'koneksi.php';
session_start();
$id_nip         = '';
$nip            = '';
$password       = '';
$nama_pegawai   = '';
$jabatan        = '';
$jk             = '';
$tempat_lahir   = '';
$tgl_lahir      = '';
$alamat         = '';
$kota           = '';

$urut   = 1;

$query  = "SELECT * FROM tblpegawai";
$sql    = mysqli_query($conn, $query);
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
            <h2>Data Pegawai</h2>
            <hr>
            <div>
                <a href="input_data_pegawai.php"><button class="btn btn-primary mt-4"><i class="fa-regular fa-plus"></i> Tambah Data</button></a>
            </div>
            <?php
                if(isset($_SESSION['alert'])):
            ?>
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    <strong>Berhasil! </strong>
                    <?php 
                        echo $_SESSION['alert'];
                    ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                session_destroy();
                endif;
            ?>
            <table class="table teble-responsive table-striped table-hover table-bordered mt-4">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th scope="col">
                            <center>#</center>
                        </th>
                        <th scope="col">
                            <center>NIP</center>
                        </th>
                        <th scope="col">
                            <center>Password</center>
                        </th>
                        <th scope="col">
                            <center>Nama Pegawai</center>
                        </th>
                        <th scope="col">
                            <center>Jabatan</center>
                        </th>
                        <th scope="col">
                            <center>Jenis Kelamin</center>
                        </th>
                        <th scope="col">
                            <center>Tempat Lahir</center>
                        </th>
                        <th scope="col">
                            <center>Tanggal Lahir</center>
                        </th>
                        <th scope="col">
                            <center>Alamat</center>
                        </th>
                        <th scope="col">
                            <center>Kota</center>
                        </th>
                        <th scope="col">
                            <center>Tools</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($result = mysqli_fetch_assoc($sql)) {
                    ?>
                        <tr>
                            <th scope="col">
                                <center>
                                    <?php
                                    echo $urut++;
                                    ?>
                                </center>
                            </th>
                            <th scope="col">
                                <center><?php echo $result['nip']; ?></center>
                            </th>
                            <th scope="col">
                                <center><?php echo $result['password']; ?></center>
                            </th>
                            <th scope="col">
                                <center><?php echo $result['nama_pegawai']; ?></center>
                            </th>
                            <th scope="col">
                                <center><?php echo $result['jabatan']; ?></center>
                            </th>
                            <th scope="col">
                                <center><?php echo $result['jenis_kelamin']; ?></center>
                            </th>
                            <th scope="col">
                                <center><?php echo $result['tempat_lahir']; ?></center>
                            </th>
                            <th scope="col">
                                <center><?php echo $result['tgl_lahir']; ?></center>
                            </th>
                            <th scope="col">
                                <center><?php echo $result['alamat']; ?></center>
                            </th>
                            <th scope="col">
                                <center><?php echo $result['kota']; ?></center>
                            </th>
                            <th scope="col">
                                <center>
                                    <a href="input_data_pegawai.php?edit=<?php echo $result['id_nip']; ?>"><button type="submit" class="btn btn-warning" value="edit"><i class="fa-regular fa-pencil"></i></button></a>
                                    <a href="proses_pegawai.php?hapus=<?php echo $result['id_nip']; ?>"><button type="submit" class="btn btn-danger" value="hapus" onclick="return confirm ('Apakah Anda yakin akan menghapus data?')"><i class="fa-regular fa-trash"></i></button></a>
                                </center>
                            </th>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- content end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>