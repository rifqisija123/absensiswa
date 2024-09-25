<?php
require '../../validasi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uid = $_POST['uidxiidkv2'];
    $namalengkap = $_POST['namalengkapxiidkv2'];
    $kelas = $_POST['kelasxiidkv2'];
    $jurusan = $_POST['jurusanxiidkv2'];
    $tanggalabsen = date('Y-m-d');
    $keterangan = $_POST['absenxiidkv2'];

    $query = "INSERT INTO dataabsenxiidkv2 (uid, namalengkap, kelas, jurusan, tanggalabsen, jammasuk, keterangan) 
              VALUES ('$uid', '$namalengkap', '$kelas', '$jurusan', '$tanggalabsen', CURRENT_TIME(), '$keterangan')";
    
    if (mysqli_query($conn, $query)) {
        header('Location:../../pages_admin/belumabsenxiidkv2.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>