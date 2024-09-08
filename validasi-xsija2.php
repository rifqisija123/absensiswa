<?php
require 'validasi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uid = $_POST['uidxsija2'];
    $namalengkap = $_POST['namalengkapxsija2'];
    $kelas = $_POST['kelasxsija2'];
    $jurusan = $_POST['jurusanxsija2'];
    $tanggalabsen = date('Y-m-d');
    $keterangan = $_POST['absenxsija2'];

    $query = "INSERT INTO dataabsenxsija2 (uid, namalengkap, kelas, jurusan, tanggalabsen, jammasuk, keterangan) 
              VALUES ('$uid', '$namalengkap', '$kelas', '$jurusan', '$tanggalabsen', CURRENT_TIME(), '$keterangan')";
    
    if (mysqli_query($conn, $query)) {
        header('Location:tables/belumabsenxsija2.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>