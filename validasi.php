<?php
session_start();

//koneksi ke database
$conn = mysqli_connect("localhost","root","","absensi_siswa");

//API Baca UID dari Database
$sql = mysqli_query($conn, "SELECT * FROM addxiisija1");
$result = mysqli_fetch_assoc($sql);
echo $result['uid'];

//hapus data siswa XII SIJA 1
if(isset($_POST['id'])){
    $id = $_POST['id'];

    $hapus = mysqli_query($conn, "DELETE FROM dataxiisija1 WHERE iddatasija='$id'");
    if($hapus){
        $_SESSION['success'] = 'Data berhasil dihapus.';
        header('Location: dataxiisija1.php');
    } else {
        $_SESSION['error'] = 'Gagal menghapus data.';
        header('Location: dataxiisija1.php');
    }
}

//hapus data siswa XII SIJA 2
if(isset($_POST['id'])){
    $id = $_POST['id'];

    $hapus = mysqli_query($conn, "DELETE FROM dataxiisija2 WHERE iddatasija='$id'");
    if($hapus){
        $_SESSION['success'] = 'Data berhasil dihapus.';
        header('Location: dataxiisija2.php');
    } else {
        $_SESSION['error'] = 'Gagal menghapus data.';
        header('Location: dataxiisija2.php');
    }
}

//hapus data siswa XI SIJA
if(isset($_POST['id'])){
    $id = $_POST['id'];

    $hapus = mysqli_query($conn, "DELETE FROM dataxisija1 WHERE iddatasija='$id'");
    if($hapus){
        $_SESSION['success'] = 'Data berhasil dihapus.';
        header('Location: dataxisija1.php');
    } else {
        $_SESSION['error'] = 'Gagal menghapus data.';
        header('Location: dataxisija1.php');
    }
}

//hapus data siswa X SIJA 1
if(isset($_POST['id'])){
    $id = $_POST['id'];

    $hapus = mysqli_query($conn, "DELETE FROM dataxsija1 WHERE iddatasija='$id'");
    if($hapus){
        $_SESSION['success'] = 'Data berhasil dihapus.';
        header('Location: dataxsija1.php');
    } else {
        $_SESSION['error'] = 'Gagal menghapus data.';
        header('Location: dataxsija1.php');
    }
}

//hapus data siswa X SIJA 2
if(isset($_POST['id'])){
    $id = $_POST['id'];

    $hapus = mysqli_query($conn, "DELETE FROM dataxsija2 WHERE iddatasija='$id'");
    if($hapus){
        $_SESSION['success'] = 'Data berhasil dihapus.';
        header('Location: dataxsija2.php');
    } else {
        $_SESSION['error'] = 'Gagal menghapus data.';
        header('Location: dataxsija2.php');
    }
}

