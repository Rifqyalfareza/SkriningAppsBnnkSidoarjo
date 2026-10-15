<?php
session_start();
require_once 'config/db.php';

$action = $_POST['action'] ?? '';

if ($action === 'login') {
    $instansi = $_POST['instansi'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE instansi = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $instansi, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['instansi'] = $user['instansi'];
        $_SESSION['success'] = "Login berhasil!";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['error'] = "Username atau password salah!";
        header("Location: index.php");
        exit();
    }
}elseif($action === 'register'){
    $instansi = $_POST['instansi'];
    $email = $_POST['email'];
    $notelp = $_POST['notelp'];
    $password = $_POST['password'];
    
    $stmt = $conn->prepare("INSERT INTO user ( instansi, email, no_telp, password) VALUES ( ?, ?, ?, ?)");
    $stmt->bind_param("ssis",  $instansi, $email, $notelp,  $password);
        
    if ($stmt->execute()) {
        $_SESSION['alert'] = [
        'type' => 'success',
        'message' => 'Registrasi berhasil'
    ];
        header("Location: ?page=petugas");
    } else {
        $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Registrasi gagal: ' . $stmt->error
    ];
        header("Location: ?page=register");
    }
}else{
    session_destroy();
    header("Location: index.php");
    exit();
}
