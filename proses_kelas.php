<?php
    include "koneksi.php";
    session_start();

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == 'simpan'){
            $kode_kelas = $_POST['kode_kelas'];
            $nama_kelas = $_POST['nama_kelas'];

            $query  = "INSERT INTO tblkelas VALUES(NULL,'$kode_kelas', '$nama_kelas');";
            $sql    = mysqli_query($conn,$query);
            if($sql){
                $_SESSION['alert'] = "Anda telah menambahkan data baru.";
                header ('location: data_kelas.php');
            }else{
                echo $sql;
            }
        }else if($_POST['aksi'] == 'update'){
            $id_kelas   = $_POST['id_kelas'];
            $kode_kelas = $_POST['kode_kelas'];
            $nama_kelas = $_POST['nama_kelas'];

            $query2     = "UPDATE tblkelas SET id_kelas='$id_kelas', kode_kelas='$kode_kelas', nama_kelas='$nama_kelas' WHERE id_kelas = '$id_kelas';";
            $sql        = mysqli_query($conn, $query2);
            if($sql){
                $_SESSION['alert'] = "Anda telah melakukan update data.";
                header ('location: data_kelas.php');
            }else{
                echo $sql;
            }
        }
    }

    if(isset($_GET['hapus'])){
        $id_kelas = $_GET['hapus'];

        $query      = "DELETE FROM tblkelas WHERE id_kelas = '$id_kelas';";
        $sql        = mysqli_query($conn, $query);
        if($sql){
            $_SESSION['alert'] = "Anda telah menghapus data.";
            header ('location: data_kelas.php');
        }else{
            echo $sql;
        }
    }
?>