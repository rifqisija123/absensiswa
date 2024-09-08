<?php
require 'validasi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uid = $_POST['uidxisija1'];
    $namalengkap = $_POST['namalengkapxisija1'];
    $kelas = $_POST['kelasxisija1'];
    $jurusan = $_POST['jurusanxisija1'];
    $tanggalabsen = date('Y-m-d');
    $keterangan = $_POST['absenxisija1'];

    $query = "INSERT INTO dataabsenxisija1 (uid, namalengkap, kelas, jurusan, tanggalabsen, jammasuk, keterangan) 
              VALUES ('$uid', '$namalengkap', '$kelas', '$jurusan', '$tanggalabsen', CURRENT_TIME(), '$keterangan')";
    
    if (mysqli_query($conn, $query)) {
        header('Location:tables/belumabsenxisija1.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>