<?php
require '../validasi.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];

    $hapus = mysqli_query($conn, "DELETE FROM dataxiidkv3 WHERE iddatadkv='$id'");
    if($hapus){
        $_SESSION['success'] = 'Data berhasil dihapus.';
        header('Location: dataxiidkv3.php');
    } else {
        $_SESSION['error'] = 'Gagal menghapus data.';
        header('Location: dataxiidkv3.php');
    }
}
?>