//Tambah data siswa XII SIJA 1
if(isset($_POST['uid']) && isset($_POST['namalengkap']) && isset($_POST['kelas']) && isset($_POST['jurusan'])){
    $uid = $_POST['uid'];
    $namalengkap = $_POST['namalengkap'];  
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $addtotable = mysqli_query($conn, "INSERT INTO dataxiisija1 (uid, namalengkap, kelas, jurusan) VALUES ('$uid','$namalengkap','$kelas','$jurusan')");
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

//Tambah data siswa XII SIJA 2
if(isset($_POST['addxiisija2'])){
    $uid = $_POST['uid'];
    $namalengkap = $_POST['namalengkap'];  
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $addtotable = mysqli_query($conn,"insert into dataxiisija2 (uid, namalengkap, kelas, jurusan) values('$uid','$namalengkap','$kelas','$jurusan')");
    if($addtotable){
        mysqli_query($conn, "DELETE FROM addxiisija1");
        header('location:dataxiisija2.php');
    } else {
        echo 'Gagal';
        header('location:dataxiisija2.php');
    }
};

//Tambah data siswa XI SIJA
if(isset($_POST['addxisija1'])){
    $uid = $_POST['uid'];
    $namalengkap = $_POST['namalengkap'];  
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $addtotable = mysqli_query($conn,"insert into dataxisija1 (uid, namalengkap, kelas, jurusan) values('$uid','$namalengkap','$kelas','$jurusan')");
    if($addtotable){
        mysqli_query($conn, "DELETE FROM addxiisija1");
        header('location:dataxisija1.php');
    } else {
        echo 'Gagal';
        header('location:dataxisija1.php');
    }
};

//Tambah data siswa X SIJA 1
if(isset($_POST['addxsija1'])){
    $uid = $_POST['uid'];
    $namalengkap = $_POST['namalengkap'];  
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $addtotable = mysqli_query($conn,"insert into dataxsija1 (uid, namalengkap, kelas, jurusan) values('$uid','$namalengkap','$kelas','$jurusan')");
    if($addtotable){
        mysqli_query($conn, "DELETE FROM addxiisija1");
        header('location:dataxsija1.php');
    } else {
        echo 'Gagal';
        header('location:dataxsija1.php');
    }
};

//Tambah data siswa X SIJA 2
if(isset($_POST['addxsija2'])){
    $uid = $_POST['uid'];
    $namalengkap = $_POST['namalengkap'];  
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $addtotable = mysqli_query($conn,"insert into dataxsija2 (uid, namalengkap, kelas, jurusan) values('$uid','$namalengkap','$kelas','$jurusan')");
    if($addtotable){
        mysqli_query($conn, "DELETE FROM addxiisija1");
        header('location:dataxsija2.php');
    } else {
        echo 'Gagal';
        header('location:dataxsija2.php');
    }
};

//Edit data siswa XII SIJA 1
if(isset($_POST['editxiisija1'])){
    $iddatasija = $_POST['iddatasija'];
    $uid = $_POST['uid'];
    $namalengkap = $_POST['namalengkap'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $updatexiisija1 = mysqli_query($conn,"update dataxiisija1 set uid='$uid', namalengkap='$namalengkap', kelas='$kelas', jurusan='$jurusan' where iddatasija='$iddatasija'");
    if($updatexiisija1){
        mysqli_query($conn, "DELETE FROM addxiisija1");
        header('location:dataxiisija1.php');
    } else {
        echo 'Gagal';
        header('location:dataxiisija1.php');
    }
};

//Edit data siswa XII SIJA 2
if(isset($_POST['editxiisija2'])){
    $iddatasija = $_POST['iddatasija'];
    $uid = $_POST['uid'];
    $namalengkap = $_POST['namalengkap'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $updatexiisija2 = mysqli_query($conn,"update dataxiisija2 set uid='$uid', namalengkap='$namalengkap', kelas='$kelas', jurusan='$jurusan' where iddatasija='$iddatasija'");
    if($updatexiisija2){
        mysqli_query($conn, "DELETE FROM addxiisija1");
        header('location:dataxiisija2.php');
    } else {
        echo 'Gagal';
        header('location:dataxiisija2.php');
    }
};

//Edit data siswa XI SIJA 1
if(isset($_POST['editxisija1'])){
    $iddatasija = $_POST['iddatasija'];
    $uid = $_POST['uid'];
    $namalengkap = $_POST['namalengkap'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $updatexiisija2 = mysqli_query($conn,"update dataxisija1 set uid='$uid', namalengkap='$namalengkap', kelas='$kelas', jurusan='$jurusan' where iddatasija='$iddatasija'");
    if($updatexiisija2){
        mysqli_query($conn, "DELETE FROM addxiisija1");
        header('location:dataxisija1.php');
    } else {
        echo 'Gagal';
        header('location:dataxisija1.php');
    }
};

//Edit data siswa X SIJA 1
if(isset($_POST['editxsija1'])){
    $iddatasija = $_POST['iddatasija'];
    $uid = $_POST['uid'];
    $namalengkap = $_POST['namalengkap'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $updatexiisija2 = mysqli_query($conn,"update dataxsija1 set uid='$uid', namalengkap='$namalengkap', kelas='$kelas', jurusan='$jurusan' where iddatasija='$iddatasija'");
    if($updatexiisija2){
        mysqli_query($conn, "DELETE FROM addxiisija1");
        header('location:dataxsija1.php');
    } else {
        echo 'Gagal';
        header('location:dataxsija1.php');
    }
};

//Edit data siswa X SIJA 2
if(isset($_POST['editxsija2'])){
    $iddatasija = $_POST['iddatasija'];
    $uid = $_POST['uid'];
    $namalengkap = $_POST['namalengkap'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $updatexiisija2 = mysqli_query($conn,"update dataxsija2 set uid='$uid', namalengkap='$namalengkap', kelas='$kelas', jurusan='$jurusan' where iddatasija='$iddatasija'");
    if($updatexiisija2){
        mysqli_query($conn, "DELETE FROM addxiisija1");
        header('location:dataxsija2.php');
    } else {
        echo 'Gagal';
        header('location:dataxsija2.php');
    }
};
?>