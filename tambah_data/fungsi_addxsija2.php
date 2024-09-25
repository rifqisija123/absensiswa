<?php
require '../validasi.php';

if(isset($_POST['uid']) && isset($_POST['namalengkap']) && isset($_POST['kelas']) && isset($_POST['jurusan'])){
    $uid = $_POST['uid'];
    $namalengkap = $_POST['namalengkap'];  
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $addtotable = mysqli_query($conn, "INSERT INTO dataxsija2 (uid, namalengkap, kelas, jurusan) VALUES ('$uid','$namalengkap','$kelas','$jurusan')");
    if($addtotable){
        // Mengosongkan tabel addxiisija1 jika berhasil
        mysqli_query($conn, "DELETE FROM addxiisija1");

        // Mengirim respons JSON dengan data yang baru ditambahkan
        echo json_encode([
            'success' => true,
            'uid' => $uid,
            'namalengkap' => $namalengkap,
            'kelas' => $kelas,
            'jurusan' => $jurusan
        ]);
    } else {
        // Mengirim respons JSON untuk kasus gagal
        echo json_encode(['success' => false]);
    }
}
?>