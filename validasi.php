<?php
session_start();

//koneksi ke database
$conn = mysqli_connect("localhost","root","","absensi_siswa");

//API Baca UID dari Database
$sql = mysqli_query($conn, "SELECT * FROM addxiisija1");
$result = mysqli_fetch_assoc($sql);
echo $result['uid'];

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

//Edit data siswa XII DKV 1
if(isset($_POST['editxiidkv1'])){
    $iddatadkv = $_POST['iddatadkv'];
    $uid = $_POST['uid'];
    $namalengkap = $_POST['namalengkap'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $updatexiidkv1 = mysqli_query($conn,"update dataxiidkv1 set uid='$uid', namalengkap='$namalengkap', kelas='$kelas', jurusan='$jurusan' where iddatadkv='$iddatadkv'");
    if($updatexiidkv1){
        mysqli_query($conn, "DELETE FROM addxiisija1");
        header('location:dataxiidkv1.php');
    } else {
        echo 'Gagal';
        header('location:dataxiidkv1.php');
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

//Edit data siswa XII DKV 2
if(isset($_POST['editxiidkv2'])){
    $iddatadkv = $_POST['iddatadkv'];
    $uid = $_POST['uid'];
    $namalengkap = $_POST['namalengkap'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $updatexiidkv2 = mysqli_query($conn,"update dataxiidkv2 set uid='$uid', namalengkap='$namalengkap', kelas='$kelas', jurusan='$jurusan' where iddatadkv='$iddatadkv'");
    if($updatexiidkv2){
        mysqli_query($conn, "DELETE FROM addxiisija1");
        header('location:dataxiidkv2.php');
    } else {
        echo 'Gagal';
        header('location:dataxiidkv2.php');
    }
};

//Edit data siswa XII DKV 3
if(isset($_POST['editxiidkv3'])){
    $iddatadkv = $_POST['iddatadkv'];
    $uid = $_POST['uid'];
    $namalengkap = $_POST['namalengkap'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $updatexiidkv3 = mysqli_query($conn,"update dataxiidkv3 set uid='$uid', namalengkap='$namalengkap', kelas='$kelas', jurusan='$jurusan' where iddatadkv='$iddatadkv'");
    if($updatexiidkv3){
        mysqli_query($conn, "DELETE FROM addxiisija1");
        header('location:dataxiidkv3.php');
    } else {
        echo 'Gagal';
        header('location:dataxiidkv3.php');
    }
};

//Edit data siswa XI SIJA 1
if(isset($_POST['editxisija1'])){
    $iddatasija = $_POST['iddatasija'];
    $uid = $_POST['uid'];
    $namalengkap = $_POST['namalengkap'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $updatexisija1 = mysqli_query($conn,"update dataxisija1 set uid='$uid', namalengkap='$namalengkap', kelas='$kelas', jurusan='$jurusan' where iddatasija='$iddatasija'");
    if($updatexisija1){
        mysqli_query($conn, "DELETE FROM addxiisija1");
        header('location:dataxisija1.php');
    } else {
        echo 'Gagal';
        header('location:dataxisija1.php');
    }
};

//Edit data siswa XI DKV 1
if(isset($_POST['editxidkv1'])){
    $iddatadkv = $_POST['iddatadkv'];
    $uid = $_POST['uid'];
    $namalengkap = $_POST['namalengkap'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $updatexidkv1 = mysqli_query($conn,"update dataxidkv1 set uid='$uid', namalengkap='$namalengkap', kelas='$kelas', jurusan='$jurusan' where iddatadkv='$iddatadkv'");
    if($updatexidkv1){
        mysqli_query($conn, "DELETE FROM addxiisija1");
        header('location:dataxidkv1.php');
    } else {
        echo 'Gagal';
        header('location:dataxidkv1.php');
    }
};

//Edit data siswa XI DKV 2
if(isset($_POST['editxidkv2'])){
    $iddatadkv = $_POST['iddatadkv'];
    $uid = $_POST['uid'];
    $namalengkap = $_POST['namalengkap'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $updatexidkv2 = mysqli_query($conn,"update dataxidkv2 set uid='$uid', namalengkap='$namalengkap', kelas='$kelas', jurusan='$jurusan' where iddatadkv='$iddatadkv'");
    if($updatexidkv2){
        mysqli_query($conn, "DELETE FROM addxiisija1");
        header('location:dataxidkv2.php');
    } else {
        echo 'Gagal';
        header('location:dataxidkv2.php');
    }
};

//Edit data siswa XI DKV 3
if(isset($_POST['editxidkv3'])){
    $iddatadkv = $_POST['iddatadkv'];
    $uid = $_POST['uid'];
    $namalengkap = $_POST['namalengkap'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $updatexidkv3 = mysqli_query($conn,"update dataxidkv3 set uid='$uid', namalengkap='$namalengkap', kelas='$kelas', jurusan='$jurusan' where iddatadkv='$iddatadkv'");
    if($updatexidkv3){
        mysqli_query($conn, "DELETE FROM addxiisija1");
        header('location:dataxidkv3.php');
    } else {
        echo 'Gagal';
        header('location:dataxidkv3.php');
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

//Edit data siswa X DKV 1
if(isset($_POST['editxdkv1'])){
    $iddatadkv = $_POST['iddatadkv'];
    $uid = $_POST['uid'];
    $namalengkap = $_POST['namalengkap'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $updatexdkv1 = mysqli_query($conn,"update dataxdkv1 set uid='$uid', namalengkap='$namalengkap', kelas='$kelas', jurusan='$jurusan' where iddatadkv='$iddatadkv'");
    if($updatexdkv1){
        mysqli_query($conn, "DELETE FROM addxiisija1");
        header('location:dataxdkv1.php');
    } else {
        echo 'Gagal';
        header('location:dataxdkv1.php');
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

//Edit data siswa X DKV 2
if(isset($_POST['editxdkv2'])){
    $iddatadkv = $_POST['iddatadkv'];
    $uid = $_POST['uid'];
    $namalengkap = $_POST['namalengkap'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $updatexdkv2 = mysqli_query($conn,"update dataxdkv2 set uid='$uid', namalengkap='$namalengkap', kelas='$kelas', jurusan='$jurusan' where iddatadkv='$iddatadkv'");
    if($updatexdkv2){
        mysqli_query($conn, "DELETE FROM addxiisija1");
        header('location:dataxdkv2.php');
    } else {
        echo 'Gagal';
        header('location:dataxdkv2.php');
    }
};

//Edit data siswa X DKV 3
if(isset($_POST['editxdkv3'])){
    $iddatadkv = $_POST['iddatadkv'];
    $uid = $_POST['uid'];
    $namalengkap = $_POST['namalengkap'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $updatexdkv3 = mysqli_query($conn,"update dataxdkv3 set uid='$uid', namalengkap='$namalengkap', kelas='$kelas', jurusan='$jurusan' where iddatadkv='$iddatadkv'");
    if($updatexdkv3){
        mysqli_query($conn, "DELETE FROM addxiisija1");
        header('location:dataxdkv3.php');
    } else {
        echo 'Gagal';
        header('location:dataxdkv3.php');
    }
};

//Edit Data User Management
if(isset($_POST['edit-user-management'])){
    $id = $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $updateuser = mysqli_query($conn,"update users set email='$email', password='$password', role='$role' where id='$id'");
    if($updateuser){
        mysqli_query($conn, "DELETE FROM addxiisija1");
        header('location:user-management.php');
    } else {
        echo 'Gagal';
        header('location:user-management.php');
    }
};
?>