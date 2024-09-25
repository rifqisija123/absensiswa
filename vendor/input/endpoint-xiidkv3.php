<?php
require '../../validasi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uid = $_POST['uidxiidkv3'];
    $namalengkap = $_POST['namalengkapxiidkv3'];
    $kelas = $_POST['kelasxiidkv3'];
    $jurusan = $_POST['jurusanxiidkv3'];
    $tanggalabsen = date('Y-m-d');
    $keterangan = $_POST['absenxiidkv3'];

    $query = "INSERT INTO dataabsenxiidkv3 (uid, namalengkap, kelas, jurusan, tanggalabsen, jammasuk, keterangan) 
              VALUES ('$uid', '$namalengkap', '$kelas', '$jurusan', '$tanggalabsen', CURRENT_TIME(), '$keterangan')";
    
    if (mysqli_query($conn, $query)) {
        header('Location:../../pages_admin/belumabsenxiidkv3.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>