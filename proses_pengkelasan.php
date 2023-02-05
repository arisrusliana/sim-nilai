<?php
include "koneksi.php";
session_start();

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == 'simpan') {
        $kode_kelas     = $_POST['kd_kelas'];
        $nisn           = $_POST['nisn'];

        $query          = "INSERT INTO tblpengkelasan VALUES(NULL,'$kode_kelas', '$nisn');";
        $sql            = mysqli_query($conn, $query);
        if ($sql) {
            $_SESSION['alert'] = "Anda telah menambahkan data baru.";
            header('location: data_pengkelasan.php');
        } else {
            echo $sql;
        }
    } else if ($_POST['aksi'] == 'update') {
        $id_pengkelasan = $_POST['id_pengkelasan'];
        $kode_kelas     = $_POST['kd_kelas'];
        $nisn           = $_POST['nisn'];

        $query          = "UPDATE tblpengkelasan SET kode_kelas='$kode_kelas',nis='$nisn' WHERE id_pengkelasan='$id_pengkelasan';";
        $sql            = mysqli_query($conn, $query);
        if ($sql) {
            $_SESSION['alert'] = "Anda telah melakukan update data.";
            header('location: data_pengkelasan.php');
        } else {
            echo $sql;
        }
    }
}
if (isset($_GET['hapus'])) {
    $kode_kelas     = $_GET['hapus'];

    $query      = "DELETE FROM tblpengkelasan WHERE kd_kelas='$kode_kelas';";
    $sql        = mysqli_query($conn, $query);
    if ($sql) {
        $_SESSION['alert'] = "Anda telah menghapus data.";
        header('location: data_pengkelasan.php');
    } else {
        echo $sql;
    }
}
