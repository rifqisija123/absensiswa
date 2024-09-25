<?php
require '../../validasi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uid = $_POST['uidxidkv1'];
    $namalengkap = $_POST['namalengkapxidkv1'];
    $kelas = $_POST['kelasxidkv1'];
    $jurusan = $_POST['jurusanxidkv1'];
    $tanggalabsen = date('Y-m-d');
    $keterangan = $_POST['absenxidkv1'];

    $query = "INSERT INTO dataabsenxidkv1 (uid, namalengkap, kelas, jurusan, tanggalabsen, jammasuk, keterangan) 
              VALUES ('$uid', '$namalengkap', '$kelas', '$jurusan', '$tanggalabsen', CURRENT_TIME(), '$keterangan')";
    
    if (mysqli_query($conn, $query)) {
        header('Location:../../pages_admin/belumabsenxidkv1.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>