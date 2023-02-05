<?php
include "koneksi.php";
session_start();

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == 'simpan') {
        $kode_jadwal    = $_POST['kd_jadwal'];
        $kode_kelas     = $_POST['kd_kelas'];
        $kode_pelajaran = $_POST['kd_mapel'];
        $nip            = $_POST['nip'];

        $query      = "INSERT INTO tbljadwal VALUES (NULL,'$kode_jadwal','$kode_kelas','$kode_pelajaran','$nip');";
        $sql        = mysqli_query($conn, $query);
        if ($sql) {
            $_SESSION['alert'] = "Anda telah menambahkan data baru.";
            header('location: data_jadwal.php');
        } else {
            echo $sql;
        }
    } else if ($_POST['aksi'] == 'update') {
        $id_jadwal      = $_POST['id_jadwal'];
        $kode_jadwal    = $_POST['kd_jadwal'];
        $kode_kelas     = $_POST['kd_kelas'];
        $kode_pelajaran = $_POST['kd_mapel'];
        $nip            = $_POST['nip'];

        $query      = "UPDATE tbljadwal SET id_jadwal='$id_jadwal', kode_jadwal='$kode_jadwal', kode_kelas='$kode_kelas', kode_pelajaran='$kode_pelajaran', nip='$nip' WHERE id_jadwal='$id_jadwal';";
        $sql        = mysqli_query($conn, $query);
        if ($sql) {
            $_SESSION['alert'] = "Anda telah melakukan update data.";
            header('location: data_jadwal.php');
        } else {
            echo $sql;
        }
    }
}

if(isset($_GET['hapus'])){
    $kode_jadwal    = $_GET['hapus'];
    $query          = "DELETE FROM tbljadwal WHERE id_jadwal='$id_jadwal';";
    $sql            = mysqli_query($conn,$query);
    if ($sql) {
        $_SESSION['alert'] = "Anda telah menghapus data.";
        header('location: data_jadwal.php');
    } else {
        echo $sql;
    }
}