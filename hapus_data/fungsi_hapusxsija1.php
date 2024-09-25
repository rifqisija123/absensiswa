<?php
require '../validasi.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];

    $hapus = mysqli_query($conn, "DELETE FROM dataxsija1 WHERE iddatasija='$id'");
    if($hapus){
        $_SESSION['success'] = 'Data berhasil dihapus.';
        header('Location: dataxsija1.php');
    } else {
        $_SESSION['error'] = 'Gagal menghapus data.';
        header('Location: dataxsija1.php');
    }
}
?>