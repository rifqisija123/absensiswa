<?php
require 'validasi.php';
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role']; // Dapatkan role dari input form

    // Validasi input
    if (empty($email) || empty($password) || empty($role)) {
        $_SESSION['login_error'] = "Email, Password, dan Role harus diisi.";
        header("Location: login.php");
        exit();
    }

    // Pencocokan dengan database berdasarkan email, password, dan role
    $cekdatabase = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password' AND role='$role'");
    $user = mysqli_fetch_assoc($cekdatabase);
    $hitung = mysqli_num_rows($cekdatabase);

    if ($hitung > 0) {
        // Simpan data login ke session
        $_SESSION['log'] = 'True';
        $_SESSION['role'] = $user['role']; // Simpan role di session
        
        // Redirect sesuai dengan role
        if ($user['role'] == 'admin') {
            header('Location: index.php'); // Admin ke dashboard admin
        } else {
            header('Location: user.php'); // User ke dashboard user
        }
    } else {
        echo '
        <script>
            alert("Email, Password, atau Role anda salah. Pastikan email, password, dan role sesuai.");
            window.location.href="login.php";
        </script>
        ';
    }
}

if (isset($_SESSION['log'])) {
    // Cek role, jika sudah login langsung ke halaman yang sesuai
    if ($_SESSION['role'] == 'admin') {
        header('Location: index.php');
    } else {
        header('Location: user.php');
    }
}
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
                <input type="text" name="email" id="email" placeholder="Masukkan Email" class="form-control" required>
                <input type="password" name="password" id="password" placeholder="Masukkan Password" class="form-control" required>
                <select name="role" id="role" class="form-control" required>
                    <option disabled selected>Pilih Role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
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
    <!-- <script>
      window.addEventListener("load",()=>{
        if("serviceWorker" in navigator){
          navigator.serviceWorker.register("serviceworker.js")
        }
      })
    </script> -->
</body>

</html>