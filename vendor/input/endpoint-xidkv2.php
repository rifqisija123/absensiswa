<?php
require '../../validasi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uid = $_POST['uidxidkv2'];
    $namalengkap = $_POST['namalengkapxidkv2'];
    $kelas = $_POST['kelasxidkv2'];
    $jurusan = $_POST['jurusanxidkv2'];
    $tanggalabsen = date('Y-m-d');
    $keterangan = $_POST['absenxidkv2'];

    $query = "INSERT INTO dataabsenxidkv2 (uid, namalengkap, kelas, jurusan, tanggalabsen, jammasuk, keterangan) 
              VALUES ('$uid', '$namalengkap', '$kelas', '$jurusan', '$tanggalabsen', CURRENT_TIME(), '$keterangan')";
    
    if (mysqli_query($conn, $query)) {
        header('Location:../../pages_admin/belumabsenxidkv2.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>