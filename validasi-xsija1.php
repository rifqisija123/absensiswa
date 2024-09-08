<?php
require 'validasi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uid = $_POST['uidxsija1'];
    $namalengkap = $_POST['namalengkapxsija1'];
    $kelas = $_POST['kelasxsija1'];
    $jurusan = $_POST['jurusanxsija1'];
    $tanggalabsen = date('Y-m-d');
    $keterangan = $_POST['absenxsija1'];

    $query = "INSERT INTO dataabsenxsija1 (uid, namalengkap, kelas, jurusan, tanggalabsen, jammasuk, keterangan) 
              VALUES ('$uid', '$namalengkap', '$kelas', '$jurusan', '$tanggalabsen', CURRENT_TIME(), '$keterangan')";
    
    if (mysqli_query($conn, $query)) {
        header('Location:tables/belumabsenxsija1.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>