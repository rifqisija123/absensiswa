<?php
require '../../validasi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uid = $_POST['uidxiidkv1'];
    $namalengkap = $_POST['namalengkapxiidkv1'];
    $kelas = $_POST['kelasxiidkv1'];
    $jurusan = $_POST['jurusanxiidkv1'];
    $tanggalabsen = date('Y-m-d');
    $keterangan = $_POST['absenxiidkv1'];

    $query = "INSERT INTO dataabsenxiidkv1 (uid, namalengkap, kelas, jurusan, tanggalabsen, jammasuk, keterangan) 
              VALUES ('$uid', '$namalengkap', '$kelas', '$jurusan', '$tanggalabsen', CURRENT_TIME(), '$keterangan')";
    
    if (mysqli_query($conn, $query)) {
        header('Location:../../pages_admin/belumabsenxiidkv1.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>