<?php
require '../../validasi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uid = $_POST['uidxdkv1'];
    $namalengkap = $_POST['namalengkapxdkv1'];
    $kelas = $_POST['kelasxdkv1'];
    $jurusan = $_POST['jurusanxdkv1'];
    $tanggalabsen = date('Y-m-d');
    $keterangan = $_POST['absenxdkv1'];

    $query = "INSERT INTO dataabsenxdkv1 (uid, namalengkap, kelas, jurusan, tanggalabsen, jammasuk, keterangan) 
              VALUES ('$uid', '$namalengkap', '$kelas', '$jurusan', '$tanggalabsen', CURRENT_TIME(), '$keterangan')";
    
    if (mysqli_query($conn, $query)) {
        header('Location:../../pages_admin/belumabsenxdkv1.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>