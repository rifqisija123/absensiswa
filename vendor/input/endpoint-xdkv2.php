<?php
require '../../validasi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uid = $_POST['uidxdkv2'];
    $namalengkap = $_POST['namalengkapxdkv2'];
    $kelas = $_POST['kelasxdkv2'];
    $jurusan = $_POST['jurusanxdkv2'];
    $tanggalabsen = date('Y-m-d');
    $keterangan = $_POST['absenxdkv2'];

    $query = "INSERT INTO dataabsenxdkv2 (uid, namalengkap, kelas, jurusan, tanggalabsen, jammasuk, keterangan) 
              VALUES ('$uid', '$namalengkap', '$kelas', '$jurusan', '$tanggalabsen', CURRENT_TIME(), '$keterangan')";
    
    if (mysqli_query($conn, $query)) {
        header('Location:../../pages_admin/belumabsenxdkv2.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>