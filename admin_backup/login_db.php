<?php
session_start();
require_once 'server.php';

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username)) {
        $_SESSION['error'] = "กรุณากรอกชื่อผู้ใช้";
        header('location: admin_login.php');
        exit();
    }
    if (empty($password)) {
        $_SESSION['error'] = "กรุณากรอกรหัสผ่าน";
        header('location: admin_login.php');
        exit();
    }

    echo "Username: $username, Password: $password";  // Debugging line
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "Error: " . mysqli_error($conn);
    }

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "คุณเข้าสู่ระบบเรียบร้อยแล้ว";
            header('location: admin_home.php');
            exit();
        } else {
            $_SESSION['error'] = "รหัสผ่านไม่ถูกต้อง";
            header('location: admin_login.php');
            exit();
        }
    } else {
        $_SESSION['error'] = "ไม่พบชื่อผู้ใช้นี้ในระบบ";
        header('location: admin_login.php');
        exit();
    }
} else {
    $_SESSION['error'] = "ไม่สามารถเข้าสู่ระบบได้";
    header('location: admin_login.php');
    exit();
}
?>
