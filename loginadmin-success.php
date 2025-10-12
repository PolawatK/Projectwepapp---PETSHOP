<?php
session_start();
require_once('conn.php');

if (isset($_POST['sub-btn-admin'])) {
    $username = $_POST['admin_username'];
    $password = $_POST['admin_password'];

    $sql = "SELECT * FROM admin WHERE admin_username = '$username'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $admin = $result->fetch_assoc();

        if ($password == $admin['admin_password']) {
            $_SESSION['admin_id'] = $admin['admin_id'];
            $_SESSION['admin_username'] = $admin['admin_username'];
            $_SESSION['admin_password'] = $admin['admin_password'];
            $_SESSION['admin_fname'] = $admin['admin_fname'];
            $_SESSION['admin_lname'] = $admin['admin_lname'];
            $_SESSION['admin_email'] = $admin['admin_email'];
            $_SESSION['admin_phone'] = $admin['admin_phone'];
            $_SESSION['admin_picture'] = $admin['admin_picture'];
            
            
            header("Location: admin-login.php");
            exit();
        }
    }

    $_SESSION['login_error_admin'] = "error";
    $_SESSION['login_error_text'] = "อีเมลหรือรหัสผ่านไม่ถูกต้อง";
    $_SESSION['open'] = 'admin';
    header("Location: login.php");
    exit();
}
?>
