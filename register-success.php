<?php

session_start();
require_once('conn.php');

if (isset($_POST['register'])) {
    $fname = $_POST['cus_fname'];
    $lname = $_POST['cus_lname'];
    $password = password_hash($_POST['cus_password'],PASSWORD_DEFAULT);
    $email = $_POST['cus_email'];

    $checkEmail = $conn->query("SELECT cus_email FROM customer WHERE cus_email = '$email' ");
    if ($checkEmail->num_rows > 0) {
        echo "<script>
            alert('อีเมลนี้ถูกใช้งานแล้ว!');
            window.history.back();
        </script>";
    exit();
    }else{
        if ($conn->query("INSERT INTO customer (cus_fname, cus_lname, cus_password, cus_email)VALUES ('$fname', '$lname', '$password', '$email')")) {
            echo "<script>
                    alert('สมัครสมาชิกสำเร็จ!');
                    window.location.href = 'login.php';
                  </script>";
            exit();
        } else {
            echo "<script>
                    alert('เกิดข้อผิดพลาดในการสมัครสมาชิก: " . $conn->error . "');
                    window.history.back();
                  </script>";
            exit();
        }
    }
}
?>