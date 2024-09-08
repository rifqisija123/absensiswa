<?php
require 'validasi.php';
session_start();

//cek login, sesuai atau tdiak dengan email dan password di database nya
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    //validasi data
    if (empty($email) || empty($password)) {
        $_SESSION['login_error'] = "Email dan Password harus diisi.";
        header("Location: login.php");
        exit();
    }

    //pencocokan dengan database
    $cekdatabase = mysqli_query($conn, "SELECT * FROM login where email='$email' and password='$password'");
    //hitung jumlah data
    $hitung = mysqli_num_rows($cekdatabase);

    if($hitung>0){
        $_SESSION['log'] = 'True';
        header('location:index.php');
    } else {
        echo '
        <script>
            alert("Email dan Password anda salah, silahkan masukkan email dan password yang benar");
            window.location.href="login.php";
        </script>
        ';
    };
};

if(!isset($_SESSION['log'])){
    
} else {
    header('location:index.php');
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Feather-Icon -->
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Login Si Hajar</title>
    <link
      rel="icon"
      href="assets/img/kaiadmin/smkn9.png"
      type="image/x-icon"
    />
    <link rel="manifest" href="manifest.json">
</head>

<body>
    <!-- Form Login Start -->
    <div class="container-form">
        <div class="form">
            <div class="form-img">
                <img src="#" alt="">
            </div>
            <form method="post" class="form-login">
                <img src="assets/img/kaiadmin/smkn9.png" alt="Logo SMKN 9 Kota Bekasi">
                <h2>Login Si <span>Hajar</span></h2>
                <input type="text" name="email" id="email" placeholder="Masukkan Email" class="form-input">
                <input type="password" name="password" id="password" placeholder="Masukkan Password" class="form-input">
                <button class="btn" name="login">Login</button>
            </form>
        </div>
    </div>
    <!-- Form Login End -->



    <!-- Feather-Icon -->
    <script>
        feather.replace();
    </script>
    <script href="assets/js/script.js"></script>
    <script>
      window.addEventListener("load",()=>{
        if("serviceWorker" in navigator){
          navigator.serviceWorker.register("serviceworker.js")
        }
      })
    </script>
</body>

</html>