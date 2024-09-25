<?php
require '../../validasi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uid = $_POST['uidxiisija1'];
    $namalengkap = $_POST['namalengkapxiisija1'];
    $kelas = $_POST['kelasxiisija1'];
    $jurusan = $_POST['jurusanxiisija1'];
    $tanggalabsen = date('Y-m-d');
    $keterangan = $_POST['absenxiisija1'];

    $query = "INSERT INTO dataabsenxiisija1 (uid, namalengkap, kelas, jurusan, tanggalabsen, jammasuk, keterangan) 
              VALUES ('$uid', '$namalengkap', '$kelas', '$jurusan', '$tanggalabsen', CURRENT_TIME(), '$keterangan')";
    
    if (mysqli_query($conn, $query)) {
        header('Location:../../pages_admin/belumabsenxiisija1.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>