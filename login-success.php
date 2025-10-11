<?php
session_start();
require_once('conn.php');

if (isset($_POST['sub-user-btn'])) {
    $email = $_POST['cus_email'];
    $password = $_POST['cus_password'];

    $sql = "SELECT * FROM customer WHERE cus_email = '$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $customer = $result->fetch_assoc();

        if (password_verify($password, $customer['cus_password'])) {
            $_SESSION['cus_id'] = $customer['cus_id'];
            $_SESSION['cus_fname'] = $customer['cus_fname'];
            $_SESSION['cus_lname'] = $customer['cus_lname'];
            $_SESSION['cus_email'] = $customer['cus_email'];
            $_SESSION['cus_username'] = $customer['cus_username'];
            $_SESSION['cus_phone'] = $customer['cus_phone'];
            $_SESSION['cus_email'] = $customer['cus_email'];
            $_SESSION['cus_address'] = $customer['cus_address'];
            $_SESSION['cus_picture'] = $customer['cus_picture'];
            header("Location: user-login.php");
            exit();
        }
    }

    $_SESSION['login_error'] = "อีเมลหรือรหัสผ่านไม่ถูกต้อง";
    header("Location: login.php");
    exit();
}
?>
