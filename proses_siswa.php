<?php
include "koneksi.php";
session_start();

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == 'simpan') {
        $nis            = $_POST['nis'];
        $password       = $_POST['password'];
        $nama_siswa     = $_POST['nama_siswa'];
        $jenis_kelamin  = $_POST['jenis_kelamin'];
        $tempat_lahir   = $_POST['tempat_lahir'];
        $tanggal_lahir  = $_POST['tanggal_lahir'];
        $alamat         = $_POST['alamat'];
        $kota           = $_POST['kota'];
        $nama_ayah      = $_POST['nama_ayah'];
        $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
        $nama_ibu       = $_POST['nama_ibu'];
        $pekerjaan_ibu  = $_POST['pekerjaan_ibu'];
        $alamat_ortu    = $_POST['alamat_ortu'];

        $query      = "INSERT INTO tblsiswa VALUES(NULL,'$nis','$password','$nama_siswa','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$alamat','$kota','$nama_ayah','$pekerjaan_ayah','$nama_ibu','$pekerjaan_ibu','$alamat_ortu');";
        $sql        = mysqli_query($conn, $query);
        if ($sql) {
            $_SESSION['alert'] = "Anda telah nenambahkan data baru.";
            header('location: data_siswa.php');
        } else {
            echo $sql;
        }
    }else if($_POST['aksi'] == 'edit'){
        $id_nis         = $_POST['id_nis'];
        // $nis            = $_POST['nis'];
        $password       = $_POST['password'];
        $nama_siswa     = $_POST['nama_siswa'];
        $jenis_kelamin  = $_POST['jenis_kelamin'];
        $tempat_lahir   = $_POST['tempat_lahir'];
        $tanggal_lahir  = $_POST['tanggal_lahir'];
        $alamat         = $_POST['alamat'];
        $kota           = $_POST['kota'];
        $nama_ayah      = $_POST['nama_ayah'];
        $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
        $nama_ibu       = $_POST['nama_ibu'];
        $pekerjaan_ibu  = $_POST['pekerjaan_ibu'];
        $alamat_ortu    = $_POST['alamat_ortu'];
        
        $query2     = "UPDATE tblsiswa SET id_nis='$id_nis', password='$password', nama_siswa='$nama_siswa', jk='$jenis_kelamin', tempat_lahir='$tempat_lahir', tgl_lahir='$tanggal_lahir', alamat_siswa='$alamat', kota='$kota', nama_ayah='$nama_ayah', pekerjaan_ayah='$pekerjaan_ayah', nama_ibu='$nama_ibu', pekerjaan_ibu='$pekerjaan_ibu', alamat_ortu='$alamat_ortu' WHERE id_nis='$id_nis';";
        $sql        = mysqli_query($conn, $query2);
        
        if ($sql) {
            $_SESSION['alert'] = "Anda telah melakukan update data.";
            header('location: data_siswa.php');
        } else {
            echo $sql;
        }
    }
}


if (isset($_GET['hapus'])) {
    $id_nis       = $_GET['hapus'];
    $query      = "DELETE FROM tblsiswa WHERE id_nis = '$id_nis'";
    $sql        = mysqli_query($conn, $query);
    if ($sql) {
        $_SESSION['alert'] = "Anda telah menghapus data.";
        header('location: data_siswa.php');
    } else {
        echo $sql;
    }
}
