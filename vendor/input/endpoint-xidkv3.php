<?php
require '../../validasi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uid = $_POST['uidxidkv3'];
    $namalengkap = $_POST['namalengkapxidkv3'];
    $kelas = $_POST['kelasxidkv3'];
    $jurusan = $_POST['jurusanxidkv3'];
    $tanggalabsen = date('Y-m-d');
    $keterangan = $_POST['absenxidkv3'];

    $query = "INSERT INTO dataabsenxidkv3 (uid, namalengkap, kelas, jurusan, tanggalabsen, jammasuk, keterangan) 
              VALUES ('$uid', '$namalengkap', '$kelas', '$jurusan', '$tanggalabsen', CURRENT_TIME(), '$keterangan')";
    
    if (mysqli_query($conn, $query)) {
        header('Location:../../pages_admin/belumabsenxidkv3.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>