<?php
include "koneksi.php";
session_start();

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == 'simpan') {
        $nip            = $_POST['nip'];
        $password       = $_POST['password'];
        $nama_pegawai   = $_POST['nama_pegawai'];
        $jabatan        = $_POST['jabatan'];
        $jk             = $_POST['jenis_kelamin'];
        $tempat_lahir   = $_POST['tempat_lahir'];
        $tgl_lahir      = $_POST['tanggal_lahir'];
        $alamat         = $_POST['alamat'];
        $kota           = $_POST['kota'];

        $query      = "INSERT INTO tblpegawai VALUES (NULL,'$nip','$password','$nama_pegawai','$jabatan','$jk','$tempat_lahir','$tgl_lahir','$alamat','$kota')";
        $sql        = mysqli_query($conn, $query);
        if ($sql) {
            $_SESSION['alert'] = "Anda telah menambahkan data baru.";
            header('location: data_pegawai.php');
        } else {
            echo $sql;
        }
    } else if ($_POST['aksi'] == 'update') {
        $id_nip         = $_POST['id_nip'];
        $password       = $_POST['password'];
        $nama_pegawai   = $_POST['nama_pegawai'];
        $jabatan        = $_POST['jabatan'];
        $jk             = $_POST['jenis_kelamin'];
        $tempat_lahir   = $_POST['tempat_lahir'];
        $tgl_lahir      = $_POST['tanggal_lahir'];
        $alamat         = $_POST['alamat'];
        $kota           = $_POST['kota'];

        $query      = "UPDATE tblpegawai SET id_nip='$id_nip', password='$password', nama_pegawai='$nama_pegawai', jabatan='$jabatan', jenis_kelamin='$jk', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', alamat='$alamat', kota='$kota' WHERE id_nip='$id_nip';";
        $sql        = mysqli_query($conn, $query);
        if ($sql) {
            $_SESSION['alert'] = "Anda telah melakukan update data.";
            header('location: data_pegawai.php');
        } else {
            echo $sql;
        }
    }
}

if (isset($_GET['hapus'])){
        $id_nip     = $_GET['hapus'];
        $query      = "DELETE FROM tblpegawai WHERE id_nip = '$id_nip';";
        $sql        = mysqli_query($conn, $query);
        if ($sql) {
            $_SESSION['alert'] = "Anda telah menghapus data.";
            header('location: data_pegawai.php');
        } else {
            echo $sql;
        }
}
?>