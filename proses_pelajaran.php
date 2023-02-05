<?php
    include "koneksi.php";
    session_start();

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == 'simpan'){
            $kd_pelajaran   = $_POST['kd_mapel'];
            $nama_pelajaran = $_POST['nm_mapel'];
            $semester       = $_POST['semester'];

            $query  = "INSERT INTO tblpelajaran VALUES (NULL,'$kd_pelajaran', '$nama_pelajaran', '$semester');";
            $sql    = mysqli_query($conn, $query);
            if($sql){
                $_SESSION['alert'] = "Anda telah menambahkan data baru.";
                header('location: data_pelajaran.php');
            }else{
                echo $sql;
            }
        }else if ($_POST['aksi'] == 'update'){
            $id_pelajaran   = $_POST['id_mapel'];
            $nama_pelajaran = $_POST['nm_mapel'];
            $semester       = $_POST['semester'];

            $query2 = "UPDATE tblpelajaran SET id_pelajaran='$id_pelajaran', nama_pelajaran='$nama_pelajaran', semester='$semester' WHERE id_pelajaran='$id_pelajaran';";
            $sql    = mysqli_query($conn, $query2);
            if($sql){
                $_SESSION['alert'] = "Anda telah melakukan update data.";
                header('location: data_pelajaran.php');
            }else{
                echo $sql;
            }
        }
    }

    if(isset($_GET['hapus'])){
        $id_pelajaran   = $_GET['hapus'];
        $query          = "DELETE FROM tblpelajaran WHERE id_pelajaran = '$id_pelajaran';";
        $sql            = mysqli_query($conn, $query);
        if($sql){
            $_SESSION['alert'] = "Anda telah menghapus data.";
            header ('location: data_pelajaran.php');
        }else{
            echo $sql;
        }
    }
?>