<?php
require '../validasi.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];

    $hapus = mysqli_query($conn, "DELETE FROM users WHERE id='$id'");
    if($hapus){
        $_SESSION['success'] = 'Data berhasil dihapus.';
        header('Location: user-management.php');
    } else {
        $_SESSION['error'] = 'Gagal menghapus data.';
        header('Location: user-management.php');
    }
}
?>