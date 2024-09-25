<?php
require '../../validasi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uid = $_POST['uidxdkv3'];
    $namalengkap = $_POST['namalengkapxdkv3'];
    $kelas = $_POST['kelasxdkv3'];
    $jurusan = $_POST['jurusanxdkv3'];
    $tanggalabsen = date('Y-m-d');
    $keterangan = $_POST['absenxdkv3'];

    $query = "INSERT INTO dataabsenxdkv3 (uid, namalengkap, kelas, jurusan, tanggalabsen, jammasuk, keterangan) 
              VALUES ('$uid', '$namalengkap', '$kelas', '$jurusan', '$tanggalabsen', CURRENT_TIME(), '$keterangan')";
    
    if (mysqli_query($conn, $query)) {
        header('Location:../../pages_admin/belumabsenxdkv3.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>