<?php
require '../validasi.php';

if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role'])){
    $email = $_POST['email'];
    $password = $_POST['password'];  
    $role = $_POST['role'];

    $addtotable = mysqli_query($conn, "INSERT INTO users (email, password, role) VALUES ('$email','$password','$role')");
    if($addtotable){
        // Mengirim respons JSON dengan data yang baru ditambahkan
        echo json_encode([
            'success' => true,
            'email' => $email,
            'password' => $password,
            'role' => $role
        ]);
    } else {
        // Mengirim respons JSON untuk kasus gagal
        echo json_encode(['success' => false]);
    }
}
?>