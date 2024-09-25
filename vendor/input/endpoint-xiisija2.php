<?php
require '../../validasi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uid = $_POST['uidxiisija2'];
    $namalengkap = $_POST['namalengkapxiisija2'];
    $kelas = $_POST['kelasxiisija2'];
    $jurusan = $_POST['jurusanxiisija2'];
    $tanggalabsen = date('Y-m-d');
    $keterangan = $_POST['absenxiisija2'];

    $query = "INSERT INTO dataabsenxiisija2 (uid, namalengkap, kelas, jurusan, tanggalabsen, jammasuk, keterangan) 
              VALUES ('$uid', '$namalengkap', '$kelas', '$jurusan', '$tanggalabsen', CURRENT_TIME(), '$keterangan')";
    
    if (mysqli_query($conn, $query)) {
        header('Location:../../pages_admin/belumabsenxiisija2.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>